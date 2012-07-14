<?php
class Hotelroomtype extends Controller {


         public function index()
    {

               //$this->template->set('product_header', 'Admin Home');
               //  print_r($this->uri);
               $id= $this->uri->segment(5);
               $this->load->model('adminhotel_model');
               $this->load->model('roomtype');
               // $hoteldetails=$this->adminhotel_model->get_hotel_details_by_id($id);
               //print_r($hoteldetails);
               //$data["hoteldetails"]=$hoteldetails;
               $this->load->model('adminhotel_model');
               $hoteldetails=$this->adminhotel_model->get_hotel_lang_by_id($id);
               $totalremaingrooms=$this->roomtype->getremainingrooms($id);
           // print_r($totalremaingrooms); exit;
               $data["hotelname"]=$hoteldetails[0]["hotelname_uk"];
               $data["remainingrooms"]=$totalremaingrooms["remainingrooms"];
               $data["id"]=$id;
                $this->load->library('breadcrumb');
                $this->breadcrumb->seperator='<div class="breadcrumb_divider"></div>';
                $this->breadcrumb->addCrumb('Hotel',base_url()."secu/hotel/hotellist");
                $this->breadcrumb->addCrumb($data["hotelname"],base_url()."secu/hotel/edithotel/hotelid/".$id);
                $this->breadcrumb->addCrumb('Hotel Roomtypes',base_url()."secu/hotelroomtype/roomtypelist/id/".$id);
                $this->breadcrumb->addCrumb('Add New Hotel Roomtypes',"#");
                $data['breadcrumb'] = $this->breadcrumb->makeBread();  
               $this->template->load('admintemplate','hotelroomtype/roomtype',$data);

               //$this->load->model('user_security');
      }
           public function addroomtype()
     {
               $validate_roomtype = array(
                array( 'field' => 'name',
                       'label' => 'name',
                       'rules' => 'required')
            );
               $id=$this->input->post('id');
               $data["id"]=$id;
             $roomtypedetails=array();
             $roomtypedetails = array( 'roomtypedetails' => array(
             "id"  =>$this->input->post('id')
             ,"name"  =>$this->input->post('name')
             ,"roomtype"=>$this->input->post('roomtype')
             ,"noofbeds"=>$this->input->post('noofbeds')
             ,"adult"=>$this->input->post('adult')
             ,"child"=>$this->input->post('child')
             ,"childage"=>$this->input->post('childage')
            ,"adultage"=>$this->input->post('adultage')
             ,"extraroom"=>$this->input->post('extraroom')
             ,"status"=>$this->input->post('status')
              ,"noofallotrooms"=>$this->input->post('noofallotrooms')
              ,"fromdate"=>$this->input->post('fromdate')
              ,"todate"=>$this->input->post('todate')
                     ));
            //  print_r($roomtypedetails);exit;
            $this->session->set_userdata($roomtypedetails);
            $this->form_validation->set_error_delimiters('<div class="alert">', '</div>');
            $this->form_validation->set_rules($validate_roomtype);
            $data["roomtypedetails"]=$roomtypedetails["roomtypedetails"];
            if ($this->form_validation->run() == FALSE) {

                $this->template->load('admintemplate', 'hotelroomtype/roomtype',$data);

            } else  {
              //$this->template->set('product_header', 'Admin Home');
              $this->load->model('roomtype');
              $this->roomtype->addnewroomtype($roomtypedetails["roomtypedetails"]);
              redirect('secu/hotelroomtype/roomtypelist/id/'.$id);
              //$this->load->model('user_security');
            }
      }
        public function roomtypelist() {
        $data["partnerlang"]=$this->config->item("partnerlang");
       // print_r($this->uri);
        $id=$this->uri->segment(5);
        $data["id"]=$id;
        $this->load->model('roomtype');
        $this->load->library("pagination");
        $config = array();
        $config["base_url"] = base_url() ."secu/hotelroomtype/roomtypelist/id/".$id;
        $config["total_rows"] = $this->roomtype->get_roomtype_list_count($id);
        $config["per_page"] = 10;
        $config["uri_segment"] = 6;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(6)) ? $this->uri->segment(6) : 0;
        $data["pagination"] = $this->pagination->create_links();
       // $acclist=$this->facility_model->get_facility_list($config["per_page"], $page);
        $list=$this->roomtype->get_roomtype_list($id,$config["per_page"], $page);
          $this->load->model('adminhotel_model');
                $hoteldetails=$this->adminhotel_model->get_hotel_lang_by_id($id);
             // print_r($hoteldetails);
        $data["hotelname"]=$hoteldetails[0]["hotelname_uk"];
        $data["list"]=$list;
         $this->load->library('breadcrumb');
                $this->breadcrumb->seperator='<div class="breadcrumb_divider"></div>';
                $this->breadcrumb->addCrumb('Hotel',base_url()."secu/hotel/hotellist");
                $this->breadcrumb->addCrumb($data["hotelname"],base_url()."secu/hotel/edithotel/hotelid/".$id);
                $this->breadcrumb->addCrumb('Hotel Roomtypes',"#");
                $data['breadcrumb'] = $this->breadcrumb->makeBread();  
        $this->template->load('admintemplate','hotelroomtype/roomtypelist',$data);
    }

    public function roomtypeedit()
    {
       // print_r($this->uri);
        $id= $this->uri->segment(5);
        $hid= $this->uri->segment(7);
        $data["partnerlang"]=$this->config->item("partnerlang");
        $this->load->model('roomtype');
        $details=$this->roomtype->get_roomtype_details($id);
        $this->session->set_userdata($facilitydetails);
        $data["roomtypedetails"]=$details;
                  $this->load->model('adminhotel_model');
                $hoteldetails=$this->adminhotel_model->get_hotel_lang_by_id($hid);
            //  print_r($data["roomtypedetails"]["noofallotrooms"]);
        $data["hotelname"]=$hoteldetails[0]["hotelname_uk"];
        $remainingrooms=$this->roomtype->getremainingrooms($hid);
         $data["remainingrooms"]=$remainingrooms["remainingrooms"]-(int)$data["roomtypedetails"]["noofallotrooms"];
        $this->template->load('admintemplate','hotelroomtype/roomtypeedit',$data);
    }

       public function doeditroomtype()
     {
               $validate_roomtype = array(
                array( 'field' => 'name',
                       'label' => 'name',
                       'rules' => 'required')
            );
               $id=$this->input->post('id');
                $hid=$this->input->post('hid');
               $data["id"]=$id;
               $data["hid"]=$hid;
             $roomtypedetails=array();
             $roomtypedetails = array( 'roomtypedetails' => array(
             "id"  =>$this->input->post('id')
             ,"name"  =>$this->input->post('name')
             ,"roomtype"=>$this->input->post('roomtype')
             ,"noofbeds"=>$this->input->post('noofbeds')
             ,"adult"=>$this->input->post('adult')
             ,"child"=>$this->input->post('child')
             ,"childage"=>$this->input->post('childage')
            ,"adultage"=>$this->input->post('adultage')
             ,"extraroom"=>$this->input->post('extraroom')
             ,"status"=>$this->input->post('status')
             ,"noofallotrooms"=>$this->input->post('noofallotrooms')
             ,"fromdate"=>$this->input->post('fromdate')
              ,"todate"=>$this->input->post('todate')
                     ));
            //  print_r($roomtypedetails);exit;
            $this->session->set_userdata($roomtypedetails);
            $this->form_validation->set_error_delimiters('<div class="alert">', '</div>');
            $this->form_validation->set_rules($validate_roomtype);
            $data["roomtypedetails"]=$roomtypedetails["roomtypedetails"];
            if ($this->form_validation->run() == FALSE) {

                $this->template->load('admintemplate', 'hotelroomtype/roomtype',$data);

            } else  {
              //$this->template->set('product_header', 'Admin Home');
              $this->load->model('roomtype');
              $this->roomtype->updateroomtype($roomtypedetails["roomtypedetails"]);
              redirect('secu/hotelroomtype/roomtypelist/id/'.$hid);
              //$this->load->model('user_security');
            }
      }



           public function roomtypedelete()
    {

              //$this->template->set('product_header', 'Admin Home');
            //   print_r($this->uri);exit;
              $id= $this->uri->segment(5);
              $hid= $this->uri->segment(7);
              $this->load->model('roomtype');
              $this->roomtype->deleteroomtype($id);
              redirect('secu/hotelroomtype/roomtypelist/id/'.$hid);
              //$this->load->model('user_security');
      }
}
?>
