<?php

class Facility extends CI_Model {

    public function get_facility_list() {
       
         try{
            $facility_sql = "SELECT *  FROM tbl_facility";
        $facility = $this->db->query($facility_sql);
        if($facility->num_rows() > 0) {
                 return $facility_result = $facility->result_array();
            } else {
                return FALSE;
            }
        } catch(Exception $e){
            throw new Exception('Error in DB query');
            return FALSE;
        }
    }

     public function addnewfacilty($facilitydetails) {
        try{
                $facility_sql = "INSERT INTO tbl_facility
                                              (
                                               Hfacility,
                                               status
                                              )
                                       VALUES (?,?)";
               $this->db->query($facility_sql, array(
                                             $facilitydetails['name'],
                                             $facilitydetails['txtStatus'],

                ));

        } catch(Exception $e){
            throw new Exception('Error in DB query');
            return FALSE;
        }
    }

    public function get_facility_details($accid)
    {
        
         try{
           $facility_sql = "SELECT *
                                    FROM tbl_facility where id=?";
        $facility = $this->db->query($facility_sql, array($accid));
        if($facility->num_rows() > 0) {
                 return $facility_result = $facility->row_array();
            } else {
                return FALSE;
            }
        } catch(Exception $e){
            throw new Exception('Error in DB query');
            return FALSE;
        }
    }
    
     public function doeditfacility($facilitydetails) {
      //  print_r($facilitydetails);exit;
        try{
               $facility_sql = "update tbl_facility set Hfacility=?,status=?  where id=?";  
               $this->db->query($facility_sql, array(
                                             $facilitydetails['name'],
                                             $facilitydetails['txtStatus'],
                                             $facilitydetails['id']
                ));

        } catch(Exception $e){
            throw new Exception('Error in DB query');
            return FALSE;
        }
    }

      public function deletefacilty($accid) {

        try{
                $facility_sql = "delete from tbl_facility  where id=?";
               $this->db->query($facility_sql, array($accid
                ));

        } catch(Exception $e){
            throw new Exception('Error in DB query');
            return FALSE;
        }
    }


    

}
?>
