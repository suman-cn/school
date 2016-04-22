<?php

  Class Model_school_login extends CI_Model {

      function __construct() {
          parent::__construct();
          $this->load->database();
      }

      function login($data) {
          $query = $this->db->get_where('school_register', array('register_code' => $data['user_name'], 'password' => $data['password'], 'status' => 1, 'is_deleted' => 0 ));
          $result = ($query->num_rows() > 0) ? $query->first_row() : '';
          return $result;
      }

      function loginCredentials($data) {
          $query = $this->db->get_where('school_register', array('register_code' => $data, 'status' => 1, 'is_deleted' => 0 ));
          $result = ($query->num_rows() > 0) ? $query->first_row() : '';
          return $result;
      }
  }