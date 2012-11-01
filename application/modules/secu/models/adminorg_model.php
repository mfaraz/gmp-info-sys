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
        //$this->load->model("admincommon_model");
        $division = $post_arr['division'];
        $zone = $post_arr['zone'];
        $branch = $post_arr['branch'];
        $orgid = $post_arr['organization'];
        //$orgcat = $post_arr['organization'];
        $membername = $post_arr['membername'];
        $memberaddr = $post_arr['memberaddr'];
        $membertel = $post_arr['membertel'];
        $memberservice = $post_arr['memberservice'];
        $designation = $post_arr['designation'];
        $memberotherinfo = addslashes($post_arr['memberotherinfo']);
        if($memberotherinfo == "") {
            $memberotherinfo = "null";
        } else {
            $memberotherinfo = $memberotherinfo;
        }

        //$profile_picture = $post_arr['memberprofilepic'];

        //$random_code = $this->admincommon_model->random_string();

        if(isset($_FILES['memberprofilepic']))
        {
            $target_path = "images/members/";

            $target_path = $target_path . basename( $_FILES['memberprofilepic']['name']);

            if(move_uploaded_file($_FILES['memberprofilepic']['tmp_name'], $target_path)) {
                $filename = basename( $_FILES['memberprofilepic']['name']);
            } else{
                return false;
            }
        }

        $this->db->query('SET FOREIGN_KEY_CHECKS = 0');
        $sql = "INSERT INTO tbl_members(membername, memberaddress, membertelephone, otherinfo, memberimage)
                VALUES('" . $membername . "', '" . addslashes($memberaddr) . "', " . $membertel . ", '" . $memberotherinfo . "', '" . $filename . "')";
        $qry = $this->db->query($sql);
        if($qry)
        {
            $memberid = $this->db->insert_id();
            $sql1 = "INSERT INTO tbl_organizations_has_tbl_members(tbl_organizations_orgid, tbl_organizations_tbl_branches_branchid, tbl_organizations_tbl_branches_tbl_zones_zoneid, tbl_org_tbl_branch_tbl_zone_tbl_div_divisionid, tbl_members_memberid, serviceperiod, telephone, tbl_designations_designationid)
                     VALUES(" . $orgid . ", " . $branch . ", " . $zone . ", " . $division . ", " . $memberid . ", " . $memberservice . ", '" . $membertel . "', " . $designation . ")";
            $qry1 = $this->db->query($sql1);
            if($qry1)
            {
                return true;
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

    function addBranchOrg($post_arr)
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
