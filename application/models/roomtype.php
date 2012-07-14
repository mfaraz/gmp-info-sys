<?php

class Roomtype extends CI_Model {

    public function get_roomtype_list($id) {
       
         try{
            $roomtype_sql = "SELECT *  FROM tbl_hotelroomtypes where Hid=?";
        $roomtype = $this->db->query($roomtype_sql,array($id));
        if($roomtype->num_rows() > 0) {
                 return $roomtype_result = $roomtype->result_array();
            } else {
                return FALSE;
            }
        } catch(Exception $e){
            throw new Exception('Error in DB query');
            return FALSE;
        }
    }

     public function addnewroomtype($roomtypedetails) {
        // print_r($roomtypedetails);
        try{
            $roomtype_sql = "INSERT INTO tbl_hotelroomtypes
                                              (
                                               Hid,
                                            basictype,
                                            roomtypename,
                                            noofbeds,
                                            adult,
                                            child,
                                            childage,
                                            extraroom,
                                            status,
                                            noofallotrooms,
                                            fromdate,
                                             todate,
                                            lastupdated,
                                            updateduser
                                                    )                                      
                                       VALUES (
                                           {$roomtypedetails['id']},
                                           '{$roomtypedetails['name']}',
                                           '{$roomtypedetails['roomtype']}',
                                           {$roomtypedetails['noofbeds']},
                                           {$roomtypedetails['adult']},
                                           {$roomtypedetails['child']},
                                           {$roomtypedetails['childage']},
                                           '{$roomtypedetails['extraroom']}',
                                           {$roomtypedetails['status']},
                                           {$roomtypedetails['noofallotrooms']},
                                           '{$roomtypedetails['fromdate']}',
                                          '{$roomtypedetails['todate']}',
                                           now(),
                                           'admin'
                                           )";
                                          // exit;
               $this->db->query($roomtype_sql);

        } catch(Exception $e){
            throw new Exception('Error in DB query');
            return FALSE;
        }
    }

    public function get_roomtype_details($id)
    {
        
         try{
           $roomtype_sql = "SELECT *
                                    FROM tbl_hotelroomtypes where id=?";
        $roomtype = $this->db->query($roomtype_sql, array($id));
        if($roomtype->num_rows() > 0) {
                 return $roomtype_result = $roomtype->row_array();
            } else {
                return FALSE;
            }
        } catch(Exception $e){
            throw new Exception('Error in DB query');
            return FALSE;
        }
    }
    
     public function updateroomtype($roomtypedetails) {
      //  print_r($roomtypedetails);exit;
        try{
                 $roomtype_sql = "update tbl_hotelroomtypes set
                                            basictype='{$roomtypedetails["name"]}',
                                            roomtypename='{$roomtypedetails["roomtype"]}',
                                            noofbeds={$roomtypedetails["noofbeds"]},
                                            adult={$roomtypedetails["adult"]},
                                            child={$roomtypedetails["child"]},
                                            childage={$roomtypedetails["childage"]},
                                            extraroom='{$roomtypedetails["extraroom"]}',
                                            status={$roomtypedetails["status"]}  ,
                                            noofallotrooms={$roomtypedetails["noofallotrooms"]} ,
                                            fromdate='{$roomtypedetails["fromdate"]}'  ,
                                            todate='{$roomtypedetails["todate"]}'  ,
                                            lastupdated=now(),
                                            updateduser='admin'
                                            where id={$roomtypedetails["id"]}";
               $this->db->query($roomtype_sql);

        } catch(Exception $e){
            throw new Exception('Error in DB query');
            return FALSE;
        }
    }

      public function deleteroomtype($id) {

        try{
                $roomtype_sql = "delete from tbl_hotelroomtypes  where id=?";
               $this->db->query($roomtype_sql, array($id));

        } catch(Exception $e){
            throw new Exception('Error in DB query');
            return FALSE;
        }
    }


    

}
?>
