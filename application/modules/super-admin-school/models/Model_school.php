<?php

  Class Model_school extends CI_Model {

      function __construct() {
          parent::__construct();
          $this->load->database();
      }

      
      function checkForShortCode($data) {
          $query = $this->db->get_where('school_register', array('register_code' => $data));
          $result = ($query->num_rows() > 0) ? $query->first_row() : '';
          return $result;
      }


      function showAllSchool() {
          $query = $this->db->get_where('school_register', array('is_deleted' => 0));
          $result = ($query->num_rows() > 0) ? $query->result(): '';
          return $result;
      }

      function showAllSchoolDetails($data) {
          $query = $this->db->get_where('school_register', array('id' => $data));
          $result = ($query->num_rows() > 0) ? $query->first_row() : '';
          return $result;
      }
  }