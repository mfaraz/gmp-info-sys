<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Admincommon_model extends  Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function getBranchesByZoneId($zone_id)
    {
        $sql = "SELECT branchid,branchname
                FROM tbl_branches
                WHERE tbl_zones_zoneid = " . $zone_id;
        $qry = $this->db->query($sql);
        $result_arr = $qry->result_array();

        return $result_arr;
    }

    function getOrgDetails($zone_id, $branch_id, $division_id)
    {
        $sql = "SELECT orgid, orgname, orgdsc, ordaddress, orgtelno, orgfaxno
                FROM tbl_organizations
                WHERE tbl_branches_branchid = " . $branch_id . "
                AND tbl_branches_tbl_zones_zoneid = " . $zone_id . "
                AND tbl_branches_tbl_zones_tbl_divisions_divisionid = " . $division_id;
        $qry = $this->db->query($sql);
        $result_arr = $qry->result_array();

        return $result_arr;
    }

    function random_string()
    {
        $character_set_array = array();
        $character_set_array[] = array('count' => 8, 'characters' => 'abcdefghijklmnopqrstuvwxyz');
        $character_set_array[] = array('count' => 4, 'characters' => '0123456789');
            $character_set_array[] = array('count' => 3, 'characters' => '!@#$$%^&*');
        $temp_array = array();
        foreach ($character_set_array as $character_set) {
            for ($i = 0; $i < $character_set['count']; $i++) {
                $temp_array[] = $character_set['characters'][rand(0, strlen($character_set['characters']) - 1)];
            }
        }
        shuffle($temp_array);
        return implode('', $temp_array);
    }

    function getSummary()
    {
        
    }
}
?>
