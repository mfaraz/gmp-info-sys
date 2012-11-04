<?php
class Common extends Controller {
    public function index() {
        //$this->template->load('admintemplate', 'branch/index');
    }

    public function getregion()
    {
        $division_id = $_POST['division_id'];
        $this->load->model("common_model");
        $region_arr = $this->common_model->getZonesByDivision($division_id);
        echo "<select name=\"zone\" class=\"roundList\" id=\"cmbRegion\" onchange=\"getBranch(this.value, " . $division_id . ")\">";
        echo "<option value=\"\">Select..</option>";
        foreach ($region_arr as $_data)
        {
            echo "<option value='" . $_data['zoneid'] . "'>" . $_data['zonename'] . "</option>";
        }
        echo "</select>";
        //$data['region_arr'] = $region_arr;
        //$this->template->view('orgmemsearchresult', $data);
    }

    public function getbranch()
    {
        $this->load->model("common_model");
        $zoneid = $_POST['zoneid'];
        $divisionid = $_POST['divisionid'];
        $branch_arr = $this->common_model->getBranchInfoByZone($zoneid, $divisionid);

        echo "<select name=\"branch\" class=\"roundList\" id=\"cmbBranch\">";
        echo "<option value=\"\">Select..</option>";
        foreach ($branch_arr as $_data)
        {
            echo "<option value='" . $_data['branchid'] . "'>" . $_data['branchname'] . "</option>";
        }
        echo "</select>";
    }

    public function getsearchresult()
    {
        $division = $_POST['division'];
        $region = $_POST['region'];
        $branch = $_POST['branch'];
        $this->load->model("common_model");
        $_collection = $this->common_model->getSearchResult($division, $region, $branch);
        $data['_collection'] = $_collection;
        $data['division'] = $division;
        $this->load->view('searchresult', $data);

        /*foreach ($_collection as $_data)
        {

        }*/
    }

}
?>