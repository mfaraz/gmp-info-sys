<?php
class Hotel extends Controller {



    public function index() {
      

    }

    public function list_hotels()
    {

      //  print_r($this->uri);
        $acc_id=$this->uri->segment(5);
        $this->load->model('hotel_model');
        $this->load->library("pagination");
        $config = array();
        $config["base_url"] = base_url() ."/hotel/list_hotels/acc_id/".$acc_id;
        $config["total_rows"] = $this->hotel_model->get_hotel_list_count($acc_id);
        $config["per_page"] = 5;
        $config["uri_segment"] = 5;
        $config['prev_tag_open'] = '<li id="pagecontroller_prev">';
        $config['prev_tag_close'] = '</li>';
         $config['next_tag_open'] = '<li id="pagecontroller_prev">';
        $config['next_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li><b>';
        $config['cur_tag_close'] = '</li></b>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['lastm_tag_close'] = '</li>';

        $this->pagination->initialize($config);
        $page = ($this->uri->segment(6)) ? $this->uri->segment(6) : 0;
        $data["pagination"] = $this->pagination->create_links();
        $data["hoteldetailarray"]= $this->hotel_model->get_hotel_list($acc_id,$config["per_page"], $page);
       // print_r( $data["hoteldetailarray"]);exit;
        foreach($data["hoteldetailarray"] as $arr)
        {
            $facilityarr[$arr["hotelid"]]=$this->hotel_model->get_hotel_facilities($arr["hotelid"]);
        }
        $data["hotelfacilityarray"]= $facilityarr;
        $this->template->set('title', '');
        $this->load->library('breadcrumb');
        $this->breadcrumb->Breadcrumb();
        $this->breadcrumb->addCrumb('Accomodation');
        $this->breadcrumb->addCrumb($this->uri->segment(3));
        $data['breadcrumb'] = $this->breadcrumb->makeBread();    
        $data["acc_arr"] = $this->hotel_model->get_accomodations();
        $this->template->load('template', 'hotel_list', $data);
    }

    public function hotel_details()
    {
        $hotel_id=$this->uri->segment(4);
        $this->load->model('hotel_model');
        $hoteldetailarray= $this->hotel_model->get_hotel_details_by_hotel_id($hotel_id);
        $data["hotelid"]=$hoteldetailarray["hotelid"];
        $data["hotelname"]=$hoteldetailarray["hotelname"];
        $data["hoteldesc"]=$hoteldetailarray["hoteldesc"];
        $data["ratingcount"]=$hoteldetailarray["ratingcount"];
        $data["hotelfacilityarray"]= $this->hotel_model->get_hotel_facilities($hotel_id);
        $data["hotelimagearray"]= $this->hotel_model->get_hotel_images($hotel_id);
        $hotelcontents=$this->hotel_model->get_hotel_content($hotel_id);
        $mealplans=$this->hotel_model->get_meal_plans_by_hotel($hotel_id);
      //  print_r($mealplans);
        $data["location"]  =$hotelcontents["location"];
        $data["about"]  =$hotelcontents["about"];
        $data["accomodation"]  =$hotelcontents["accomodation"];
        $data["facilities"]  =$hotelcontents["facilities"];
        $data["excursion"]  =$hotelcontents["excursion"];
        $data["mealplans"]=$mealplans;
        $data["acc_arr"] = $this->hotel_model->get_accomodations();
        // print_r($data);exit;
        $this->template->set('title', '');
        $this->template->load('template', 'hotel_detail', $data);
    }

    

    

}
?>
