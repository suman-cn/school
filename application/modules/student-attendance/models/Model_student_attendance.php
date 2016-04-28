<?php

  Class Model_student_attendance extends CI_Model {

      function __construct() {
          parent::__construct();
          $this->load->database();
      }

      function showAllStudentAttendance($data) {
          $query = $this->db->get_where('super_admin', array('email' => $data['user_name'], 'password' => $data['password']));
          $result = ($query->num_rows() > 0) ? $query->first_row() : '';
          return $result;
      }
  }