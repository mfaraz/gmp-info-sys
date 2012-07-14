<?php
class Facility extends Controller {

      public function index()
   {
        $data["partnerlang"]=$this->config->item("partnerlang");
          $this->load->library('breadcrumb');
            $this->breadcrumb->seperator='<div class="breadcrumb_divider"></div>';
            $this->breadcrumb->addCrumb('facilities',base_url()."secu/facility/faciltylist");
            $this->breadcrumb->addCrumb('New Facility',"#");
            $data['breadcrumb'] = $this->breadcrumb->makeBread();  
        $this->template->load('admintemplate','facility/index',$data);
    }
      public function addfac()
    {
          $this->load->model('facility_model');
         $validate_facility = array(
                array( 'field' => 'name',
                       'label' => 'name',
                       'rules' => 'required')
            );
        $faciltydetails=array();
             $faciltydetails = array( 'faciltydetails' => array(
             "name"  =>$this->input->post('name')
             ,"txtStatus"=>$this->input->post('txtStatus')
                     ));
          //   print_r($_POST);exit;
            $this->session->set_userdata($faciltydetails);
            $this->form_validation->set_error_delimiters('<div class="alert">', '</div>');
            $this->form_validation->set_rules($validate_facility);

            if ($this->form_validation->run() == FALSE) {

                $this->template->load('admintemplate', 'facility/index',$data);

            } else  {
              //$this->template->set('product_header', 'Admin Home');
              
            $this->facility_model->addnewfacilty($faciltydetails["faciltydetails"]);
              redirect('secu/facility/faciltylist');
              //$this->load->model('user_security');
            }
    }

      public function faciltylist() {
        $data["partnerlang"]=$this->config->item("partnerlang");
        $this->load->model('facility_model');
        $this->load->library("pagination");
        $config = array();
        $config["base_url"] = base_url() ."secu/facility/faciltylist/";
        $config["total_rows"] = $this->facility_model->get_facility_list_count();
        $config["per_page"] = 10;
        $config["uri_segment"] = 4;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $data["pagination"] = $this->pagination->create_links();
        $acclist=$this->facility_model->get_facility_list($config["per_page"], $page);
        $data["acclist"]=$acclist;
            $this->load->library('breadcrumb');
            $this->breadcrumb->seperator='<div class="breadcrumb_divider"></div>';
            $this->breadcrumb->addCrumb('facilities',base_url()."secu/facility/faciltylist");
            $data['breadcrumb'] = $this->breadcrumb->makeBread();  
        $this->template->load('admintemplate','facility/facilitylist',$data);
    }
     public function faciltyedit()
    {
      //   print_r($this->uri);
        $accid= $this->uri->segment(5);
        $data["partnerlang"]=$this->config->item("partnerlang");
        $this->load->model('facility_model');
        $facdetails=$this->facility_model->get_facility_details($accid);
        //print_r($facilitydetails);exit("2334");
        $facilitydetails=array();
             $facilitydetails = array( 'facilitydetails' => array(
             "name"  =>$facilitydetails["accdesc"]
             ,"txtStatus"=>$facilitydetails["status"]
                     ));
             $this->session->set_userdata($facilitydetails);
        $data["accdetails"]=$facdetails;
         $this->load->library('breadcrumb');
            $this->breadcrumb->seperator='<div class="breadcrumb_divider"></div>';
            $this->breadcrumb->addCrumb('facilities',base_url()."secu/facility/faciltylist");
            $this->breadcrumb->addCrumb('Edit facility',"#");
            $data['breadcrumb'] = $this->breadcrumb->makeBread(); 
        $this->template->load('admintemplate','facility/facedit',$data);
    }
     public function doeditfacility()
    {
           $this->load->model('facility_model');
          $validate_facility = array(
                array( 'field' => 'name',
                       'label' => 'name',
                       'rules' => 'required')
            );
       $faciltydetails=array();
             $faciltydetails = array( 'faciltydetails' => array(
             "id"=>$this->input->post('id'),
             "name"  =>$this->input->post('name')
             ,"txtStatus"=>$this->input->post('txtStatus')
                     ));

            $this->session->set_userdata($faciltydetails);
            $this->form_validation->set_error_delimiters('<div class="alert">', '</div>');
            $this->form_validation->set_rules($validate_facility);

            if ($this->form_validation->run() == FALSE) {
                $this->template->load('admintemplate', 'secu/facility/facedit',$data);

            } else  {
              //$this->template->set('product_header', 'Admin Home');
              $this->facility_model->doeditfacility($faciltydetails["faciltydetails"]);
              redirect('secu/facility/faciltylist');
              //$this->load->model('user_security');
            }



    }

       public function facilitydelete()
    {

              //$this->template->set('product_header', 'Admin Home');
               $accid= $this->uri->segment(5);
              $this->load->model('facility_model');
             $this->facility_model->deletefacilty($accid);
              redirect('secu/facility/faciltylist/1');
              //$this->load->model('user_security');
      }


}
?>
