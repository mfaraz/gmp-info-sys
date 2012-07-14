<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Admincommon_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function country_list()
    {
        $sql = "SELECT * FROM tbl_country";
        $country_arr = $this->db->query($sql);
        return $country_list = $country_arr->result_array();
    }

    function get_city_by_country($country_id)
    {
        $sql = "SELECT city_id, city_name
                FROM tbl_city
                WHERE country_id = " . $country_id;
        $city_arr = $this->db->query($sql);
        return $city_list = $city_arr->result_array();
    }

}
?>
