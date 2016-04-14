<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Common extends CI_Controller {

  	/**
  	 * Login form of super admin.
  	 * @see https://codeigniter.com/user_guide/general/urls.html
  	 */

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->model('model_common');
    }


    public function isDeleted() {
        $id = $this->uri->segment(3);
        $table = $this->uri->segment(4);
        $controller = $this->uri->segment(5);
        $function = $this->uri->segment(6);
        $modules = $this->uri->segment(7);
        $update = array(
            'is_deleted' => 1
        );
        $this->db->update($table, $update, "id = " . $id);
        redirect($modules . "/" . $controller . "/" . $function);
    }

  	public function ajaxChangeStatus() {
        $id = $this->input->post('id');
        $table = $this->input->post('table');
        $details = $this->model_common->viewTableStatus($id, $table);
        if($details->status == 1){
            $update_status = 0;
        }else{
            $update_status = 1;
        }
        $update = array(
            'status' => $update_status
        );
        $this->db->update($table, $update, "id = " . $id);
        if($update_status == 0){
            echo '<img src="'.base_url() . 'assets/img/inactive.png" alt="Inactive" >';
        }else{
            echo '<img src="'.base_url() . 'assets/img/active.gif" alt="Active" >';
        }
    }

    
}
