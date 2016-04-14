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
        $this->load->model('model_login');
    }

  	public function index()
  	{
        $data = array();
  		  if (!$this->input->post()) {
            $this->load->view('login', $data);
        } else {
            $logindata['user_name'] = $this->input->post('super_admin_email');
            $logindata['password'] = md5($this->input->post('super_admin_password'));
            $result = $this->model_login->login($logindata);
            if ($result) {
                if ($result->users_type == '1') {
                    $newdata = (object) array(
                        'logged_in' => TRUE,
                        'logged_id' => $result->id,
                        'users_type' => $result->users_type,
                        'users_nikname' => $result->nikname
                    );
                    $this->session->set_userdata('super_admin', $newdata);
                    redirect('super-admin-dashboard/dashboard');
                } else {
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
