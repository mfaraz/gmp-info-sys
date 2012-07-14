<?php

class User_security extends CI_Model {

    public function  __construct() {
        $this->load->helper('url');
        if($this->session->userdata('admin_id') == '' || $this->session->userdata('admin_username') == '') {
            redirect('admin/logout', 'refresh');
        } 
    }
}
?>
