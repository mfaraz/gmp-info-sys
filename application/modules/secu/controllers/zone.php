<?php
class Zone extends Controller {
    public function index() {
        
    }

    public function addzone()
    {
        $this->template->load('admintemplate', 'zone/addzone');
    }

    public function doaddzone()
    {
        $data['file_error'] = "";
        $this->load->library('form_validation');

        $validate_add_zone = array(
            
            array( 'field' => 'division',
                   'label' => 'Division',
                   'rules' => 'required'),
            array( 'field' => 'zone_name',
                   'label' => 'Zone Title',
                   'rules' => 'required'),
            array( 'field' => 'zone_desc',
                   'label' => 'Zone Description',
                   'rules' => 'required')
        );

        $this->form_validation->set_error_delimiters('<div class="error_msg">', '</div>');
        $this->form_validation->set_rules($validate_add_zone);

        if ($this->form_validation->run() == FALSE) {
            $data['error_msg'] = "";
            $this->template->load('admintemplate', 'secu/zone/addzone', $data);
        } else  {
            $this->load->model('adminzone_model');           
            $add_zone = $this->adminzone_model->addZone($_POST);
            if($add_zone)
            {
                $this->template->load('admintemplate', 'secu/zone/index');
            } else {
                $data['error_msg'] = "Error has occured while adding new zone. Please contact system administrator";
                $this->template->load('admintemplate', 'secu/zone/addzone', $data);
            }
            //$this->admineflyer_model->addFlyerDetails($_POST, $_FILES);
            //$this->template->load('admintemplate', 'secu/eflyer/index');
        }
    }

    public function editzone()
    {
        $zoneid = $_POST['zone_id'];
        $this->load->model('adminzone_model');
        $zone_arr = $this->adminzone_model->getZoneInfoById($zoneid);

        $return_str = "";


        $return_str .= "<form name='zoneform' id='zoneform' method='post' action='" . base_url() . "secu/zone/doeditzone' onsubmit='return validateForm()'>";
        foreach ($zone_arr as $zone_entry) {
            if($zone_entry['tbl_divisions_divisionid'] == 1) { $div1_sel = "selected='selected'"; }
            if($zone_entry['tbl_divisions_divisionid'] == 2) { $div2_sel = "selected='selected'"; }

            $return_str .= "<fieldset style='width: 370px;'>";
            $return_str .= "<label>Division</label>";
            $return_str .= "<select name='division'>";
            $return_str .= "<option value=''>Select Division</option>";
            $return_str .= "<option value='1' " . $div1_sel . ">Uda Palatha</option>";
            $return_str .= "<option value='2' " . $div2_sel . ">Doluwa</option>";
            $return_str .= "</select>";
            $return_str .= "</fieldset>";
            $return_str .= "<fieldset>";
            $return_str .= "<label>Zone Name</label>";
            $return_str .= "<input type='text' name='zone_name' id='zone_name' value='" . $zone_entry['zonename'] . "' />";
            $return_str .= "</fieldset>";
            $return_str .= "<fieldset>";
            $return_str .= "<label>Description</label>";
            $return_str .= "<textarea name='zone_desc' id='zone_desc' cols='50' rows='8'>" . $zone_entry['zonename'] . "</textarea>";
            $return_str .= "</fieldset>";
            $return_str .= "<fieldset>";
            $return_str .= "<input type='submit' name='submit' id='submit' value='SAVE' />&nbsp;";
            $return_str .= "<input type='reset' name='reset' id='cancel_form' value='CANCEL' onclick='$(window).colorbox.close();' />";
            $return_str .= "<input type='hidden' name='zoneid' value='" . $zone_entry['zoneid'] . "' />";
            $return_str .= "</fieldset>";
        }

        $return_str .= "</form>";

        echo $return_str;
    }

    public function doeditzone()
    {
        $this->load->model("adminzone_model");
        $update_zone = $this->adminzone_model->updateZone($_POST);
        if($update_zone)
        {
            redirect(base_url() . 'secu/admin/home');
        }
    }

    public function deletezone()
    {
        $zone_id = $_POST['zone_id'];
        $this->load->model("adminzone_model");
        $delete_zone = $this->adminzone_model->deleteZone($zone_id);
        if($delete_zone)
        {
            //redirect(base_url() . 'secu/admin/home');
            return true;
        }
    }
}
