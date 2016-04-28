<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Session_year extends CI_Controller {

  	/**
  	 * Login form of super admin.
  	 * @see https://codeigniter.com/user_guide/general/urls.html
  	 */

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->model('model_session');
        if (!$this->session->userdata('super_admin')) {
            redirect('super-admin-login/login');
        }
    }

  	public function addSession()
  	{
        $session_details = $this->session->userdata('super_admin');
        $data['users_type'] = $session_details->users_type;
        $data['users_nikname'] = $session_details->users_nikname;
        $data['logged_id'] = $session_details->logged_id;
        if ($this->input->post()) {
            $input_data = array(
                            'name' => $this->input->post('name'),
                            'description' => $this->input->post('description'),
                            'from' => $this->input->post('from_month').'/'.$this->input->post('from_year'),
                            'to' => $this->input->post('to_month').'/'.$this->input->post('to_year'),
                            'status' => $this->input->post('status')
                          );
            $this->db->insert( 'class_session', $input_data);
            redirect('super-admin-session-year/session_year/addSession');
        }else{
            $this->load->view('add_session', $data);
        }
  	}


    public function viewBatchSession()
    {
        $session_details = $this->session->userdata('super_admin');
        $data['users_type'] = $session_details->users_type;
        $data['users_nikname'] = $session_details->users_nikname;
        $data['logged_id'] = $session_details->logged_id;
        $data['sessions'] = $this->model_session->showAllBatchSession();
        $this->load->view('view_batch_session', $data);
    }

    public function editBatchSession($id)
    {
        $session_details = $this->session->userdata('super_admin');
        $data['users_type'] = $session_details->users_type;
        $data['users_nikname'] = $session_details->users_nikname;
        $data['logged_id'] = $session_details->logged_id;
        if ($this->input->post()) {
            $update_data = array(
                            'name' => $this->input->post('name'),
                            'description' => $this->input->post('description'),
                            'from' => $this->input->post('from_month').'/'.$this->input->post('from_year'),
                            'to' => $this->input->post('to_month').'/'.$this->input->post('to_year'),
                            'status' => $this->input->post('status')
                          );
            $this->db->update( 'class_session', $update_data, "id = " . $this->input->post('hid_id') );
            redirect('super-admin-session-year/session_year/viewBatchSession');
        }else{
            $data['session'] = $this->model_session->showAllBatchSessionDetails($id);
            $this->load->view('edit_batch_session', $data);
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
