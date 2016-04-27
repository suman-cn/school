<?php

  Class Model_school_attendance extends CI_Model {

      function __construct() {
          parent::__construct();
          $this->load->database();
      }

      function showAllStudentAttendance($data) {
          $this->db->select(' student_register.student_name, student_register.student_id, student_attendance.*');
          $this->db->join('student_attendance', 'student_attendance.student_id = student_register.id', 'left');
          $query = $this->db->get_where('student_register', array('student_register.status' => 1, 'student_register.is_deleted' => 0, 'student_register.school_id' => $data['school_id'], 'student_attendance.month' => $data['recent_month'] ));
          $result = ($query->num_rows() > 0) ? $query->result(): '';
          return $result;
      }

      function showStudentAttendance( $id, $month ) {
          $query = $this->db->get_where('student_attendance', array( 'student_id' => $id, 'month' => $month ));
          $result = ($query->num_rows() > 0) ? $query->first_row(): '';
          return $result;
      }
  }