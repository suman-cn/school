<?php

  Class Model_student_login extends CI_Model {

      function __construct() {
          parent::__construct();
          $this->load->database();
      }

      function loginCredentials($data) {
          $query = $this->db->get_where('student_register', array('student_id' => $data, 'status' => 1, 'is_deleted' => 0 ));
          $result = ($query->num_rows() > 0) ? $query->first_row() : '';
          return $result;
      }
  }