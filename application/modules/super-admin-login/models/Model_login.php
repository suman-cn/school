<?php

  Class Model_login extends CI_Model {

      function __construct() {
          parent::__construct();
          $this->load->database();
      }

      function login($data) {
          $query = $this->db->get_where('super_admin', array('email' => $data['user_name'], 'password' => $data['password'], 'status' => 1, 'is_deleted' => 0 ));
          $result = ($query->num_rows() > 0) ? $query->first_row() : '';
          return $result;
      }
  }