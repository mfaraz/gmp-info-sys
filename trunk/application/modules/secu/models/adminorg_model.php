<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Adminorg_model extends  Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function addMember($post_arr)
    {
        //print_r($post_arr); exit;
        $division = $post_arr['division'];
        $zone = $post_arr['zone'];
        $branch = $post_arr['branch'];
        $orgid = $post_arr['organization'];
        $orgcat = $post_arr['orgcat'];
        $membername = $post_arr['membername'];
        $memberaddr = $post_arr['memberaddr'];
        $membertel = $post_arr['membertel'];
        $memberservice = $post_arr['memberservice'];
        $designation = $post_arr['designation'];
        $memberotherinfo = $post_arr['memberotherinfo'];
        if($memberotherinfo == "") {
            $memberotherinfo = "null";
        } else {
            $memberotherinfo = $memberotherinfo;
        }

        $this->db->query('SET FOREIGN_KEY_CHECKS = 0');
        $sql = "INSERT INTO tbl_members(membername, memberaddress, membertelephone, otherinfo)
                VALUES('" . $membername . "', '" . addslashes($memberaddr) . "', " . $membertel . ", '" . $memberotherinfo . "')";
        $qry = $this->db->query($sql);
        if($qry)
        {
            $memberid = $this->db->insert_id();
            $sql1 = "INSERT INTO tbl_organizations_has_tbl_members(tbl_organizations_orgid, tbl_organizations_tbl_branches_branchid, tbl_organizations_tbl_branches_tbl_zones_zoneid, tbl_org_tbl_branch_tbl_zone_tbl_div_divisionid, tbl_members_memberid, serviceperiod)
                     VALUES(" . $orgid . ", " . $branch . ", " . $zone . ", " . $division . ", " . $memberid . ", " . $memberservice . ")";
            $qry1 = $this->db->query($sql1);
            if($qry)
            {
                $sql2 = "INSERT INTO tbl_designations(designationname) VALUES('" . $designation . "')";
                $qry2 = $this->db->query($sql2);
                $designationid = $this->db->insert_id();
                $sql3 = "UPDATE tbl_organizations_has_tbl_members SET tbl_designations_designationid = " . $designationid . " 
                         WHERE tbl_organizations_orgid = " . $orgid;
                $qry3 = $this->db->query($sql3);
                if($qry3)
                {
                    return true;
                }
            }
        }
    }

    function getMembers()
    {
        $sql = "SELECT memberid, membername
                FROM tbl_members";
        $qry = $this->db->query($sql);
        $result_arr = $qry->result_array();

        return $result_arr;
    }

    function getRelOrgCat()
    {
        $sql = "SELECT orgcatid, orgcatdsc
                FROM tbl_organizationcats";
        $qry = $this->db->query($sql);
        $result_arr = $qry->result_array();

        return $result_arr;
    }

    function addRelOrg($post_arr)
    {
        $division = $post_arr['division'];
        $zone = $post_arr['zone'];
        $branch = $post_arr['branch'];
        $orgcat = $post_arr['orgcat'];
        $orgname = $post_arr['orgname'];
        $orgdesc = $post_arr['orgdesc'];
        $orgaddress = $post_arr['orgaddress'];
        $orgtel = $post_arr['orgtel'];
        $orgfax = $post_arr['orgfax'];
        $orgotherinfo = $post_arr['orgotherinfo'];

        $sql = "INSERT INTO tbl_organizations(orgname, orgdsc, tbl_branches_branchid, tbl_branches_tbl_zones_zoneid, tbl_branches_tbl_zones_tbl_divisions_divisionid, tbl_organizationcats_orgcatid, orgaddress, orgtelno, orgfaxno, orgotherdesc)
                VALUES('" . $orgname . "', '" . $orgdesc . "', " . $branch . ", " . $zone . ", " . $division . ", " . $orgcat . ", '" . addslashes($orgaddress) . "', '" . $orgtel . "', '" . $orgfax . "', '" . addslashes($orgotherinfo) . "')";
        $qry = $this->db->query($sql);
        if($qry)
        {
            return true;
        }
    }
}
?>
