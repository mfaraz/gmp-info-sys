<?php
class Admin extends Controller {
	public function index() {
    	$this->load->helper(array('form', 'url'));
       	$this->load->library('log');
       	
       	if($this->session->userdata('admin_id') != '' && $this->session->userdata('admin_username') != '') {
			$this->template->load('admintemplate', 'secu/admin/home');
       	} else {
       		$data['error_msg'] = "";
        	$this->template->set('title', 'Administrator Login');
        	$this->template->load('adminlogin', 'secu/admin/login', $data);
       	}
    }

    public function admin_area() {
        
    	//$this->load->helper(array('form', 'url'));
    	$this->load->library('form_validation');

        $validate_admin_login = array(
            array( 'field' => 'user_name',
                   'label' => 'User Name',
                   'rules' => 'required|xss_clean|callback_login_validate'),
            array( 'field' => 'user_password',
                   'label' => 'Password',
                   'rules' => 'required')
        );

        $this->form_validation->set_error_delimiters('<div class="alert">', '</div>');
        $this->form_validation->set_rules($validate_admin_login);
		
        if ($this->form_validation->run() == FALSE) {
           	$data['error_msg'] = "";
            $this->template->load('adminlogin', 'secu/admin/login', $data);
        } else  {
	        if($this->login_validate())
	        {
	        	//$this->template->load('admintemplate', 'secu/admin/home');
                    redirect('secu/admin/home');
	        } else { 
	        	$data['error_msg'] = "Invalid username or password";
	        	$this->template->load('adminlogin', 'secu/admin/login', $data);
	        }	
        }
    }
    
    public function home() {
        $this->load->model('adminzone_model');
        $data['zoneup_arr'] = $this->adminzone_model->getZones(1);
        $data['zonedl_arr'] = $this->adminzone_model->getZones(2);
        $this->template->load('admintemplate','secu/admin/home', $data);
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
        $this->template->load('adminlogin', 'secu/admin/login', $data);
    }

    public function getbranches()
    {
        $output_str = "";
        $zone_id = $_POST['zone_id'];
        $sect = $_POST['sect'];
        $this->load->model('admincommon_model');
        $branch_arr = $this->admincommon_model->getBranchesByZoneId($zone_id);
        
        if(count($branch_arr) > 0)
        {
            echo "<h4>Branches (ශාඛා)</h4>";
        }

        if($sect == "up") {
            $division_id = 1;
        } else if($sect == "dl") {
            $division_id = 2;
        }
        foreach ($branch_arr as $branch_entry)
        {
            $output_str .= "<p><a href='javascript: void(0);' onclick='javascript: listOrganizations(" . $zone_id . ", " . $branch_entry['branchid'] . ", " . $division_id . ", \"" . $sect . "\")'>" . $branch_entry['branchname'] . "</a></p>";
        }

        echo $output_str;
    }

    public function getorgdetails()
    {
        $output_str = "";
        $zone_id = $_POST['zone_id'];
        $branch_id = $_POST['branch_id'];
        $division_id = $_POST['division_id'];
        $this->load->model('admincommon_model');
        $org_arr = $this->admincommon_model->getOrgDetails($zone_id, $branch_id, $division_id);

        if(count($org_arr) > 0)
        {
            echo "<h4>Organization Info</h4>";
        
            $output_str .= "<table border='1' width='100%'>";
            $output_str .= "<tr><td align='center'><b>Org Name</b></td><td align='center'><b>Org Address</b></td><td align='center'><b>Org Tel</b></td></tr>";
            foreach ($org_arr as $org_entry)
            {
                //$output_str .= "<p>" . $org_entry['orgname'] . "</p>";
                $output_str .= "<tr><td>" . $org_entry['orgname'] . "</td><td>" . $org_entry['ordaddress'] . "</td><td>" .  $org_entry['orgtelno'] . "</td>";
            }

            $output_str .= "</table>";

            echo $output_str;
        }
    }
}
?>