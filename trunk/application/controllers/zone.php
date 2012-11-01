<?php
class Zone extends Controller {
    public function index() {
        //$this->template->load('admintemplate', 'branch/index');
    }

    public function info() {
        //error_reporting(E_ALL);
        $division_id = $this->uri->segment(3);
        $zone_id = $this->uri->segment(4);

        $this->load->model("common_model");
        $zone_arr = $this->common_model->getZoneInfoById($division_id, $zone_id);
        $data['zone_arr'] = $zone_arr;
        $data['division_id'] = $division_id;
        $data['zone_id'] = $zone_id;

        $zone_info = $this->common_model->getZoneById($zone_id);
        $data['zone_info'] = $zone_info;

        $this->template->load('template', 'zoneinfo', $data);
    }
}
?>