<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Adminhotel_model extends Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

   function list_hotel($limit, $start)
    {  // echo "limit".$limit."start".$start;
        try{
            $hotel_sql = "select *,a.id as hotelid,
                    (select lvalue from tbl_lang b where b.lkey=a.hotelname and b.lang='UK') as hotelname ,
                    (select lvalue from tbl_lang b where b.lkey=a.txtHdescriptions and b.lang='UK') as hoteldesc ,
                    a.numstars  as numStars
                    from tbl_hotelmaster a order by hotelname
                          ";
           $hotel_sql.= " limit ".$start.",".$limit;
            $hotels = $this->db->query($hotel_sql);
            if($hotels->num_rows() > 0) {
                 return $hotel_result = $hotels->result_array();
            } else {
                return FALSE;
            }
        } catch(Exception $e){
            throw new Exception('Error in DB query');
            return FALSE;
        }
    }
  function list_hotel_count()
    {
        try{
            $hotel_sql = "select  count(*) as count
                    from tbl_hotelmaster  
                          ";

            $hotels = $this->db->query($hotel_sql);
            if($hotels->num_rows() > 0) {
                  $hotel_result = $hotels->row_array();
                  return $hotel_result["count"];
            } else {
                return FALSE;
            }
        } catch(Exception $e){
            throw new Exception('Error in DB query');
            return FALSE;
        }
    }

    function add_hotel($post_arr, $langarr)
    {
        $this->load->database();
    	$hoteldetailsarray=array();
        $hoteldetailsarray["txtContactName"]=$post_arr['txtContactName'];
        $hoteldetailsarray["txtEmailAddress"]=$post_arr['txtEmailAddress'];
        $hoteldetailsarray["paddress1"]=$post_arr['paddress1'];
        $hoteldetailsarray["paddress2"]=$post_arr['paddress2'];
        $hoteldetailsarray["txtPostalCode"]=$post_arr['txtPostalCode'];
        $hoteldetailsarray["country"]=$post_arr['country'];
        $hoteldetailsarray["city"]=$post_arr['city'];
        $hoteldetailsarray["txtPhoneNo"]=$post_arr['txtPhoneNo'];
        $hoteldetailsarray["txtFaxNo"]=$post_arr['txtFaxNo'];
        $hoteldetailsarray["txtWebAddress"]=$post_arr['txtWebAddress'];
        $hoteldetailsarray["hotelnameuk"]=$post_arr['hotelnameuk'];
        $hoteldetailsarray["hotelnamede"]=$post_arr['hotelnamede'];
        //d$hoteldetailsarray["hoteltype"]=$post_arr['hoteltype'];
        $hoteldetailsarray["numStars"]=$post_arr['numStars'];
        $hoteldetailsarray["numBeds"]=$post_arr['numBeds'];
        $hoteldetailsarray["txtHdescriptionsuk"]=$post_arr['txtHdescriptionsuk'];
        $hoteldetailsarray["txtHdescriptionsde"]=$post_arr['txtHdescriptionsde'];
        $hoteldetailsarray["facility"] = $post_arr['facility'];
        $hoteldetailsarray["accomodation"] = $post_arr['accomodation'];
        $hoteldetailsarray["mealplan"] = $post_arr['mealplan'];
        if($this->session->userdata("admin_usertype")=="superadmin"){
                $hoteldetailsarray["remarks"] = $post_arr['remarks'];
        }
        $sql = "INSERT INTO tbl_hotelmaster(txtContactName, txtEmailAddress, paddress1, paddress2, txtPostalCode, country, city, txtPhoneNo, txtFaxNo, txtWebAddress, numStars, numBeds, status)
                VALUES('" . $hoteldetailsarray["txtContactName"] . "', '" . $hoteldetailsarray["txtEmailAddress"] . "', '" . $hoteldetailsarray["paddress1"] . "', '" . $hoteldetailsarray["paddress2"] . "', '" . $hoteldetailsarray["txtPostalCode"] . "', " . $hoteldetailsarray["country"] . ",
                 " . $hoteldetailsarray["city"] . ", '" . $hoteldetailsarray["txtPhoneNo"] . "', '" . $hoteldetailsarray["txtFaxNo"] . "', '" . $hoteldetailsarray["txtWebAddress"] . "',
                        " . $hoteldetailsarray["numStars"] . ", " . $hoteldetailsarray["numBeds"] . ", 1)";
       $query = $this->db->query($sql);
    	if($query)
    	{
            $last_insert_id = $this->db->insert_id();
            $hotel_name_lang_key = $last_insert_id . "_hotelname";
            $hotel_desc_lang_key = $last_insert_id . "_hoteldesc";

            $sql = "UPDATE tbl_hotelmaster SET hotelname = '" . $hotel_name_lang_key . "', txtHdescriptions = '" . $hotel_desc_lang_key . "'
                    WHERE id = " . $last_insert_id;
            $query = $this->db->query($sql);
            if($query)
            {
                foreach ($langarr as $langkey=>$langval)
                {
                    $sql = "INSERT INTO tbl_lang(lkey, lang, lvalue, mod_id, module)
                            VALUES('" . $hotel_name_lang_key . "', '" . $langkey . "', '" . $hoteldetailsarray["hotelname" . $langkey] . "', " . $last_insert_id . ", 'hotel')";
                    $query = $this->db->query($sql);
                    if($query)
                    {
                        $sql = "INSERT INTO tbl_lang(lkey, lang, lvalue, mod_id, module)
                            VALUES('" . $hotel_desc_lang_key . "', '" . $langkey . "', '" . $hoteldetailsarray["txtHdescriptions" . $langkey] . "', " . $last_insert_id . ", 'hotel')";
                        $query = $this->db->query($sql);
                        
                    }
                }

                foreach ($hoteldetailsarray["facility"] as $facilty)
                {
                    $sql = "INSERT INTO tbl_hotelfacility(Hid, fid)
                            VALUES(" . $last_insert_id . ", " . $facilty . ")";
                    $query = $this->db->query($sql);
                   
                }
                foreach ($hoteldetailsarray["accomodation"] as $accomodation)
                {
                    $sql = "INSERT INTO tbl_hotelaccomodations (Hid, accid)
                            VALUES(" . $last_insert_id . ", " . $accomodation . ")";
                  //  $query = $this->db->query($sql);
                    if($query)
                    {
                      //  header("Location: home");
                    }
                }
              //  print_r($hoteldetailsarray);exit;

                 if($this->session->userdata("admin_usertype")=="superadmin"){
                    $sql = "update  tbl_hotelmaster  set remarks='{$hoteldetailsarray["remarks"]}' where id=" . $last_insert_id ;   
                    $query = $this->db->query($sql);
                }
                
                 foreach ($hoteldetailsarray["mealplan"] as $mealpan)
                {
                    $sql = "INSERT INTO tbl_hotelmealplans (Hid, mealplanid)
                            VALUES(" . $last_insert_id . ", " . $mealpan . ")";
                    $query = $this->db->query($sql);
                    if($query)
                    {
                        header("Location: home");
                    }
                }
                
            }
    	}
           
    }

    function get_hotel_details_by_id($hotel_id)
    {
        try {
            $hotel_sql = "SELECT HM.*, C.city_name
                FROM tbl_hotelmaster HM
                LEFT JOIN tbl_city C ON C.city_id = HM.city
                WHERE HM.id = ?";
            $hotels = $this->db->query($hotel_sql, array($hotel_id));
            if($hotels->num_rows() > 0) {
                 return $hotel_result = $hotels->result_array();
            } else {
                return FALSE;
            }
        } catch(Exception $e){
            throw new Exception('Error in DB query');
            return FALSE;
        }
    }

    function get_hotel_facility_by_id($hotel_id)
    {
        $sql = "SELECT fid FROM tbl_hotelfacility WHERE Hid = ?";
        $facilty = $this->db->query($sql, array($hotel_id));
        if($facilty->num_rows() > 0) {
             return $fac_result = $facilty->result_array();
        } else {
            return FALSE;
        }
    }

    function get_hotel_lang_by_id($hotel_id)
    {
        $sql = "SELECT
(SELECT lvalue FROM tbl_lang l  WHERE lang='uk' AND l.mod_id=m.id AND l.lkey=m.hotelname ) AS hotelname_uk,
(SELECT lvalue FROM tbl_lang l  WHERE lang='uk' AND l.mod_id=m.id AND l.lkey=m.txtHdescriptions ) AS hoteldsc_uk,
(SELECT lvalue FROM tbl_lang l  WHERE lang='de' AND l.mod_id=m.id AND l.lkey=m.hotelname ) AS hotelname_de,
(SELECT lvalue FROM tbl_lang l  WHERE lang='de' AND l.mod_id=m.id AND l.lkey=m.txtHdescriptions ) AS hoteldsc_de
FROM tbl_hotelmaster m
WHERE m.id=?";
        $hotel_lang_arr = $this->db->query($sql, array($hotel_id));
        if($hotel_lang_arr->num_rows() > 0) {
             return $hotel_lang_result = $hotel_lang_arr->result_array();
        } else {
            return FALSE;
        }
    }

    function get_hotel_lang()
    {
        $sql = "SELECT
(SELECT lvalue FROM tbl_lang l  WHERE lang='uk' AND l.mod_id=m.id AND l.lkey=m.hotelname ) AS hotelname_uk,
(SELECT lvalue FROM tbl_lang l  WHERE lang='uk' AND l.mod_id=m.id AND l.lkey=m.txtHdescriptions ) AS hoteldsc_uk

FROM tbl_hotelmaster m";
        $hotel_lang_arr = $this->db->query($sql);
        if($hotel_lang_arr->num_rows() > 0) {
             return $hotel_lang_result = $hotel_lang_arr->result_array();
        } else {
            return FALSE;
        }
    }

    function update_hotel($post_arr, $data)
    {
        //print_r($post_arr['facility']);
        $sql = "UPDATE tbl_hotelmaster
                SET txtContactName = '" . $post_arr['txtContactName'] . "', txtEmailAddress = '" . $post_arr['txtEmailAddress'] . "', paddress1 = '" . $post_arr['paddress1'] . "', paddress2 = '" . $post_arr['paddress2'] . "',
                    country = " . $post_arr['country'] . ", city = " . $post_arr['city'] . ", txtPhoneNo = '" . $post_arr['txtPhoneNo'] . "', txtFaxNo = '" . $post_arr['txtFaxNo'] . "', txtWebAddress = '" . $post_arr['txtWebAddress'] . "', txtPostalCode = '" . $post_arr['txtPostalCode'] . "',
                        numStars = " . $post_arr['numStars'] . ", numBeds = " . $post_arr['numBeds'] . "
                WHERE id = " . $post_arr['hotelid'];
        $query = $this->db->query($sql);
        if($query)
        {
            foreach($data['partnerlang'] as $langkey=>$langval)
            {
                $sql_name = "UPDATE tbl_lang SET lvalue = '" . $post_arr['hotelname' . $langkey] . "'
                        WHERE lang='" . $langkey . "'
                            AND mod_id = " . $post_arr['hotelid'] . "
                                AND lkey = '" . $post_arr['hotelid'].'_hotelname' . "'
                                    AND module = 'hotel' ";
                $query_name = $this->db->query($sql_name);

                $sql_desc = "UPDATE tbl_lang SET lvalue = '" . $post_arr['txtHdescriptions' . $langkey] . "'
                        WHERE lang='" . $langkey . "'
                            AND mod_id = " . $post_arr['hotelid'] . "
                                AND lkey='".$post_arr['hotelid'].'_hoteldesc'."'
                                    AND module = 'hotel';";
                $query_desc = $this->db->query($sql_desc);
            }

            if($post_arr['remarks']){

                $sql="update tbl_hotelmaster set remarks='".$post_arr['remarks']."' where id = " . $post_arr['hotelid'] ;
                $this->db->query($sql);
            }

            $sql = "SELECT fid FROM tbl_hotelfacility WHERE Hid = " . $post_arr['hotelid'];
            $fac = $this->db->query($sql);
            if($fac->num_rows() > 0)
            {
                $sql = "DELETE FROM tbl_hotelfacility WHERE Hid = " . $post_arr['hotelid'];
                $this->db->query($sql);
            }

            foreach ($post_arr['facility'] as $fac_arr)
            {               

                $facsql = "INSERT INTO tbl_hotelfacility(fid, Hid)
                               VALUES(" . $fac_arr . ", " . $post_arr['hotelid'] . ")";
                $facqry = $this->db->query($facsql);
            }


            $sql = "SELECT accid FROM tbl_hotelaccomodations  WHERE Hid = " . $post_arr['hotelid'];
            $acc = $this->db->query($sql);
            if($acc->num_rows() > 0)
            {
                $sql = "DELETE FROM tbl_hotelaccomodations WHERE Hid = " . $post_arr['hotelid'];
                $this->db->query($sql);
            }

            foreach ($post_arr['accomodation'] as $acc_arr)
            {

                $accsql = "INSERT INTO tbl_hotelaccomodations(accid, Hid)
                               VALUES(" . $acc_arr . ", " . $post_arr['hotelid'] . ")";
                $accqry = $this->db->query($accsql);
            }

            $sql = "SELECT id FROM tbl_hotelmealplans  WHERE Hid = " . $post_arr['hotelid'];
            $mp = $this->db->query($sql);
            if($mp->num_rows() > 0)
            {
                $sql = "DELETE FROM tbl_hotelmealplans WHERE Hid = " . $post_arr['hotelid'];
                $this->db->query($sql);
            }

            foreach ($post_arr['mealplan'] as $m_arr)
            {

                $msql = "INSERT INTO tbl_hotelmealplans(mealplanid, Hid)
                               VALUES(" . $m_arr . ", " . $post_arr['hotelid'] . ")";
                $mqry = $this->db->query($msql);
            }
            
        }
    }

    function delete_hotel($hotel_id)
    {
        $del_hotel_sql = "DELETE FROM tbl_hotelmaster WHERE id = " . $hotel_id;
        $hotel_qry = $this->db->query($del_hotel_sql);
        if($hotel_qry)
        {
            $fac_sql = "DELETE FROM tbl_hotelfacility WHERE Hid = " . $hotel_id;
            $fac_qry = $this->db->query($fac_sql);

            if($fac_qry)
            {
                $lang_sql = "DELETE FROM tbl_lang WHERE mod_id = " . $hotel_id . " AND module='hotel' ";
                $lang_qry = $this->db->query($lang_sql);
            }
        }
    }

    function get_facilty()
    {
        $sql = "SELECT * FROM tbl_facility WHERE status = 1";
        $fac_arr = $this->db->query($sql);
        if($fac_arr->num_rows() > 0) {
             return $fac_arr_result = $fac_arr->result_array();
        } else {
            return FALSE;
        }
    }
    
    function get_facilty_foredit($hotel_id)
    {
        $sql = "SELECT *  ,  (select fid from tbl_hotelfacility b  where b.Hid={$hotel_id} and b.fid=a.id) as checkval FROM tbl_facility a

                       ";
        $fac_arr = $this->db->query($sql);
        if($fac_arr->num_rows() > 0) {
             return $fac_arr_result = $fac_arr->result_array();
        } else {
            return FALSE;
        }
    }

    
}
?>
