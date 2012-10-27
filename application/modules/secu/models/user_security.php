<?php

class User_security extends Model {

    public function  __construct() {
        $ci = get_instance();
    	$ci->load->helper('url');
        if($ci->session->userdata('admin_id') == '' || $ci->session->userdata('admin_username') == '') {
            redirect('secu/admin/logout', 'refresh');
        } 
    }
}
?>
