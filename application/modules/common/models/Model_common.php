<?php

  Class Model_common extends CI_Model {

      function __construct() {
          parent::__construct();
          $this->load->database();
      }

      
      function viewTableStatus( $id, $table ){
          $this->db->select('status');
          $query = $this->db->get_where( $table, array('id' => $id));
          $result = ($query->num_rows() > 0) ? $query->first_row() : '';
          return $result;
      }
  }