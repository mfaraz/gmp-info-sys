<?php
class Admin extends CI_Controller {

    private $imgdata = array(
        'dir' => array(
        'original' => 'images/uploads/original/',
        'thumb' => 'images/uploads/thumb/',
        'large'=>'images/uploads/large/'
    ),
    'total' => 0,
    'images' => array(),
    'error' => ''

);

private $imgerror;

    public function index() {
       $this->load->helper(array('form', 'url'));
       $this->load->library('log');
       if($this->session->userdata('admin_id') != '' && $this->session->userdata('admin_username') != '') {
        //$this->template->set('product_header', 'Admin Home');
          $this->template->load('member_facility_template', 'admin/home');
          //$this->load->model('user_security');
       } else {
           $this->template->set('title', 'Admin Login');
         $this->template->load('adminlogin', 'admin/login');
       }

    }

    public function admin_area() {
        //$this->load->helper(array('form', 'url'));
        $validate_admin_login = array(
            array( 'field' => 'user_name',
                   'label' => 'User Name',
                   'rules' => 'required|login_validate'),
            array( 'field' => 'user_password',
                   'label' => 'Password',
                   'rules' => 'required')
        );

        $this->form_validation->set_error_delimiters('<div class="alert">', '</div>');
        $this->form_validation->set_rules($validate_admin_login);
        $this->load->model('adminhotel_model');
        $data["hotel_arr"] = $this->adminhotel_model->list_hotel();

        if ($this->form_validation->run() == FALSE) {

            $this->template->load('adminlogin', 'admin/login');

	} else  {
          //$this->template->set('product_header', 'Admin Home');
            $data["partnerlang"]=$this->config->item("partnerlang");
            $data["hotel_arr"] = $this->adminhotel_model->list_hotel();
            $data["hotel_lang"] = $this->adminhotel_model->get_hotel_lang();
          $this->template->load('admintemplate', 'admin/home', $data);
          //$this->load->model('user_security');
        }

    }
    public function home() {
        $this->load->model('adminhotel_model');
        $data["partnerlang"]=$this->config->item("partnerlang");
        $data["hotel_arr"] = $this->adminhotel_model->list_hotel();
        $data["hotel_lang"] = $this->adminhotel_model->get_hotel_lang();
        $this->template->load('admintemplate','admin/home',$data);

    }
    public function login_validate() {
        $this->load->model('login');
        $user_name = $this->input->post('user_name');
        $user_password = $this->input->post('user_password');
        $user_login_status = $this->login->admin_login($user_name, $user_password);
        if($user_login_status == 1) {
            return TRUE;
        }
        else if($user_login_status == 0) {
            //$error = "Invalid Username or Passwor";
            $this->form_validation->set_message('login_validate', 'Invalid Username or Password');
            return FALSE;
        }

        $data['error_msg'] = $error;
    }
    public function logout() {
        $this->session->sess_destroy();
        $this->template->load('adminlogin', 'admin/login');
    }

    public function hotel() {
        $data["partnerlang"]=$this->config->item("partnerlang");
        $hoteldetails=array();
        $hoteldetails = array( 'hoteldetails' => array());
        $this->load->model("admincommon_model");
        $this->load->model("adminhotel_model");
        $this->load->model("accomodation");
        $this->session->set_userdata($hoteldetails);
        $data["country_arr"] = $this->admincommon_model->country_list();
        $data["fac_arr"] = $this->adminhotel_model->get_facilty();
        $data["acc_arr"] = $this->accomodation->get_accomodation_list();
      //  print_r($data["acc_arr"]);exit;
        $this->template->load('admintemplate','admin/hotel',$data);

    }
    public function addhotel()
    {
         $partnerlang = $this->config->item("partnerlang");

              /*  $validate_hotel = array(
                array( 'field' => 'txtContactName',
                       'label' => 'Contact Name',
                       'rules' => 'required'),
                array( 'field' => 'txtEmailAddress',
                       'label' => 'Email',
                       'rules' => 'required')
            );*/
                $validate_hotel = array();

             $hoteldetails = array(
             "accomodation"  =>$this->input->post('accomodation'),
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
             "htmltitletaguk"  =>$this->input->post('htmltitletaguk'),
             "htmltitletagde"  =>$this->input->post('htmltitletagde'),
             "metadescriptionuk"  =>$this->input->post('metadescriptionuk'),
             "metadescriptionde"  =>$this->input->post('metadescriptionde'),
             "metakeywordsuk"  =>$this->input->post('metakeywordsuk'),
              "metakeywordsde"  =>$this->input->post('metakeywordsde')
                  );

            $this->session->set_userdata($hoteldetails);
            $this->form_validation->set_error_delimiters('<div class="alert">', '</div>');
            $this->form_validation->set_rules($validate_hotel);

            if ($this->form_validation->run() == FALSE) {

                /*$this->template->load('admintemplate', 'admin/hotel',$data);*/
                  //$this->template->set('product_header', 'Admin Home');
              $this->load->model('adminhotel_model');
              $this->adminhotel_model->add_hotel($hoteldetails, $partnerlang);
              $this->template->load('admintemplate', 'admin/home');

            } else  {
              //$this->template->set('product_header', 'Admin Home');
              $this->load->model('adminhotel_model');              
              $this->adminhotel_model->add_hotel($hoteldetails, $partnerlang);
              $this->template->load('admintemplate', 'admin/home');
              //$this->load->model('user_security');
            }


    }
     public function hotellist() {
        $data["partnerlang"]=$this->config->item("partnerlang");
        $this->template->load('admintemplate','admin/hotel',$data);

        //$this->form_validation->set_message('txtContactName_check');
        $this->load->model('adminhotel_model');
        $data["partnerlang"]=$this->config->item("partnerlang");

        /*if ($this->form_validation->run() == FALSE)
        {
           // $this->load->view('admin/hotel');

        }
        else
        {
            $addnews = $this->adminhotel_model->add_hotel($_POST, $data["partnerlang"]);
        }*/

        $addnews = $this->adminhotel_model->add_hotel($_POST, $data["partnerlang"]);


    }
    public function accomodation() {
        $data["partnerlang"]=$this->config->item("partnerlang");
        $this->template->load('admintemplate','admin/accomodation',$data);
    }

    public function addacomdation()
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

                $this->template->load('admintemplate', 'admin/accomodation',$data);

            } else  {
              //$this->template->set('product_header', 'Admin Home');
              $this->load->model('accomodation');
              $this->accomodation->addnewaccomodation($acomdationdetails["acomdationdetails"]);
              redirect('admin/accomodationlist');
              //$this->load->model('user_security');
            }

    }

    public function accomodationlist() {
        $data["partnerlang"]=$this->config->item("partnerlang");
        $this->load->model('accomodation');
        $acclist=$this->accomodation->get_accomodation_list();
        $data["acclist"]=$acclist;
        $this->template->load('admintemplate','admin/accomodationlist',$data);
    }

    public function accomodationedit()
    {
        $accid= $this->input->get('id');
        $data["partnerlang"]=$this->config->item("partnerlang");
        $this->load->model('accomodation');
        $accdetails=$this->accomodation->get_accomodation_details($accid);
        $acomdationdetails=array();
             $acomdationdetails = array( 'acomdationdetails' => array(
             "txttitle"  =>$acomdationdetails["accdesc"]
             ,"txtStatus"=>$acomdationdetails["status"]
                     ));
             $this->session->set_userdata($acomdationdetails);
        $data["accdetails"]=$accdetails;
        $this->template->load('admintemplate','admin/accedit',$data);
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

                $this->template->load('admintemplate', 'admin/accomodation',$data);

            } else  {
              //$this->template->set('product_header', 'Admin Home');
              $this->load->model('accomodation');
              $this->accomodation->doeditacomdation($acomdationdetails["acomdationdetails"]);
              redirect('admin/accomodationlist');
              //$this->load->model('user_security');
            }

    }

     public function accomodationdelete()
    {

              //$this->template->set('product_header', 'Admin Home');
               $accid= $this->input->get('id');
              $this->load->model('accomodation');
              $this->accomodation->deleteacomdation($accid);
              redirect('admin/accomodationlist');
              //$this->load->model('user_security');
      }

/**----------------------------------------------------***/

      public function hotelcontent()
      {

        $accid= $this->input->get('id');
        $data["partnerlang"]=$this->config->item("partnerlang");
        $this->load->model('content');
        $accdetails=$this->content->getcontent($accid);
        $langdetails=$this->content->getlangcontent($accid);
        $imgdetails=$this->content->gethotelimages($accid);
      //  print_r($imgdetails);exit;
        foreach($langdetails as $langval)
        {
            $lang[trim($langval["lkey"]).trim("_".$langval["lang"])]=$langval["lvalue"];

        }
        $data["id"]=$accid;
        $data["lang"]=$lang;
        $data["accdetails"]=$accdetails;
        $data["imgdetails"]=$imgdetails;
        $data["imgerror"]=$this->imgerror;
        $this->template->load('admintemplate','admin/hotelcontent',$data);

      }

      public function savehotelcontent()
         {
             $data["partnerlang"]=$this->config->item("partnerlang");
             $content=array();
             $cnt=array();
             if($_POST["submit"])
             {
                 $id=$this->input->post("id");

                 $content["id"]=$id;
                  $content["videourl"]=$this->input->post("videourl");
                 foreach($data["partnerlang"] as $langkey=>$langval)
                 {
                     $cnt["cnt_location"][$langkey]=$this->input->post("location".$langkey);
                     $cnt["cnt_about"][$langkey]=$this->input->post("about".$langkey);
                     $cnt["cnt_accomodation"][$langkey]=$this->input->post("accomodation".$langkey);
                     $cnt["cnt_facilities"][$langkey]=$this->input->post("facilities".$langkey);
                     $cnt["cnt_excursion"][$langkey]=$this->input->post("excursion".$langkey);

                 }
                 $content["cnt"]=$cnt;
                      $this->load->model('content');
                      $this->content->savecontent($content);
                      redirect('admin/hotelcontent/?id='.$id);

             }

              //$this->load->model('user_security');


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

        public function edithotel()
        {
            $data["partnerlang"]=$this->config->item("partnerlang");
            $hotel_id=$this->input->get('hotel_id');
            $this->load->model('adminhotel_model');
            $this->load->model('admincommon_model');
            $this->load->model('accomodation');
            $data["hotel_arr"] = $this->adminhotel_model->get_hotel_details_by_id($hotel_id);
            $data["country_arr"] = $this->admincommon_model->country_list();
            $data['facility_arr'] = $this->adminhotel_model->get_hotel_facility_by_id($hotel_id);
            $data['hotel_lang_arr'] = $this->adminhotel_model->get_hotel_lang_by_id($hotel_id);
            $data["acc_arr"] = $this->accomodation->get_accomodation_list_forhoteledit($hotel_id);
            $this->template->load('admintemplate','admin/edithotel',$data);
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
               redirect(base_url() . 'admin/home');
           }
        }

        public function delhotel()
        {
            $hotelid = $this->input->post("hotelid");
            $this->load->model('adminhotel_model');
            $this->adminhotel_model->delete_hotel($hotelid);
            redirect(base_url() . 'admin/home');
        }

        public function savehotelimages()
        {
            $id=$this->input->post("id");
            $c_upload['upload_path']    = $this->imgdata['dir']['original'];
            $c_upload['allowed_types']  = 'gif|jpg|png|jpeg|x-png';
            $c_upload['max_size']       = '10000';
            $c_upload['max_width']      = '10000';
            $c_upload['max_height']     = '5000';
            $c_upload['remove_spaces']  = TRUE;

            $this->load->library('upload', $c_upload);

            if ($this->upload->do_upload()) {

                $img = $this->upload->data();
                $new_image = $this->imgdata['dir']['original'].trim($id)."_".trim(time())."_".$img['file_name'];
                $this->img_resize($img, $new_image,$id);
                unlink($this->imgdata['dir']['original'].$img['file_name']);
                $this->load->model('content');
                $this->content->saveimagestodb($id,trim($id)."_".trim(time())."_".$img['file_name']);



            } else {
                $this->imgerror= $this->upload->display_errors();
            }
              redirect('admin/hotelcontent/?id='.trim($id)."#img");

       }
       public function deletehotelimage()
       {
           $id=$this->input->get("id");
           $ori_img=$this->input->get("name");
           $hid=$this->input->get("hid");
           $this->load->model('content');
           $this->content->deleteimage($id);
           unlink($this->imgdata['dir']['original'].$ori_img);
           unlink($this->imgdata['dir']['thumb'].'thumb_'.$ori_img);
           redirect('admin/hotelcontent/?id='.trim($hid)."#img");
       }

       public function img_resize($upload,$new_image,$id)
    {
        $this->load->library('image_lib');
        $newpath = $new_image;

        $config['image_library'] = 'gd2';
        $config['source_image']    = $upload['full_path'];
        $config['new_image'] = $newpath;
        $config['maintain_ratio'] = TRUE;
        $config['width']     = 595;
        $config['height']    = 320;

        $this->image_lib->initialize($config);

        if ( ! $this->image_lib->resize())
        {
            echo $this->image_lib->display_errors();
        }

        $newpath_thumb = $this->imgdata['dir']['thumb']."thumb_".trim($id)."_".trim(time())."_".$upload['file_name'];

        unset($config);
        $this->image_lib->clear();
         $this->make_thumb($upload['full_path'],$newpath_thumb);
    }

    public function make_thumb($tempimage,$path)
    {

        $config['image_library'] = 'gd2';
        $config['source_image']    = $tempimage;
        $config['new_image'] = $path;
        $config['maintain_ratio'] = TRUE;
        $config['width']     = 100;
        $config['height']    = 80;

        $this->image_lib->initialize($config);

        if ( ! $this->image_lib->resize())
        {
            echo $this->image_lib->display_errors();
        }
    }

     public function facilty()
   {
        $data["partnerlang"]=$this->config->item("partnerlang");
        $this->template->load('admintemplate','admin/facility',$data);
    }
      public function addfac()
    {
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

                $this->template->load('admintemplate', 'admin/facility',$data);

            } else  {
              //$this->template->set('product_header', 'Admin Home');
              $this->load->model('facility');
              $this->facility->addnewfacilty($faciltydetails["faciltydetails"]);
              redirect('admin/faciltylist');
              //$this->load->model('user_security');
            }
    }

         public function faciltylist() {
        $data["partnerlang"]=$this->config->item("partnerlang");
        $this->load->model('facility');
        $acclist=$this->facility->get_facility_list();
        $data["acclist"]=$acclist;
        $this->template->load('admintemplate','admin/facilitylist',$data);
    }
     public function faciltyedit()
    {
        $accid= $this->input->get('id');
        $data["partnerlang"]=$this->config->item("partnerlang");
        $this->load->model('facility');
        $facdetails=$this->facility->get_facility_details($accid);
        //print_r($facilitydetails);exit("2334");
        $facilitydetails=array();
             $facilitydetails = array( 'facilitydetails' => array(
             "name"  =>$facilitydetails["accdesc"]
             ,"txtStatus"=>$facilitydetails["status"]
                     ));
             $this->session->set_userdata($facilitydetails);
        $data["accdetails"]=$facdetails;
        $this->template->load('admintemplate','admin/facedit',$data);
    }
     public function doeditfacility()
    {
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
                $this->template->load('admintemplate', 'admin/facedit',$data);

            } else  {
              //$this->template->set('product_header', 'Admin Home');
              $this->load->model('facility');
              $this->facility->doeditfacility($faciltydetails["faciltydetails"]);
              redirect('admin/faciltylist');
              //$this->load->model('user_security');
            }



    }

       public function facilitydelete()
    {

              //$this->template->set('product_header', 'Admin Home');
               $accid= $this->input->get('id');
              $this->load->model('facility');
              $this->facility->deletefacilty($accid);
              redirect('admin/faciltylist');
              //$this->load->model('user_security');
      }

         public function roomtype()
    {

              //$this->template->set('product_header', 'Admin Home');
               $id= $this->input->get('id');
               $this->load->model('adminhotel_model');
              // $hoteldetails=$this->adminhotel_model->get_hotel_details_by_id($id);
               //print_r($hoteldetails);
               //$data["hoteldetails"]=$hoteldetails;
                         $this->load->model('adminhotel_model');
                $hoteldetails=$this->adminhotel_model->get_hotel_lang_by_id($id);
             // print_r($hoteldetails);
        $data["hotelname"]=$hoteldetails[0]["hotelname_uk"];
               $data["id"]=$id;
               $this->template->load('admintemplate','admin/roomtype',$data);

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

                $this->template->load('admintemplate', 'admin/roomtype',$data);

            } else  {
              //$this->template->set('product_header', 'Admin Home');
              $this->load->model('roomtype');
              $this->roomtype->addnewroomtype($roomtypedetails["roomtypedetails"]);
              redirect('admin/roomtypelist?id='.$id);
              //$this->load->model('user_security');
            }
      }
        public function roomtypelist() {
        $data["partnerlang"]=$this->config->item("partnerlang");
        $id=$this->input->get("id");
        $data["id"]=$id;
        $this->load->model('roomtype');
        $list=$this->roomtype->get_roomtype_list($id);
          $this->load->model('adminhotel_model');
                $hoteldetails=$this->adminhotel_model->get_hotel_lang_by_id($id);
             // print_r($hoteldetails);
        $data["hotelname"]=$hoteldetails[0]["hotelname_uk"];
        $data["list"]=$list;
        $this->template->load('admintemplate','admin/roomtypelist',$data);
    }

    public function roomtypeedit()
    {
        $id= $this->input->get('id');
        $hid= $this->input->get('hid');
        $data["partnerlang"]=$this->config->item("partnerlang");
        $this->load->model('roomtype');
        $details=$this->roomtype->get_roomtype_details($id);
        $this->session->set_userdata($facilitydetails);
        $data["roomtypedetails"]=$details;
                  $this->load->model('adminhotel_model');
                $hoteldetails=$this->adminhotel_model->get_hotel_lang_by_id($hid);
             // print_r($hoteldetails);
        $data["hotelname"]=$hoteldetails[0]["hotelname_uk"];
        $this->template->load('admintemplate','admin/roomtypeedit',$data);
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

                $this->template->load('admintemplate', 'admin/roomtype',$data);

            } else  {
              //$this->template->set('product_header', 'Admin Home');
              $this->load->model('roomtype');
              $this->roomtype->updateroomtype($roomtypedetails["roomtypedetails"]);
              redirect('admin/roomtypelist?id='.$hid);
              //$this->load->model('user_security');
            }
      }

      

           public function roomtypedelete()
    {

              //$this->template->set('product_header', 'Admin Home');
              $id= $this->input->get('id');
              $hid= $this->input->get('hid');
              $this->load->model('roomtype');
              $this->roomtype->deleteroomtype($id);
              redirect('admin/roomtypelist?id='.$hid);
              //$this->load->model('user_security');
      }

}
?>
