<?php

  Class Model_exam extends CI_Model {

      function __construct() {
          parent::__construct();
          $this->load->database();
      }


      function showAllTypes() {
          $query = $this->db->get_where('exam_type', array('is_deleted' => 0));
          $result = ($query->num_rows() > 0) ? $query->result(): '';
          return $result;
      }

      function showExamTypeDetails($data) {
          $query = $this->db->get_where('exam_type', array('id' => $data));
          $result = ($query->num_rows() > 0) ? $query->first_row() : '';
          return $result;
      }
  }