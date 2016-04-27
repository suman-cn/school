<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {

  	/**
  	 * Login form of super admin.
  	 * @see https://codeigniter.com/user_guide/general/urls.html
  	 */

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
    }

  	public function index()
  	{
        $this->session->unset_userdata('student_session_jksjad787e');
        $this->session->sess_destroy();
        redirect('student-login/login');
  	}
}
