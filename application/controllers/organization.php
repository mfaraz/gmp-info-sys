<?php
class Organization extends Controller {
    public function index() {
        //$this->template->load('admintemplate', 'branch/index');
    }

    public function orgmemberinfo()
    {
        $this->load->model("common_model");
        $chairman_list = $this->common_model->getChairmanList();
        $chairman_by_division = $this->common_model->getChairmanListByDivision(1);
        $data['chairman_list'] = $chairman_list;
        $data['chairman_by_division'] = $chairman_by_division;
        $this->template->load('template', 'orgmemberinfo', $data);
    }

    public function committeememberlist()
    {
        $this->load->model("common_model");
        $orgdetailsmain_arr = $this->common_model->getOrgDetailsMain();
        $orgdetailsyouth_arr = $this->common_model->getOrgDetailsYouth();
        $orgdetailswomen_arr = $this->common_model->getOrgDetailsWomen();

        $data['orgdetailsmain_arr'] = $orgdetailsmain_arr;
        $data['orgdetailsyouth_arr'] = $orgdetailsyouth_arr;
        $data['orgdetailswomen_arr'] = $orgdetailswomen_arr;

        $this->template->load('template', 'committememberlist', $data);
    }
}
?>