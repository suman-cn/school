<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {

  	/**
  	 * Login form of super admin.
  	 * @see https://codeigniter.com/user_guide/general/urls.html
  	 */

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->model('super-admin-login/model_login');
        if (!$this->session->userdata('super_admin')) {
            redirect('super-admin-login/login');
        }
    }

  	public function superAdminPasswordChange()
  	{
        $session_details = $this->session->userdata('super_admin');
        $data['users_type'] = $session_details->users_type;
        $data['users_nikname'] = $session_details->users_nikname;
        $data['logged_id'] = $session_details->logged_id;
        if ($this->input->post()) {
            $old_password = md5($this->input->post('old_password'));
            $result = $this->model_login->checkOldPassword($old_password, $data['logged_id']);
            if($result){
                $this->db->update( 'super_admin', array( 'password' => md5($this->input->post('new_password'))), "id = " . $data['logged_id']);
                redirect('super-admin-settings/settings/superAdminPasswordChange');
            }else{
                $data['error'] = "Old password not matched";
                $this->load->view('super_admin_password_change', $data);
            }
        }else{
            $this->load->view('super_admin_password_change', $data);
        }
  	}

    public function masterPasswordChange()
    {
        $session_details = $this->session->userdata('super_admin');
        $data['users_type'] = $session_details->users_type;
        $data['users_nikname'] = $session_details->users_nikname;
        $data['logged_id'] = $session_details->logged_id;
        if ($this->input->post()) {
            $old_password = md5($this->input->post('old_password'));
            $result = $this->model_login->checkOldPasswordMaster($old_password, 1);
            if($result){
                $this->db->update( 'master_password', array( 'password' => md5($this->input->post('new_password'))), "id = " . $data['logged_id']);
                redirect('super-admin-settings/settings/masterPasswordChange');
            }else{
                $data['error'] = "Old password not matched";
                $this->load->view('master_password_change', $data);
            }
        }else{
            $this->load->view('master_password_change', $data);
        }
    }
}
