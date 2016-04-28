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
        $this->load->model('school-admin-attendance/model_school_attendance');
        if (!$this->session->userdata('student_session_jksjad787e')) {
            redirect('student-login/login');
        }
    }

  	public function showAttendance( $attendance_month = NULL )
  	{
        $session_details = $this->session->userdata('student_session_jksjad787e');
        $data['logged_id'] = $session_details->logged_id;
        $data['student_name'] = $session_details->student_name;
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
        $attendance = $this->model_school_attendance->showStudentAttendance( $data['logged_id'], $data['present_month'] );
        //print_r($attendance); die;
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
        $this->load->view('student_attendance_show', $data);
  	}
}
