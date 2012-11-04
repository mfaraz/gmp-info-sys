<?php
class Religious extends Controller {
    public function index() {
        //$this->template->load('admintemplate', 'branch/index');
    }

    public function info()
    {
        $category = $this->uri->segment(3);
        $this->load->model("common_model");

        $religious_info = $this->common_model->getReligiousInfo(ucfirst($category));
        $data['religious_info'] = $religious_info;

        $data['category'] = $category;
        $this->template->load('template', 'religious', $data);

    }

    public function details()
    {
        $orgid = $this->uri->segment(3);
        $this->load->model("common_model");

        $detail_arr = $this->common_model->getOrgDetailsById($orgid);
        $data['detail_arr'] = $detail_arr;

        $this->template->load('template', 'relorgdetails', $data);

    }
}
?>