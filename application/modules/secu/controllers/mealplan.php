<?php
class Mealplan extends Controller {
    public function index() {
        $data["partnerlang"]=$this->config->item("partnerlang");
        $this->load->model('mealplan_model');
        $this->load->library("pagination");
        $config = array();
        $config["base_url"] = base_url() ."secu/mealplan/index/";
        $config["total_rows"] = $this->mealplan_model->get_mealplan_list_count();
        $config["per_page"] = 10;
        $config["uri_segment"] = 4;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $data["pagination"] = $this->pagination->create_links();
        $acclist=$this->mealplan_model->get_mealplan_list($config["per_page"], $page);
        $data["acclist"]=$acclist;
        $this->template->set('controller', $this);
        $this->template->set('title', "login");
        $this->template->load_partial('admintemplate','mealplan/index',$data);

    }

   public function addmealplan() {
        $data["partnerlang"]=$this->config->item("partnerlang");
       // $this->template->load('admintemplate','admin/mealplan',$data);
        $this->template->set('controller', $this);
        $this->template->set('title', "login");
        $this->template->load_partial('admintemplate','mealplan/mealplan',$data);
    }

    public function doaddmealplan()
    {
          $validate_mealplan = array(
                array( 'field' => 'txtname',
                       'label' => 'Meal plan',
                       'rules' => 'required')
            );
        $mealplandetails=array();
             $mealplandetails = array( 'mealplandetails' => array(
             "name"  =>$this->input->post('txtname')
             ,"txtStatus"=>$this->input->post('txtStatus')
                     ));
          //   print_r($_POST);exit;
            $this->session->set_userdata($mealplandetails);
            $this->form_validation->set_error_delimiters('<div class="alert">', '</div>');
            $this->form_validation->set_rules($validate_mealplan);

            if ($this->form_validation->run() == FALSE) {
                $this->template->set('controller', $this);
                $this->template->set('title', "login");
                $this->template->load_partial('admintemplate', 'mealplan/mealplan',$data);

            } else  {
              //$this->template->set('product_header', 'Admin Home');
              $this->load->model('mealplan_model');
              $this->mealplan_model->addnewmealplan($mealplandetails["mealplandetails"]);
              redirect('secu/mealplan/index');
              //$this->load->model('user_security');
            }

    }

    /*public function mealplanlist() {
        $data["partnerlang"]=$this->config->item("partnerlang");
        $this->load->model('mealplan');
        $acclist=$this->mealplan->get_mealplan_list();
        $data["acclist"]=$acclist;
        $this->template->load('admintemplate','admin/mealplanlist',$data);
    }*/

    public function mealplanedit()
    {
        $id= $this->uri->segment(5);
    //    echo "****".$accid;exit;
        $data["partnerlang"]=$this->config->item("partnerlang");
        $this->load->model('mealplan_model');
        $mealplandetails=$this->mealplan_model->get_mealplan_details($id);

             $this->session->set_userdata($mealplandetails);
        $data["mealplandetails"]=$mealplandetails;
        $this->template->load('admintemplate','secu/mealplan/mealplanedit',$data);
    }

    public function doeditmealplan()
    {
           $validate_mealplan = array(
                array( 'field' => 'txtname',
                       'label' => 'Meal plan',
                       'rules' => 'required')
            );
        $mealplandetails=array();
             $mealplandetails = array( 'mealplandetails' => array(
             "id"=>$this->input->post('id'),
             "name"  =>$this->input->post('txtname')
             ,"txtStatus"=>$this->input->post('txtStatus')
                     ));
          //   print_r($_POST);exit;
            $this->session->set_userdata($mealplandetails);
            $this->form_validation->set_error_delimiters('<div class="alert">', '</div>');
            $this->form_validation->set_rules($validate_mealplan);

            if ($this->form_validation->run() == FALSE) {
                $this->template->set('controller', $this);
                $this->template->set('title', "login");
                $this->template->load_partial('admintemplate','mealplan/mealplanedit',$data);
             //   $this->template->load('admintemplate', 'admin/mealplan',$data);

            } else  {
              //$this->template->set('product_header', 'Admin Home');
              $this->load->model('mealplan_model');
              $this->mealplan_model->doeditmealplan($mealplandetails["mealplandetails"]);
              redirect('secu/mealplan/index');
              //$this->load->model('user_security');
            }

    }

     public function mealplandelete()
    {

              //$this->template->set('product_header', 'Admin Home');
               $id= $this->uri->segment(5);
              $this->load->model('mealplan_model');
              $this->mealplan_model->deletemealplan($id);
              redirect('secu/mealplan/index');
              //$this->load->model('user_security');
      }

   

}
?>
