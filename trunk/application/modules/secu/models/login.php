<?php

class Login extends  Model {

    public function admin_login($user_name, $user_password) {
        $this->load->library('encrypt');
        $user_name = trim($user_name);
        $user_password = md5(trim($user_password));
        $login_sql = "SELECT admin_id,
                            admin_username,
                            admin_passwd,
                             admin_firstname,
                             admin_lastname,
                             admin_usertype,
                             status
                      FROM tbl_admin
                      WHERE admin_username = ?
                      AND admin_passwd = ? ";
        try {
            $admin_login = $this->db->query($login_sql,array($user_name, $user_password));
            //print_r($admin_login);
            if($admin_login->num_rows() > 0) {
                $admin_row = $admin_login->row();
                //echo $admin_row->status; exit;
                if($admin_row->status == 1) {
                    $this->assign_sessions($admin_row->admin_id, $admin_row->admin_username,$admin_row->usertype);
                    return TRUE;
                } else {
                    return 0;
                }
            } else {
                return FALSE;
            }
        }  catch(Exception $e){
            throw new Exception('Error in DB query');
        }
    }

    private function assign_sessions($admin_id, $admin_username,$admin_usertype) {
        // echo $admin_usertype; exit;
        try {
            $logged_user_details = array('admin_id' => $admin_id,
                                         'admin_username' => $admin_username,
                                          'admin_usertype'=>$admin_usertype
                                         );
            $this->session->set_userdata($logged_user_details);
        } catch (Exception $e) {
            throw new Exception('Error session assign');
        }
    }
}
?>
