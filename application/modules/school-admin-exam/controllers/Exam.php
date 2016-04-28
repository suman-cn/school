<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Exam extends CI_Controller {

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
        $this->load->library('form_validation');
        $this->load->model('super-admin-session-year/model_session');
        $this->load->model('super-admin-exam-type/model_exam_type');
        $this->load->model('model_exam');
        if (!$this->session->userdata('school_admin')) {
            redirect('school-admin-login/login');
        }
    }

  	public function entryOfExamReport()
  	{
        $session_details = $this->session->userdata('school_admin');
        $data['logged_id'] = $session_details->logged_id;
        $data['school'] = $session_details->school;
        if ($this->input->post()) {
          $this->form_validation->set_rules('subject', 'Subject', 'trim|required|max_length[255]');
          $this->form_validation->set_rules('marks', 'Marks', 'trim|required|max_length[255]');
          $this->form_validation->set_rules('out_of', 'Total Marks', 'trim|required|max_length[255]');
          $this->form_validation->set_rules('taken_by', 'Taken By', 'trim|required|max_length[255]');

          $this->form_validation->set_message('required', '%s can\'t be blank');
          $this->form_validation->set_message('max_length', 'Max 255 character only allowed');

          if( $this->form_validation->run() === FALSE ){
              $this->load->view('record_student_of_exam', $data);
          }else{
              $insert_data = $this->input->post();
              $insert_data['school_id'] = $data['logged_id'];
              $insert_data['student_id'] = 2;
              $this->db->insert('exam_report', $insert_data);
              redirect('school-admin-exam/exam/entryOfExamReport');
          }
        }else{
            $data['session'] = $this->model_session->showAllSessionFrontend();
            $data['types'] = $this->model_exam_type->showAllTypesFrontend();
  		      $this->load->view('record_student_of_exam', $data);
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
