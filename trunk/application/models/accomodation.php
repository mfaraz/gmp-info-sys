<?php

class Accomodation extends CI_Model {

    public function get_accomodation_list() {
        $accomodation_sql = "SELECT *
                                    FROM tbl_accomodations";
        $accomodation = $this->db->query($accomodation_sql);
         try{
            $accomodation_sql = "SELECT *
                                    FROM tbl_accomodations";
        $accomodation = $this->db->query($accomodation_sql);
        if($accomodation->num_rows() > 0) {
                 return $accomodation_result = $accomodation->result_array();
            } else {
                return FALSE;
            }
        } catch(Exception $e){
            throw new Exception('Error in DB query');
            return FALSE;
        }
    }
        public function get_accomodation_list_forhoteledit($hotel_id) {

         try{
            $accomodation_sql = "SELECT *  ,  (select accid from tbl_hotelaccomodations b  where b.Hid={$hotel_id} and b.accid=a.id) as checkval FROM tbl_accomodations a
                                    
                       ";
        $accomodation = $this->db->query($accomodation_sql);
        if($accomodation->num_rows() > 0) {
                 return $accomodation_result = $accomodation->result_array();
            } else {
                return FALSE;
            }
        } catch(Exception $e){
            throw new Exception('Error in DB query');
            return FALSE;
        }
    }

     public function addnewaccomodation($acomdationdetails) {
        try{
                $accomodation_sql = "INSERT INTO tbl_accomodations
                                              (
                                               accdesc,
                                               status
                                              )
                                       VALUES (?,?)";
               $this->db->query($accomodation_sql, array(
                                             $acomdationdetails['txttitle'],
                                             $acomdationdetails['txtStatus'],

                ));

        } catch(Exception $e){
            throw new Exception('Error in DB query');
            return FALSE;
        }
    }

    public function get_accomodation_details($accid)
    {
        
         try{
           $accomodation_sql = "SELECT *
                                    FROM tbl_accomodations where id=?";
        $accomodation = $this->db->query($accomodation_sql, array($accid));
        if($accomodation->num_rows() > 0) {
                 return $accomodation_result = $accomodation->row_array();
            } else {
                return FALSE;
            }
        } catch(Exception $e){
            throw new Exception('Error in DB query');
            return FALSE;
        }
    }
    
     public function doeditacomdation($acomdationdetails) {
      //   print_r($acomdationdetails);exit;
        try{
                $accomodation_sql = "update tbl_accomodations set accdesc=?,status=?  where id=?";
               $this->db->query($accomodation_sql, array(
                                             $acomdationdetails['txttitle'],
                                             $acomdationdetails['txtStatus'],
                                             $acomdationdetails['id']
                ));

        } catch(Exception $e){
            throw new Exception('Error in DB query');
            return FALSE;
        }
    }

      public function deleteacomdation($accid) {
      //   print_r($acomdationdetails);exit;
        try{
                $accomodation_sql = "delete from tbl_accomodations  where id=?";
               $this->db->query($accomodation_sql, array($accid
                ));

        } catch(Exception $e){
            throw new Exception('Error in DB query');
            return FALSE;
        }
    }


    

}
?>
