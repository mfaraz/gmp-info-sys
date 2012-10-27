<?php
class Branch extends Controller {
    public function index() {
        $this->template->load('admintemplate', 'branch/index');
    }

    public function getzonesbydivs()
    {
        $outputStr = "";
        $division_id = $_POST['division_id'];
        $this->load->model("adminbranch_model");
        $result_arr = $this->adminbranch_model->getZonesByDivisionId($division_id);
        $outputStr .= "<option value=''>Select Zone</option>";
        foreach ($result_arr as $result)
        {
            $outputStr .= "<option value='" . $result['zoneid'] . "'>" . $result['zonename'] . "</option>";
        }

        echo $outputStr;
    }

    public function addbranch()
    {
        $this->load->model("adminbranch_model");
        $data['zones'] = $this->adminbranch_model->getZones($_SESSION['sess_div_id']);
        $data['populationcat_arr'] = $this->adminbranch_model->getPopulationCats();
        $this->template->load('admintemplate', 'branch/addbranch', $data);        
    }

    public function doaddbranch()
    {
        $this->load->model("adminbranch_model");
        $add_branch = $this->adminbranch_model->addBranch($_POST);
        if($add_branch)
        {
            $this->template->load('admintemplate', 'secu/branch/index');
        } else {
            $data['error_msg'] = "Error has occured while adding new branch. Please contact system administrator";
            $this->template->load('admintemplate', 'secu/branch/addbranch', $data);
        }
    }

    public function getbranchbyzone()
    {
        $outputStr = "";
        $division_id = $_POST['division_id'];
        $zone_id = $_POST['zone_id'];
        $this->load->model("adminbranch_model");
        $result_arr = $this->adminbranch_model->getBranchByZoneId($division_id, $zone_id);
        
        $outputStr .= "<option value=''>Select Branch</option>";
        foreach ($result_arr as $result)
        {
            $outputStr .= "<option value='" . $result['branchid'] . "'>" . $result['branchname'] . "</option>";
        }

        echo $outputStr;
    }

    public function getorgbybranch()
    {
        $outputStr = "";
        $division_id = $_POST['division_id'];
        $zone_id = $_POST['zone_id'];
        $branch_id = $_POST['branch_id'];
        
        $this->load->model("adminbranch_model");
        $result_arr = $this->adminbranch_model->getOrgByBranchId($division_id, $zone_id, $branch_id);

        $outputStr .= "<option value=''>Select Branch</option>";
        foreach ($result_arr as $result)
        {
            $outputStr .= "<option value='" . $result['orgid'] . "'>" . $result['orgname'] . "</option>";
        }

        echo $outputStr;
    }

    public function editbranch()
    {
        $branch_id = $_POST['branch_id'];
        $this->load->model('adminbranch_model');
        $branch_arr = $this->adminbranch_model->getBranchDetailsById($branch_id);

        $return_str = "";


        $return_str .= "<form name='zoneform' id='zoneform' method='post' action='" . base_url() . "secu/zone/doeditzone' onsubmit='return validateForm()'>";
        foreach ($branch_arr as $branch_entry) {
            if($branch_entry['tbl_divisions_divisionid'] == 1) { $div1_sel = "selected='selected'"; }
            if($branch_entry['tbl_divisions_divisionid'] == 2) { $div2_sel = "selected='selected'"; }

            $return_str .= "<fieldset style='width: 370px;'>";
            $return_str .= "<label>Division</label>";
            $return_str .= "<select name='division'>";
            $return_str .= "<option value=''>Select Division</option>";
            $return_str .= "<option value='1' " . $div1_sel . ">Uda Palatha</option>";
            $return_str .= "<option value='2' " . $div2_sel . ">Doluwa</option>";
            $return_str .= "</select>";
            $return_str .= "</fieldset>";
            $return_str .= "<fieldset>";
            $return_str .= "<label>Zone</label>";
            $return_str .= "<select name='zone' id='zone'>";
            $return_str .= "<option value=''>Select Zone</option>";

            $return_str .= "</select>";
            $return_str .= "</fieldset>";
        }

        $return_str .= "</form>";

        echo $return_str;
    }
}
?>
