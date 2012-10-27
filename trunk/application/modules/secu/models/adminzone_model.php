<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Adminzone_model extends  Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function addZone($post_arr)
    {        
        $division = $post_arr['division'];
        $zone_name = $post_arr['zone_name'];
        $zone_desc = $post_arr['zone_desc'];
        
        $sql = "INSERT INTO tbl_zones(zonename, zonedsc, tbl_divisions_divisionid)
                VALUES('" . $zone_name . "', '" . addslashes($zone_desc) . "', " . $division . ")";
        $qry = $this->db->query($sql);
        if($qry)
        {
            return true;
        }
    }

    function getZones($divisionid)
    {
        $sql = "SELECT zoneid, zonename, zonedsc
                FROM tbl_zones
                WHERE tbl_divisions_divisionid = " . $divisionid;
        $qry = $this->db->query($sql);
        $result_arr = $qry->result_array();

        return $result_arr;
    }

    function listZonesByDivisionId($division_id)
    {
        $sql = "SELECT Z.*, D.divisionname
                FROM tbl_zones Z
                LEFT JOIN tbl_divisions D ON D.divisionid = Z.tbl_divisions_divisionid
                WHERE tbl_divisions_divisionid = " . $division_id;
        $qry = $this->db->query($sql);
        $result_arr = $qry->result_array();
        return $result_arr;
    }

    function getZoneInfoById($zone_id)
    {
        $sql = "SELECT * FROM tbl_zones WHERE zoneid = " . $zone_id;
        $qry = $this->db->query($sql);
        $result_arr = $qry->result_array();
        return $result_arr;
    }

    function updateZone($post_arr)
    {
        $division = $post_arr['division'];
        $zone_name = $post_arr['zone_name'];
        $zone_desc = $post_arr['zone_desc'];
        $zoneid = $post_arr['zoneid'];

        $sql = "UPDATE tbl_zones
                SET zonename = '" . $zone_name . "', zonedsc = '" . addslashes($zone_desc) . "', tbl_divisions_divisionid = " . $division . "
                WHERE zoneid = " . $zoneid;
        $qry = $this->db->query($sql);
        if($qry)
        {
            return true;
        }
    }

    function deleteZone($zone_id)
    {
        $sql = "DELETE FROM tbl_zones WHERE zoneid = " . $zone_id;
        $qry = $this->db->query($sql);
        if($qry)
        {
            return true;
        }
    }
}
?>
