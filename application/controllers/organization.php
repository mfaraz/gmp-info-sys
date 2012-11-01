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
}
?>