<?php

class hotel_model extends Model {

   public function get_meal_plans_by_hotel($hotel_id) {

         try{
         $mealplan_sql = "SELECT *  FROM tbl_hotelmealplans  a inner join tbl_mealplans b on b.id=a.mealplanid where  b.status=1 and a.Hid={$hotel_id}";
        $mealplan = $this->db->query($mealplan_sql);
        if($mealplan->num_rows() > 0) {
                 return $mealplan_result = $mealplan->result_array();
            } else {
                return FALSE;
            }
        } catch(Exception $e){
            throw new Exception('Error in DB query');
            return FALSE;
        }
    }

    public function get_accomodations()
    {
        try{
             $acc_sql = "SELECT * FROM tbl_accomodations WHERE status = 1";

            $acc_arr = $this->db->query($acc_sql);
            if($acc_arr->num_rows() > 0) {
                 return $acc_arr_result = $acc_arr->result_array();
            } else {
                return FALSE;
            }
        } catch(Exception $e){
            throw new Exception('Error in DB query');
            return FALSE;
        }
    }

    public function get_hotel_list($accid,$limit,$start) {
      
         try{
            $hotel_sql = "select a.id as hotelid,
                    (select d.image from tbl_hotelimages d where d.hotelid=a.id limit 0,1) as image,
                    (select lvalue from tbl_lang b where b.lkey=a.hotelname and b.lang='UK') as hotelname ,
                    (select lvalue from tbl_lang b where b.lkey=a.txtHdescriptions and b.lang='UK') as hoteldesc ,
                    a.numstars as ratingcount
                    from tbl_hotelmaster a  inner join tbl_hotelaccomodations c on a.id=c.Hid
                     where c.accid={$accid}
                    "
                        ;
                     $hotel_sql.= " limit ".$start.",".$limit;
        $hotel = $this->db->query($hotel_sql);
        if($hotel->num_rows() > 0) {
                 return $hotel_result = $hotel->result_array();
            } else {
                return FALSE;
            }
        } catch(Exception $e){
            throw new Exception('Error in DB query');
            return FALSE;
        }
    }
 public function get_hotel_list_count($accid) {

         try{
            $hotel_sql = "select  count(*) as count
                    from tbl_hotelmaster a  inner join tbl_hotelaccomodations c on a.id=c.Hid
                     where c.accid={$accid}
                    "
                        ;
        $hotel = $this->db->query($hotel_sql);
        if($hotel->num_rows() > 0) {
                 $hotel_result = $hotel->row_array();
                  return $hotel_result["count"];
            } else {
                return FALSE;
            }
        } catch(Exception $e){
            throw new Exception('Error in DB query');
            return FALSE;
        }
    }


    public function get_hotel_details_by_hotel_id($hotelid) {

         try{
            $hotel_sql = "select a.id as hotelid,
                    (select d.image from tbl_hotelimages d where d.hotelid=a.id limit 0,1) as image,
                    (select lvalue from tbl_lang b where b.lkey=a.hotelname and b.lang='UK') as hotelname ,
                    (select lvalue from tbl_lang b where b.lkey=a.txtHdescriptions and b.lang='UK') as hoteldesc ,
                    a.numstars as ratingcount
                    from tbl_hotelmaster a
                     where a.id={$hotelid}
                    "
                        ;
        $hotel = $this->db->query($hotel_sql);
        if($hotel->num_rows() > 0) {
                 return $hotel_result = $hotel->row_array();
            } else {
                return FALSE;
            }
        } catch(Exception $e){
            throw new Exception('Error in DB query');
            return FALSE;
        }
    }

   
    public function get_hotel_details($accid)
    {
        
         try{
           $hotel_sql = "SELECT *
                                    FROM tbl_hotels where id=?";
        $hotel = $this->db->query($hotel_sql, array($accid));
        if($hotel->num_rows() > 0) {
                 return $hotel_result = $hotel->row_array();
            } else {
                return FALSE;
            }
        } catch(Exception $e){
            throw new Exception('Error in DB query');
            return FALSE;
        }
    }

    public function get_hotel_facilities($hotelid) {

         try{
            $hotel_sql = "select  id , Hfacility from tbl_facility  where id in (select fid from tbl_hotelfacility where Hid={$hotelid}) "
                        ;
        $hotel = $this->db->query($hotel_sql);
        if($hotel->num_rows() > 0) {
                 return $hotel_result = $hotel->result_array();
            } else {
                return FALSE;
            }
        } catch(Exception $e){
            throw new Exception('Error in DB query');
            return FALSE;
        }
    }

    public function get_hotel_images($hotelid) {

         try{
            $hotel_sql = "select  image  as image from tbl_hotelimages where hotelid={$hotelid} "
                        ;
        $hotel = $this->db->query($hotel_sql);
        if($hotel->num_rows() > 0) {
                 return $hotel_result = $hotel->result_array();
            } else {
                return FALSE;
            }
        } catch(Exception $e){
            throw new Exception('Error in DB query');
            return FALSE;
        }
    }
   
    public function get_hotel_content($hotelid) {

         try{
            $hotel_sql = "select
                    (select lvalue from tbl_lang b where b.lkey=a.location and b.lang='UK') as location ,
                    (select lvalue from tbl_lang b where b.lkey=a.about and b.lang='UK') as about ,
                     (select lvalue from tbl_lang b where b.lkey=a.accommodation and b.lang='UK') as accomodation ,
                     (select lvalue from tbl_lang b where b.lkey=a.facilities and b.lang='UK') as facilities ,
                     (select lvalue from tbl_lang b where b.lkey=a.excursion and b.lang='UK') as excursion
                    from tbl_hotelcontent a   where hotelid={$hotelid} "
                        ;
        $hotel = $this->db->query($hotel_sql);
        if($hotel->num_rows() > 0) {
                 return $hotel_result = $hotel->row_array();
            } else {
                return FALSE;
            }
        } catch(Exception $e){
            throw new Exception('Error in DB query');
            return FALSE;
        }
    }

}
?>
