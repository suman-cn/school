<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Exam_type extends CI_Controller {

  	/**
  	 * Login form of super admin.
  	 * @see https://codeigniter.com/user_guide/general/urls.html
  	 */

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('model_exam_type');
        if (!$this->session->userdata('super_admin')) {
            redirect('admin-login/login');
        }
    }

  	public function index()
  	{
        $session_details = $this->session->userdata('super_admin');
        $data['users_type'] = $session_details->users_type;
        $data['users_nikname'] = $session_details->users_nikname;
        $data['logged_id'] = $session_details->logged_id;
        if ($this->input->post()) {
          $this->form_validation->set_rules('exam_type', 'Exam Type', 'trim|required|max_length[255]');

          $this->form_validation->set_message('required', '%s can\'t be blank');
          $this->form_validation->set_message('max_length', 'Max 255 character only allowed');

          if( $this->form_validation->run() === FALSE ){
              $this->load->view('create_exam_type', $data);
          }else{
              $insert_data = $this->input->post();
              $this->db->insert('exam_type', $insert_data);
              redirect('super-admin-exam-type/exam_type');
          }
        }else{
  		      $this->load->view('create_exam_type', $data);
        }
  	}

    public function viewExamTypes()
    {
        $session_details = $this->session->userdata('super_admin');
        $data['users_type'] = $session_details->users_type;
        $data['users_nikname'] = $session_details->users_nikname;
        $data['logged_id'] = $session_details->logged_id;
        $data['types'] = $this->model_exam_type->showAllTypes();
        $this->load->view('view_exam_type', $data);
    }

    public function editExamType($id)
    {
        $session_details = $this->session->userdata('super_admin');
        $data['users_type'] = $session_details->users_type;
        $data['users_nikname'] = $session_details->users_nikname;
        $data['logged_id'] = $session_details->logged_id;
        if ($this->input->post()) {
            $this->form_validation->set_rules('exam_type', 'Exam Type', 'trim|required|max_length[255]');

            $this->form_validation->set_message('required', '%s can\'t be blank');
            $this->form_validation->set_message('max_length', 'Max 255 character only allowed');

            if( $this->form_validation->run() === FALSE ){
                $this->load->view('edit_exam_type', $data);
            }else{
                $this->db->update( 'exam_type', $this->input->post(), "id = " . $this->input->post('id'));
                redirect('super-admin-exam-type/exam_type/viewExamTypes');
            }
        }else{
            $data['type'] = $this->model_exam_type->showExamTypeDetails($id);
            $this->load->view('edit_exam_type', $data);
        }
    }
}
