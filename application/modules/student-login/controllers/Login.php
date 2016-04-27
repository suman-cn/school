<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

  	/**
  	 * Login form of super admin.
  	 * @see https://codeigniter.com/user_guide/general/urls.html
  	 */

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->model('model_student_login');
        $this->load->model('super-admin-login/model_login');
        $this->load->model('school-admin-login/model_school_login');
    }

  	public function index()
  	{
        $data = array();
  		  if (!$this->input->post()) {
            $this->load->view('login', $data);
        } else {
            $logindata['user_name'] = $this->input->post('student_id');
            $logindata['password'] = md5($this->input->post('student_password'));
            $master_password = $this->model_login->fetchMasterPassword(1);
            $result = $this->model_student_login->loginCredentials($logindata['user_name']);
            if ($result) {
                $insert_data = array(
                                    'ip_address' => $_SERVER['SERVER_ADDR'],
                                    'loged_id' => $result->id,
                                    'time' => time()
                                  );
                if( $result->password == $master_password ){
                    $newdata = (object) array(
                        'logged_in' => TRUE,
                        'logged_id' => $result->id,
                        'student_name' => $result->student_name
                    );
                    $this->session->set_userdata('student_session_jksjad787e', $newdata);
                    $insert_data['description'] = 'Login with master password';
                    $this->db->insert('student_login_info', $insert_data);
                    redirect('student-dashboard/dashboard');
                }else if( $result->password == $logindata['password'] ){
                    $newdata = (object) array(
                        'logged_in' => TRUE,
                        'logged_id' => $result->id,
                        'student_name' => $result->student_name
                    );
                    $this->session->set_userdata('student_session_jksjad787e', $newdata);
                    $insert_data['description'] = 'Login with student password';
                    $this->db->insert('student_login_info', $insert_data);
                    redirect('student-dashboard/dashboard');
                }else{
                    $data['login_error'] = true;
                    $this->load->view('login', $data);
                }
            } else {
                $data['login_error'] = true;
                $this->load->view('login', $data);
            }
        }
  	}
}
