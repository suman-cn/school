<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student_register extends CI_Controller {

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
        $this->load->model('super-admin-school/model_school');
        if (!$this->session->userdata('school_admin')) {
            redirect('school-admin-login/login');
        }
    }

  	public function index()
  	{
        $session_details = $this->session->userdata('school_admin');
        $data['logged_id'] = $session_details->logged_id;
        $data['school'] = $session_details->school;
        if ($this->input->post()) {
          $school_details = $this->model_school->showAllSchoolDetails($data['logged_id']);
          $insert_data = $this->input->post();
          $insert_data['school_id'] = $session_details->logged_id;
          $insert_data['password'] = md5('123456');
          $insert_data['created_at'] = time();
          $this->db->insert('student_register', $insert_data);
          $insert_id = $this->db->insert_id();
          $update = array( 'student_id' => $school_details->register_code.$this->input->post('student_name')[0].$insert_id );
          $this->db->update( 'student_register', $update, "id = " . $insert_id);
          redirect('school-admin-student/student_register');
        }else{
  		      $this->load->view('register_student', $data);
        }
  	}

    public function ajaxCheckForSchoolCode()
    {
        if ($this->input->is_ajax_request()) {
            if($this->input->post('name')){
                
                $name = $this->input->post('name');
                $short_code = $this->checkDataBaseShortCode($name);
                echo $short_code;
                exit;
            }else{
                exit('name not found');
            }
        }else{
            exit('No direct script access allowed');
        }
    }


    public function checkDataBaseShortCode($name)
    {
        $short_code = "";
        $name_array = explode(" ", $name);
        foreach($name_array as $short){
            $short_code .= strtoupper($short[0]);
        }
        $rand = rand( 1000, 9999 );
        $short_code = $short_code.$rand;
        $result = $this->model_school->checkForShortCode($short_code);
        if($result){
            $this->checkDataBaseShortCode($name);
        }else{
          return $short_code;
        }
    }


    public function ajaxCheckForSchoolCodeExist()
    {
        if ($this->input->is_ajax_request()) {
            if($this->input->post('code')){
                
                $code = $this->input->post('code');
                $result = $this->model_school->checkForShortCode($code);
                if($result){
                    echo "match";
                }else{
                    echo "not match";
                }
                exit;
            }else{
                exit('code not found');
            }
        }else{
            exit('No direct script access allowed');
        }
    }


    public function viewRegisterSchool()
    {
        $session_details = $this->session->userdata('super_admin');
        $data['users_type'] = $session_details->users_type;
        $data['users_nikname'] = $session_details->users_nikname;
        $data['schools'] = $this->model_school->showAllSchool();
        $this->load->view('view_register_school', $data);
    }

    public function editRegisterSchool($id)
    {
        $session_details = $this->session->userdata('super_admin');
        $data['users_type'] = $session_details->users_type;
        $data['users_nikname'] = $session_details->users_nikname;
        if ($this->input->post()) {
            $update = $this->input->post();
            $this->db->update( 'school_register', $update, "id = " . $this->input->post('id'));
            redirect('super-admin-school/school/viewRegisterSchool');
        }else{
            $data['school'] = $this->model_school->showAllSchoolDetails($id);
            $this->load->view('edit_register_school', $data);
        }
    }
}
