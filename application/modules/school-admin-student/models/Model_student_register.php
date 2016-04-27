<?php

  Class Model_student_register extends CI_Model {

      function __construct() {
          parent::__construct();
          $this->load->database();
      }

      function showAllStudent($id) {
          $query = $this->db->get_where('student_register', array('school_id' => $id, 'status' => 1, 'is_deleted' => 0));
          $result = ($query->num_rows() > 0) ? $query->result(): '';
          return $result;
      }
  }