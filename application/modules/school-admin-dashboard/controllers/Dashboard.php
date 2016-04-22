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
        if (!$this->session->userdata('school_admin')) {
            redirect('school-admin-login/login');
        }
    }

  	public function index()
  	{
        $session_details = $this->session->userdata('school_admin');
        $data['logged_id'] = $session_details->logged_id;
        $data['school'] = $session_details->school;
  		  $this->load->view('dashboard', $data);
  	}
}
