<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends Controller {

	function __construct()
	{
            parent::__construct();
            //$this->template->load('template', 'home');            
        }

	function index()
	{
        if($this->session->userdata('admin_id') > 0) {
            redirect('index/dashboard');
        }
        $this->template->load('logintemplate', 'login');
    }

    public function home()
    {
        $this->load->library('form_validation');

        $validate_admin_login = array(
            array( 'field' => 'user_name',
                'label' => 'User Name',
                'rules' => 'required|xss_clean|callback_login_validate'),
            array( 'field' => 'user_password',
                'label' => 'Password',
                'rules' => 'required')
        );

        $this->form_validation->set_error_delimiters('<div class="login_error">', '</div>');
        $this->form_validation->set_rules($validate_admin_login);

        if ($this->form_validation->run() == FALSE) {
            $data['error_msg'] = "";
            $this->template->load('logintemplate', 'login', $data);
        } else  {
            if($this->login_validate())
            {

                //$this->template->load('admintemplate', 'secu/admin/home');
                redirect('index/dashboard');
            } else {
                $data['error_msg'] = "Invalid username or password";
                $this->template->load('logintemplate', 'login', $data);
            }
        }
    }

    public function login_validate() {
        $this->load->model('login');
        $user_name = $this->input->post('user_name');
        $user_password = $this->input->post('user_password');
        $user_login_status = $this->login->admin_login($user_name, $user_password);
        //echo $user_login_status; exit;
        if($user_login_status) {
            return TRUE;
        }
        else {
            //$this->form_validation->set_message('login_validate', 'Invalid username or password');
            return FALSE;
        }
    }
    public function logout() {
        $this->session->sess_destroy();
        $data['error_msg'] = "";
        $this->template->load('logintemplate', 'login', $data);
    }

    public function dashboard()
    {
        if($this->session->userdata('admin_id') == 0) {
            redirect('index');
        }

        /*if(isset($this->session->userdata('admin_id')))
        {
            redirect('index/login');
        }*/
        $this->template->load('template', 'home');
    }

    public function getadminprofile()
    {
        $this->load->model('login');
        $admin_id = $this->input->post('admin_id');

        $admin_arr = $this->login->getAdminInfo($admin_id);
        //print_r($admin_arr);
        echo "<table border=\"1\" width=\"100%\" id=\"profiler\">";
        echo "<tr><th colspan=\"2\"><h2>" . $admin_arr->admin_firstname . " " . $admin_arr->admin_lastname . "</h2></th></tr>";
        echo "<tr>";
        echo "<td rowspan=\"2\"><img width=\"60\" alt=\"\" src=\"" . base_url() . "images/log-face.jpg\"></td>";
        echo "<td valign=\"top\">" . $admin_arr->admin_firstname . " " . $admin_arr->admin_lastname . "<br />" . $admin_arr->admin_usertype . "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td valign=\"top\"><b>Member Since:</b>  " . $admin_arr->create_date . "</td>";
        echo "</tr>";
        echo "</table>";
        /*echo "<div id=\"logininfo\">";
        echo "<h3>" . $admin_arr->admin_firstname . " " . $admin_arr->admin_lastname . "</h3>";
        echo "<p><img width=\"60\" alt=\"\" class=\"image-01-right\" src=\"images/log-face.jpg\">Welcome <b>anuradha</b><br>You logged as admin";
        echo "</div>";*/
    }
}