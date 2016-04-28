<?php

  Class Model_session extends CI_Model {

      function __construct() {
          parent::__construct();
          $this->load->database();
      }


      function showAllBatchSession() {
          $query = $this->db->get_where('class_session', array('is_deleted' => 0));
          $result = ($query->num_rows() > 0) ? $query->result(): '';
          return $result;
      }

      function showAllBatchSessionDetails($data) {
          $query = $this->db->get_where('class_session', array('id' => $data));
          $result = ($query->num_rows() > 0) ? $query->first_row() : '';
          return $result;
      }

      function showAllSessionFrontend() {
          $query = $this->db->get_where('class_session', array( 'status' => 1, 'is_deleted' => 0));
          $results = ($query->num_rows() > 0) ? $query->result(): '';
          if(!empty($results)){
              foreach ($results as $value) {
                  $result[$value->id] = $value->name;   
              }
              return $result;
          }else{
              return $results;
          }
      }
  }