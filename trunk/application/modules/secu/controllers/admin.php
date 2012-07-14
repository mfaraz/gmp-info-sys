<?php
class Admin extends Controller {
    public function index() {
        $data["error_msg"]="";
       $this->load->helper(array('form', 'url'));
       $this->load->library('log');
       if($this->session->userdata('admin_id') != '' && $this->session->userdata('admin_username') != '') {
        //$this->template->set('product_header', 'Admin Home');
          redirect("secu/admin/home");
          //$this->load->model('user_security');
       } else {
          
            $this->template->set('controller', $this);
             $this->template->set('title', "login");
            $this->template->load_partial('adminlogin', 'admin/login',$data);
       }

    }

    public function admin_area() {
     
        //$this->load->helper(array('form', 'url'));
        $validate_admin_login = array(
            array( 'field' => 'user_name',
                   'label' => 'User Name',
                   'rules' => 'required|login_validate'),
            array( 'field' => 'user_password',
                   'label' => 'Password',
                   'rules' => 'required')
        );
        $user_name = $this->input->post('user_name');
        $user_password = $this->input->post('user_password');
        $this->form_validation->set_error_delimiters('<div class="alert">', '</div>');
        $this->form_validation->set_rules($validate_admin_login);

        if (($this->form_validation->run() == FALSE)|| ($this->login_validate($user_name, $user_password)==FALSE)) {

           redirect("secu/admin");

	} else  {
          //$this->template->set('product_header', 'Admin Home');
           redirect("secu/admin/admin_area");
          //$this->load->model('user_security');
        }

    }
    public function home() {
        $this->load->model('adminhotel_model');
        $data["partnerlang"]=$this->config->item("partnerlang");
        //$data["hotel_arr"] = $this->adminhotel_model->list_hotel();
       // $data["hotel_lang"] = $this->adminhotel_model->get_hotel_lang();
        $this->template->load('admintemplate','admin/home',$data);

    }
    public function login_validate($user_name,$user_password) {
        $this->load->model('login');

        $user_login_status = $this->login->admin_login($user_name, $user_password);
        if($user_login_status == 1) {
            return TRUE;
        }
        else if($user_login_status == 0) {
            //$error = "Invalid Username or Passwor";
            $this->form_validation->set_message('login_validate', 'Invalid Username or Password');
            return FALSE;
        }

        $data['error_msg'] = $error;
    }
    public function logout() {
        $this->session->sess_destroy();
        redirect("secu/admin");
    }

   

}
?>
