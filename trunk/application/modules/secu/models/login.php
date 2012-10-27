<?php
class Login extends Model {

    public function admin_login($user_name, $user_password) {
    	$user_name;
        $this->load->library('encrypt');
        $user_name = trim($user_name);
        $user_password = $this->encrypt->sha1(trim($user_password));
        $login_sql = "SELECT admin_id,
                             admin_username,
                             status,
                             admin_usertype
                        FROM tbl_admin 
                       WHERE admin_username = ?
                         AND admin_passwd = ? ";
        try {
            $user_login = $this->db->query($login_sql,array($user_name, $user_password));
            if($user_login->num_rows() > 0) {
                $user_row = $user_login->row();
                if(trim($user_row->status) == 1) {
                    $this->assign_sessions($user_row->admin_id, $user_row->admin_username, $user_row->admin_usertype);
                    return TRUE;
                } else {
                    return FALSE;
                }
            } else {
                return FALSE;
            }
        }  catch(Exception $e){
            throw new Exception('Error in DB query');
        }
        
        
    }

    private function assign_sessions($admin_id, $admin_username, $admin_usertype) {
        // echo $admin_usertype; exit;
        try {
            $logged_user_details = array('admin_id' => $admin_id,
                                         'admin_username' => $admin_username,
                                           'admin_usertype' => $admin_usertype
                                         );
            $this->session->set_userdata($logged_user_details);
        } catch (Exception $e) {
            throw new Exception('Error session assign');
        }
    }
}
?>
