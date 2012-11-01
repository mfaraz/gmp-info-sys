<?php
class Organization extends Controller {
    public function index() {
        $this->template->load('admintemplate', 'organization/index');
    }

    public function addorganization()
    {
        $this->load->model("adminorg_model");
        $cat_arr = $this->adminorg_model->getRelOrgCat();
        $data['cat_arr'] = $cat_arr;
        $this->template->load('admintemplate', 'organization/addorganization', $data);
    }

    public function doaddorganization()
    {
        $this->load->model("adminbranch_model");
        $add_org = $this->adminbranch_model->addOrganization($_POST);
        if($add_org)
        {
            $this->template->load('admintemplate', 'secu/organization/index');
        } else {
            $data['error_msg'] = "Error has occured while adding new organization. Please contact system administrator";
            $this->template->load('admintemplate', 'secu/organization/addbranch', $data);
        }
    }
    
    public function addmember()
    {
        $this->load->model("adminorg_model");
        $this->load->model("adminbranch_model");
        $data['cat_arr'] = $this->adminbranch_model->getOrgCat();
        $data['designation_arr'] = $this->adminbranch_model->getDesignations();
        $this->template->load('admintemplate', 'organization/addmember', $data);
    }

    public function doaddmember()
    {
        error_reporting(E_ALL);
        $this->load->model("adminorg_model");

        $add_member = $this->adminorg_model->addMember($_POST);
        if($add_member)
        {
            $this->template->load('admintemplate', 'secu/organization/index');
        } else {
            $data['error_msg'] = "Error has occured while adding new member. Please contact system administrator";
            $this->template->load('admintemplate', 'secu/branch/addbranch', $data);
        }
    }

    public function addreligiousorg()
    {
        $this->load->model("adminorg_model");
        $cat_arr = $this->adminorg_model->getRelOrgCat();
        $data['cat_arr'] = $cat_arr;
        $this->template->load('admintemplate', 'organization/addreligiousorg', $data);
    }

    public function doaddreligiousorg()
    {
        error_reporting(E_ALL);
        $this->load->model("adminorg_model");
        $add_org = $this->adminorg_model->addRelOrg($_POST);
        if($add_org)
        {
            $this->template->load('admintemplate', 'secu/organization/index');
        } else {
            $data['error_msg'] = "Error has occured while adding new organization. Please contact system administrator";
            $this->template->load('admintemplate', 'secu/organization/addbranch', $data);
        }
    }

    public function addbranchorg()
    {
        $this->load->model("adminorg_model");
        $this->load->model("adminbranch_model");
        $data['cat_arr'] = $this->adminbranch_model->getOrgCat();
        $this->template->load('admintemplate', 'organization/addbranchorg', $data);
    }

    public function doaddbranchorg()
    {
        error_reporting(E_ALL);
        $this->load->model("adminorg_model");
        $add_org = $this->adminorg_model->addBranchOrg($_POST);
        if($add_org)
        {
            $this->template->load('admintemplate', 'secu/organization/index');
        } else {
            $data['error_msg'] = "Error has occured while adding new organization. Please contact system administrator";
            $this->template->load('admintemplate', 'secu/organization/addbranch', $data);
        }
    }
}
?>
