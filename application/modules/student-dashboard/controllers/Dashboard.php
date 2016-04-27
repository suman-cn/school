<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

  	/**
  	 * Login form of super admin.
  	 * @see https://codeigniter.com/user_guide/general/urls.html
  	 */

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('html');
        $this->load->library('session');
        if (!$this->session->userdata('student_session_jksjad787e')) {
            redirect('student-login/login');
        }
    }

  	public function index()
  	{
        $session_details = $this->session->userdata('student_session_jksjad787e');
        $data['logged_id'] = $session_details->logged_id;
        $data['student_name'] = $session_details->student_name;
  		  $this->load->view('dashboard', $data);
  	}
}
