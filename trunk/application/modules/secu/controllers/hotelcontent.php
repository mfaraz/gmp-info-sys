<?php
class Hotelcontent extends Controller {

    /**----------------------------------------------------***/
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

      public function index()
      {

        $accid= $this->uri->segment(5);
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
            $this->load->library('breadcrumb');
            $this->breadcrumb->seperator='<div class="breadcrumb_divider"></div>';
            $this->breadcrumb->addCrumb('Hotel',base_url()."secu/hotel/hotellist");
            $this->breadcrumb->addCrumb('Hotel Content',"#");
            $data['breadcrumb'] = $this->breadcrumb->makeBread();  
        $this->template->load('admintemplate','hotelcontent/index',$data);

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
                      redirect('secu/hotelcontent/index/id/'.$id);

             }

              //$this->load->model('user_security');


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
              redirect('secu/hotelcontent/index/id/'.trim($id)."#img");

       }
       public function deletehotelimage()
       {
           $id=$this->uri->segment(5);
           $ori_img=$this->uri->segment(7);
           $hid=$this->uri->segment(9);
           $this->load->model('content');
           $this->content->deleteimage($id);
           unlink($this->imgdata['dir']['original'].$ori_img);
           unlink($this->imgdata['dir']['thumb'].'thumb_'.$ori_img);
           redirect('secu/hotelcontent/index/id/'.trim($hid)."#img");
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


  
}
?>