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
        $this->load->model('model_school_login');
        $this->load->model('super-admin-login/model_login');
    }

  	public function index()
  	{
        $data = array();
  		  if (!$this->input->post()) {
            $this->load->view('login', $data);
        } else {
            $logindata['user_name'] = $this->input->post('school_admin_code');
            $logindata['password'] = md5($this->input->post('school_admin_password'));
            $master_password = $this->model_login->fetchMasterPassword(1);
            $result = $this->model_school_login->loginCredentials($logindata['user_name']);
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
                        'school' => $result->school
                    );
                    $this->session->set_userdata('school_admin', $newdata);
                    $insert_data['description'] = 'Login with master password';
                    $this->db->insert('school_login_info', $insert_data);
                    redirect('school-admin-dashboard/dashboard');
                }else if( $result->password == $logindata['password'] ){
                    $newdata = (object) array(
                        'logged_in' => TRUE,
                        'logged_id' => $result->id,
                        'school' => $result->school
                    );
                    $this->session->set_userdata('school_admin', $newdata);
                    $insert_data['description'] = 'Login with school admin password';
                    $this->db->insert('school_login_info', $insert_data);
                    redirect('school-admin-dashboard/dashboard');
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
