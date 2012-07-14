<?php

class Mealplan_model extends Model {



    public function get_mealplan_list($limit,$start) {
       
         try{
            $mealplan_sql = "SELECT *  FROM tbl_mealplans";
             $mealplan_sql.= " limit ".$start.",".$limit;
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
   public function get_mealplan_list_forhotelform() {
       
         try{
            $mealplan_sql = "SELECT *  FROM tbl_mealplans";
             //$mealplan_sql.= " limit ".$start.",".$limit;
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
     public function get_mealplan_list_count() {

         try{
            $mealplan_sql = "SELECT count(*) as count  FROM tbl_mealplans";
        $mealplan = $this->db->query($mealplan_sql);
        if($mealplan->num_rows() > 0) {
                  $mealplan_result = $mealplan->row_array();
                  return $mealplan_result["count"];
            } else {
                return FALSE;
            }
        } catch(Exception $e){
            throw new Exception('Error in DB query');
            return FALSE;
        }
    }

        public function get_mealplan_list_foredit($hotel_id) {

         try{
             $mealplan_sql = "SELECT *  ,  (select b.mealplanid from tbl_hotelmealplans b  where b.Hid={$hotel_id} and b.mealplanid=a.id) as checkval FROM tbl_mealplans a

                       ";
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

     public function addnewmealplan($mealplandetails) {
         //print_r($mealplandetails);exit;
        try{
                $mealplan_sql = "INSERT INTO tbl_mealplans
                                              (
                                               name,
                                               status
                                              )
                                       VALUES (?,?)";
               $this->db->query($mealplan_sql, array(
                                             $mealplandetails['name'],
                                           ($mealplandetails['txtStatus'])?$mealplandetails['txtStatus']:0  ,

                ));

        } catch(Exception $e){
            throw new Exception('Error in DB query');
            return FALSE;
        }
    }

    public function get_mealplan_details($id)
    {
        
         try{
           $mealplan_sql = "SELECT *
                                    FROM tbl_mealplans where id=?";
        $mealplan = $this->db->query($mealplan_sql, array($id));
        if($mealplan->num_rows() > 0) {
                 return $mealplan_result = $mealplan->row_array();
            } else {
                return FALSE;
            }
        } catch(Exception $e){
            throw new Exception('Error in DB query');
            return FALSE;
        }
    }
    
     public function doeditmealplan($mealplandetails) {
      //  print_r($mealplandetails);exit;
        try{
               $mealplan_sql = "update tbl_mealplans set name=?,status=?  where id=?";
               $this->db->query($mealplan_sql, array(
                                             $mealplandetails['name'],
                                             $mealplandetails['txtStatus'],
                                             $mealplandetails['id']
                ));

        } catch(Exception $e){
            throw new Exception('Error in DB query');
            return FALSE;
        }
    }

      public function deletemealplan($id) {

        try{
                $mealplan_sql = "delete from tbl_mealplans  where id=?";
               $this->db->query($mealplan_sql, array($id
                ));

        } catch(Exception $e){
            throw new Exception('Error in DB query');
            return FALSE;
        }
    }


    

}
?>
