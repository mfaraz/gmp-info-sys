<?php
class Division extends Controller {
    public function index() {
        //$this->template->load('admintemplate', 'branch/index');
    }

    public function info() {
        $division_id = $this->uri->segment(3);

        $this->load->model("common_model");
        $population_arr = $this->common_model->getDivisionInfo($division_id);
        $data['population_arr'] = $population_arr;
        $data['division_id'] = $division_id;
        $this->template->load('template', 'info', $data);
    }

    public function gampolainfo()
    {
        $this->load->model("common_model");
        $gampola_info_arr = $this->common_model->getGampolaInfo();
        $data['gampola_info_arr'] = $gampola_info_arr;
        $this->template->load('template', 'gampolainfo', $data);
    }
}
?>