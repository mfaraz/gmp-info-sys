<?php
class Branch extends Controller {
    public function index() {
        //$this->template->load('admintemplate', 'branch/index');
    }

    public function info() {
        //error_reporting(E_ALL);
        $division_id = $this->uri->segment(3);
        $zone_id = $this->uri->segment(4);
        $branch_id = $this->uri->segment(5);

        $this->load->model("common_model");
        $zone_info = $this->common_model->getZoneById($zone_id);
        $branch_info = $this->common_model->getBranchById($division_id, $zone_id, $branch_id);
        $data['zone_info'] = $zone_info;
        $data['branch_info'] = $branch_info;
        $data['division_id'] = $division_id;
        $data['zone_id'] = $zone_id;
        $data['branch_id'] = $branch_id;

        $branch_arr = $this->common_model->getBranchInfoById($division_id, $zone_id, $branch_id);
        $data['branch_arr'] = $branch_arr;

        $orgmeminfo = $this->common_model->getOrgMemInfo($division_id, $zone_id, $branch_id, 5); // 5 is Main org.
        $data['mainorgmeminfo'] = $orgmeminfo;

        $youthorgmeminfo = $this->common_model->getOrgMemInfo($division_id, $zone_id, $branch_id, 6); // 6 is Youth org.
        $data['youthorgmeminfo'] = $youthorgmeminfo;

        $womenorgmeminfo = $this->common_model->getOrgMemInfo($division_id, $zone_id, $branch_id, 7); // 7 is Women org.
        $data['womenorgmeminfo'] = $womenorgmeminfo;

        $this->template->load('template', 'branchinfo', $data);
    }
}
?>