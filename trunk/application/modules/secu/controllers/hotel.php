<?php
class Hotel extends Controller {
    public function index() {
        $data["partnerlang"]=$this->config->item("partnerlang");
        $hoteldetails=array();
        $hoteldetails = array( 'hoteldetails' => array());
        $data["hoteldetails"]=$hoteldetails;
        $this->load->model("admincommon_model");
        $this->load->model("adminhotel_model");
        $this->load->model("accomodation_model");
        $this->load->model("mealplan_model");
        $this->session->set_userdata($hoteldetails);
        $data["country_arr"] = $this->admincommon_model->country_list();
        $data["fac_arr"] = $this->adminhotel_model->get_facilty();
        $data["acc_arr"] = $this->accomodation_model->get_accomodation_list_forhotelform();
        $data["mealplan_arr"] = $this->mealplan_model->get_mealplan_list_forhotelform();
      //   print_r($data["mealplan_arr"]);exit;
        $this->load->library('breadcrumb');
        $this->breadcrumb->seperator='<div class="breadcrumb_divider"></div>';
        $this->breadcrumb->addCrumb('Hotel',base_url()."secu/hotel/hotellist");
        $this->breadcrumb->addCrumb('New Hotel',"#");
        $data['breadcrumb'] = $this->breadcrumb->makeBread();  
        $this->template->set('controller', $this);
        $this->template->set('title', "Add New Hotel");
        $this->template->load('admintemplate', 'hotel/hotel',$data);


    }

    public function addhotel()
    {
         $partnerlang = $this->config->item("partnerlang");

                $validate_hotel = array(
                array( 'field' => 'txtContactName',
                       'label' => 'Contact Name',
                       'rules' => 'required'),
                array( 'field' => 'txtEmailAddress',
                       'label' => 'Email',
                       'rules' => 'required')
            );

             $hoteldetails = array(
             "txtContactName"  =>$this->input->post('txtContactName'),
             "txtEmailAddress"  =>$this->input->post('txtEmailAddress'),
             "paddress1"  =>$this->input->post('paddress1'),
             "paddress2"  =>$this->input->post('paddress2'),
             "txtPostalCode"  =>$this->input->post('txtPostalCode'),
             "country"  =>$this->input->post('country'),
             "city"  => $this->input->post('city'),
             "txtPhoneNo"  =>$this->input->post('txtPhoneNo'),
             "txtFaxNo"  =>$this->input->post('txtFaxNo'),
             "txtWebAddress"  =>$this->input->post('txtWebAddress'),
             "hotelnameuk"  =>$this->input->post('hotelnameuk'),
             "hotelnamede"  =>$this->input->post('hotelnamede'),
             "hoteltype"  =>$this->input->post('hoteltype'),
             "numStars"  =>$this->input->post('numStars'),
             "numBeds"  =>$this->input->post('numBeds'),
             "txtHdescriptionsuk"  =>$this->input->post('txtHdescriptionsuk'),
             "txtHdescriptionsde"  =>$this->input->post('txtHdescriptionsde'),
             "facility"  =>$this->input->post('facility'),
             "accomodation"  =>$this->input->post('accomodation'),
             "mealplan"=>$this->input->post('mealplan')
                  );
            if($this->session->userdata("admin_usertype")=="superadmin"){
                $hoteldetails=array_merge($hoteldetails, array("remarks"=>$this->input->post('remarks')));
            }
            $this->session->set_userdata($hoteldetails);
            $this->form_validation->set_error_delimiters('<div class="alert">', '</div>');
            $this->form_validation->set_rules($validate_hotel);

            //print_r($this->form_validation->run());exit;

            if ($this->form_validation->run() == FALSE) {

                //$this->template->load('admintemplate', 'admin/hotel',$data);
                $this->template->load_partial('admintemplate', 'hotel/hotel',$data);
            } else  {
              //$this->template->set('product_header', 'Admin Home');
              $this->load->model('adminhotel_model');
              $this->adminhotel_model->add_hotel($hoteldetails, $partnerlang);
               redirect(base_url() . 'secu/hotel/hotellist');
            }


    }
     public function hotellist() {
        $this->load->model('adminhotel_model');
        $this->load->library("pagination");
        $config = array();
        $config["base_url"] = base_url() ."secu/hotel/hotellist/";
        $config["total_rows"] = $this->adminhotel_model->list_hotel_count();
        $config["per_page"] = 10;
        $config["uri_segment"] = 4;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $data["partnerlang"]=$this->config->item("partnerlang");
        $data["hotel_arr"] = $this->adminhotel_model->list_hotel($config["per_page"], $page);
        $data["pagination"] = $this->pagination->create_links();
        $data["hotel_lang"] = $this->adminhotel_model->get_hotel_lang();
        $this->load->library('breadcrumb');
        $this->breadcrumb->seperator='<div class="breadcrumb_divider"></div>';
        $this->breadcrumb->addCrumb('Hotel',base_url()."secu/hotel/hotellist");
        $data['breadcrumb'] = $this->breadcrumb->makeBread();  
        $this->template->load('admintemplate','hotel/hotellist',$data);

    }

    public function edithotel()
        {
            $data["partnerlang"]=$this->config->item("partnerlang");
            $hotel_id=$this->uri->segment(5);
            $this->load->model('adminhotel_model');
            $this->load->model('admincommon_model');
            $this->load->model('accomodation_model');
            $this->load->model('mealplan_model');
            $data["hotel_arr"] = $this->adminhotel_model->get_hotel_details_by_id($hotel_id);
            $data["country_arr"] = $this->admincommon_model->country_list();
            $data["fac_arr"] = $this->adminhotel_model->get_facilty_foredit($hotel_id);
            $data['hotel_lang_arr'] = $this->adminhotel_model->get_hotel_lang_by_id($hotel_id);
            $data["acc_arr"] = $this->accomodation_model->get_accomodation_list_forhoteledit($hotel_id);
            $data["mealplan_arr"] = $this->mealplan_model->get_mealplan_list_foredit($hotel_id);
         //   print_r( $data["mealplan_arr"] );exit;
            $this->load->library('breadcrumb');
            $this->breadcrumb->seperator='<div class="breadcrumb_divider"></div>';
            $this->breadcrumb->addCrumb('Hotel',base_url()."secu/hotel/hotellist");
            $this->breadcrumb->addCrumb('Edit Hotel',"#");
            $data['breadcrumb'] = $this->breadcrumb->makeBread();  
            $this->template->load('admintemplate','hotel/edithotel',$data);
        }
        public function updatehotel()
        {
           $data["partnerlang"]=$this->config->item("partnerlang");
           $hotel=array();
           $hotelarr=array();
           if($_POST)
           {
               $hotelid = $this->input->post("hotelid");

               $this->load->model('adminhotel_model');
               $this->adminhotel_model->update_hotel($_POST, $data);
               redirect(base_url() . 'secu/hotel/hotellist');
           }
        }

        public function delhotel()
        {
            $hotelid = $this->input->post("hotelid");
            $this->load->model('adminhotel_model');
            $this->adminhotel_model->delete_hotel($hotelid);
            redirect(base_url() . 'secu/hotel/hotellist');
        }

            public function getcity()
            {
                $this->load->model('admincommon_model');
                $country_id = $_POST['country_id'];
                $city_arr = $this->admincommon_model->get_city_by_country($country_id);
                $output_str = "<select name=\"city\" id=\"city\">";
                $output_str .= "<option value=\"0\">Select City</option>";
                foreach($city_arr as $city_list) {
                    $output_str .= "<option value='" . $city_list['city_id'] . "'>" . $city_list['city_name'] . "</option>";
                }
                $output_str .= "</select>";
                echo $output_str;
                //return $output_str;
                //$this->template->load('admintemplate','admin/hotel',$data);
                exit;
            }

   

}
?>
