<?php
class Accomodation extends Controller {
    public function accomodationlist() {
        $data["partnerlang"]=$this->config->item("partnerlang");
        $this->load->model('accomodation_model');
        $this->load->library("pagination");
        $config = array();
        $config["base_url"] = base_url() ."secu/accomodation/accomodationlist/";
        $config["total_rows"] = $this->accomodation_model->get_accomodation_list_count();
        $config["per_page"] = 10;
        $config["uri_segment"] = 4;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $data["pagination"] = $this->pagination->create_links();
        $acclist=$this->accomodation_model->get_accomodation_list($config["per_page"], $page);
        $data["acclist"]=$acclist;
        $this->template->set('controller', $this);
        $this->template->set('title', "login");
        $this->template->load_partial('admintemplate','accomodation/accomodationlist',$data);

    }

   public function addaccomodation() {
        $data["partnerlang"]=$this->config->item("partnerlang");
       // $this->template->load('admintemplate','admin/accomodation',$data);
        $this->template->set('controller', $this);
        $this->template->set('title', "login");
        $this->template->load_partial('admintemplate','accomodation/accomodation',$data);
    }

    public function doaddaccomodation()
    {
          $validate_accomodation = array(
                array( 'field' => 'txttitle',
                       'label' => 'Title',
                       'rules' => 'required')
            );
        $acomdationdetails=array();
             $acomdationdetails = array( 'acomdationdetails' => array(
             "txttitle"  =>$this->input->post('txttitle')
             ,"txtStatus"=>$this->input->post('txtStatus')
                     ));
          //   print_r($_POST);exit;
            $this->session->set_userdata($acomdationdetails);
            $this->form_validation->set_error_delimiters('<div class="alert">', '</div>');
            $this->form_validation->set_rules($validate_accomodation);

            if ($this->form_validation->run() == FALSE) {
                $this->template->set('controller', $this);
                $this->template->set('title', "login");
                $this->template->load_partial('admintemplate', 'accomodation/accomodation',$data);

            } else  {
              //$this->template->set('product_header', 'Admin Home');
              $this->load->model('accomodation_model');
              $this->accomodation_model->addnewaccomodation($acomdationdetails["acomdationdetails"]);
              redirect('secu/accomodation/accomodationlist');
              //$this->load->model('user_security');
            }

    }

    /*public function accomodationlist() {
        $data["partnerlang"]=$this->config->item("partnerlang");
        $this->load->model('accomodation');
        $acclist=$this->accomodation->get_accomodation_list();
        $data["acclist"]=$acclist;
        $this->template->load('admintemplate','admin/accomodationlist',$data);
    }*/

    public function accomodationedit()
    {
        $accid= $this->uri->segment(5);
    //    echo "****".$accid;exit;
        $data["partnerlang"]=$this->config->item("partnerlang");
        $this->load->model('accomodation_model');
        $accdetails=$this->accomodation_model->get_accomodation_details($accid);
        $acomdationdetails=array();
             $acomdationdetails = array( 'acomdationdetails' => array(
             "txttitle"  =>$acomdationdetails["accdesc"]
             ,"txtStatus"=>$acomdationdetails["status"]
                     ));
             $this->session->set_userdata($acomdationdetails);
        $data["accdetails"]=$accdetails;
        $this->template->load('admintemplate','secu/accomodation/accedit',$data);
    }

    public function doeditacomdation()
    {
          $validate_accomodation = array(
                array( 'field' => 'txttitle',
                       'label' => 'Title',
                       'rules' => 'required')
            );
        $acomdationdetails=array();
             $acomdationdetails = array( 'acomdationdetails' => array(
             "id"=>$this->input->post('id'),
             "txttitle"  =>$this->input->post('txttitle')
             ,"txtStatus"=>$this->input->post('txtStatus')
                     ));
          //   print_r($_POST);exit;
            $this->session->set_userdata($acomdationdetails);
            $this->form_validation->set_error_delimiters('<div class="alert">', '</div>');
            $this->form_validation->set_rules($validate_accomodation);

            if ($this->form_validation->run() == FALSE) {
                $this->template->set('controller', $this);
                $this->template->set('title', "login");
                $this->template->load_partial('admintemplate','accomodation/accedit',$data);
             //   $this->template->load('admintemplate', 'admin/accomodation',$data);

            } else  {
              //$this->template->set('product_header', 'Admin Home');
              $this->load->model('accomodation_model');
              $this->accomodation_model->doeditacomdation($acomdationdetails["acomdationdetails"]);
              redirect('secu/accomodation/accomodationlist');
              //$this->load->model('user_security');
            }

    }

     public function accomodationdelete()
    {

              //$this->template->set('product_header', 'Admin Home');
               $accid= $this->uri->segment(5);
              $this->load->model('accomodation_model');
              $this->accomodation_model->deleteacomdation($accid);
              redirect('secu/accomodation/accomodationlist');
              //$this->load->model('user_security');
      }

   

}
?>
