<?php

class Content extends  Model {

    public function savecontent($cntarray) {
      $checksql="select * from  tbl_hotelcontent where hotelid=?";
      $check = $this->db->query($checksql, array($cntarray["id"]));
        if($check->num_rows() > 0) {
                  $check_result =true;
            } else {
                $check_result= FALSE;
            }
      $id=trim($cntarray["id"]);
      $langarr=$this->config->item("partnerlang");
         try
            {
             if(!$check_result)
             {
                 $key_sql = "INSERT INTO  tbl_hotelcontent
                                              (
                                                hotelid,
                                                location,
                                                about,
                                                accommodation,
                                                facilities,
                                                excursion
                                                
                                              )
                                       VALUES (?,?,?,?,?,?)";
                   $this->db->query($key_sql, array($id,"cnt_location_".$id,"cnt_about_".$id,"cnt_accomodation_".$id,"cnt_facilities_".$id,"cnt_excursion_".$id));
             }
             else
             {
                 $key_sql = "update  tbl_hotelcontent set
                                             
                                                location=?,
                                                about=?,
                                                accommodation=?,
                                                facilities=?,
                                                excursion=?
                                              
                                             
                                       where hotelid=?";
                   $this->db->query($key_sql, array("cnt_location_".$id,"cnt_about_".$id,"cnt_accomodation_".$id,"cnt_facilities_".$id,"cnt_excursion_".$id,$id));
             }
                
            

             foreach($cntarray["cnt"] as $arrkey=>$arrval)
              {
                 foreach($arrval as $key=>$val)
                 {
                     if(!$check_result)
                     {
                          $val_sql ="INSERT INTO  tbl_lang
                                                  (
                                                    lkey,
                                                    lang,
                                                    lvalue,
                                                    mod_id
                                                  )
                                           VALUES (?,?,?,?)";
                      $this->db->query($val_sql, array($arrkey."_".$id,$key,$val,$id));

                     }
                     else
                     {
                          $val_sql ="update tbl_lang set

                                                    lvalue=?
                                                     where lkey=? and lang=?
                                                   
                                            ";
                      $this->db->query($val_sql, array($val,$arrkey."_".$id,$key));
                     }
                   
              
                 }

              }

            }
        catch(Exception $e)
            {
                throw new Exception('Error in DB query');
                return FALSE;
            }

    }

   public function getcontent($id)
    {
         try{
           $contentsql = "SELECT *
                                    FROM tbl_hotelcontent where hotelid=?";
        $content = $this->db->query($contentsql, array($id));
        if($content->num_rows() > 0) {
                 return $content_result = $content->row_array();
            } else {
                return FALSE;
            }
        } catch(Exception $e){
            throw new Exception('Error in DB query');
            return FALSE;
        }
    }
     public function getlangcontent($id)
    {

         try{
           $contentsql = "SELECT *
                                    FROM tbl_lang where mod_id=?";
        $content = $this->db->query($contentsql, array($id));
        if($content->num_rows() > 0) {
                 return $content_result = $content->result_array();
            } else {
                return FALSE;
            }
        } catch(Exception $e){
            throw new Exception('Error in DB query');
            return FALSE;
        }
    }

     public function saveimagestodb($hid,$name) {
        try{
                $accomodation_sql = "INSERT INTO tbl_hotelimages
                                              (hotelid,image,
                                               isdefault
                                              )
                                       VALUES (?,?,?)";
               $this->db->query($accomodation_sql, array(
                                             $hid,
                                            trim($name),
                                             0

                ));

        } catch(Exception $e){
            throw new Exception('Error in DB query');
            return FALSE;
        }
    }
  
     public function gethotelimages($accid)
    {

         try{
           $image_sql = "SELECT * FROM tbl_hotelimages  where hotelid=?";
        $image = $this->db->query($image_sql, array($accid));
        if($image->num_rows() > 0) {
                 return $image_result = $image->result_array();
            } else {
                return FALSE;
            }
        } catch(Exception $e){
            throw new Exception('Error in DB query');
            return FALSE;
        }
    }

     public function deleteimage($id){
        try{
                $del_img_sql = "delete from tbl_hotelimages  where id =?";
                 $this->db->query($del_img_sql, array($id));

        } catch(Exception $e){
            throw new Exception('Error in DB query');
            return FALSE;
        }
    }
 

}
?>
