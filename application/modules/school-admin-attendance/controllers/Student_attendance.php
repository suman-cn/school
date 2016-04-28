<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student_attendance extends CI_Controller {

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
        $this->load->model('school-admin-student/model_student_register');
        $this->load->model('model_school_attendance');
        if (!$this->session->userdata('school_admin')) {
            redirect('school-admin-login/login');
        }
    }

  	public function giveAttendance( $attendance_month = NULL )
  	{
        $session_details = $this->session->userdata('school_admin');
        $data['logged_id'] = $session_details->logged_id;
        $data['school'] = $session_details->school;

        if ($this->input->post()) {
            foreach( $this->input->post('attendance') as $student_id => $attendance ){
                $checkMonthAttendance = $this->model_school_attendance->showStudentAttendance( $student_id, $this->input->post('hid_month') );
                $insert_data = array(
                                  'school_id' => $data['logged_id'],
                                  'student_id' => $student_id,
                                  'month' => $this->input->post('hid_month'),
                                  'attendance' => json_encode($attendance)
                                );
                if(empty($checkMonthAttendance)){
                    $this->db->insert('student_attendance', $insert_data);
                }else{
                    $this->db->update( 'student_attendance', $insert_data, "id = " . $checkMonthAttendance->id);
                }
            }
            redirect('school-admin-attendance/student_attendance/giveAttendance/'.$attendance_month);
        }else{

            if( $attendance_month != NULL ){
                $present_date_array = explode("-",$attendance_month);
                $next_date = $present_date_array[0]."-".$present_date_array[1]."-01";
                $data['present_month'] = $attendance_month;
            }else{
                $present_date = date('Y-m-d', time());
                $present_date_array = explode("-",$present_date);
                $next_date = $present_date_array[0]."-".$present_date_array[1]."-01";
                $data['present_month'] = date('Y-m', strtotime($next_date));
            }
            $present_month_date[$next_date] = $next_date."<br>".date('D', strtotime($next_date));
            
            $previous_month_date = date('Y-m-d', strtotime($next_date .' -1 day'));
            $data['previous_month'] = date('Y-m', strtotime($previous_month_date));

            $date_variable = 1;

            $data['school_students'] = $this->model_student_register->showAllStudent($data['logged_id']);
            if(!empty($data['school_students'])){
                foreach( $data['school_students'] as $student ){
                    $attendance[$student->id] = $this->model_school_attendance->showStudentAttendance( $student->id, $data['present_month'] );
                }
            }

            while($date_variable == 1) {

                $current_date_array = explode("-",$next_date);
                $next_date = date('Y-m-d', strtotime($next_date .' +1 day'));
                $next_ber = date('D', strtotime($next_date));
                $present_date_array = explode("-",$next_date);
                
                if( ($present_date_array[2] - $current_date_array[2]) != 1 ){
                    $date_variable = 2;
                    $first_date_next_month = $next_date;
                    break;
                }else{
                    $present_month_date[$next_date] = $next_date."<br>".$next_ber;
                    $date_variable = 1;
                }
            }

            $data['attendance'] = $attendance;
            $data['present_month_date'] = $present_month_date;
            $data['next_month'] = date('Y-m', strtotime($first_date_next_month));
      		  $this->load->view('student_attendance_entry', $data);
        }
  	}
}
