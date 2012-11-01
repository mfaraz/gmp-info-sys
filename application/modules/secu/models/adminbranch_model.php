<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Adminbranch_model extends  Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function getZones()
    {
        $sql = "SELECT zoneid, zonename, tbl_divisions_divisionid
                FROM tbl_zones";
        $qry = $this->db->query($sql);
        $result_arr = $qry->result_array();

        return $result_arr;
    }

    function getZonesByDivisionId($division_id)
    {
        if($division_id == "") {
            $where = "";
        } else {
            $where = "WHERE tbl_divisions_divisionid = " . $division_id;
        }

        $sql = "SELECT zoneid, zonename
                FROM tbl_zones
                " . $where;
        $qry = $this->db->query($sql);
        $result_arr = $qry->result_array();

        return $result_arr;
    }

    function getBranchByZoneId($division_id, $zone_id)
    {
        if($division_id == "" && $zone_id == "") {
            $where = "";
        } else {
            $where = "WHERE tbl_zones_zoneid = " . $zone_id . " AND tbl_zones_tbl_divisions_divisionid = " . $division_id;
        }

        $sql = "SELECT branchid, branchname
                FROM tbl_branches
                " . $where;
        $qry = $this->db->query($sql);
        $result_arr = $qry->result_array();

        return $result_arr;
    }

    function getOrgByBranchId($division_id, $zone_id, $branch_id)
    {
        if($division_id == "" && $zone_id == "" && $branch_id == "") {
            $where = "";
        } else {
            $where = "WHERE tbl_branches_tbl_zones_zoneid = " . $zone_id . " AND tbl_branches_tbl_zones_tbl_divisions_divisionid  = " . $division_id . " AND tbl_branches_branchid = " . $branch_id;
        }

        $sql = "SELECT orgid, orgname
                FROM tbl_organizations
                " . $where;
        $qry = $this->db->query($sql);
        $result_arr = $qry->result_array();

        return $result_arr;
    }

    function getPopulationCats()
    {
        $sql = "SELECT * FROM tbl_populationcategories";
        $qry = $this->db->query($sql);
        $result_arr = $qry->result_array();

        return $result_arr;
    }

    function addBranch($post_arr)
    {        
        // print_r($post_arr);
        //exit;
        $division = $post_arr['division'];
        $zone = $post_arr['zone'];
        $branch_name = $post_arr['branch_name'];
        $branch_desc = $post_arr['branch_desc'];

        $buddhist = $post_arr['1_buddhist'];
        $catholic = $post_arr['2_catholic'];
        $islam = $post_arr['3_islam'];
        $other_rel = $post_arr['4_other_rel'];
        $sinhalese = $post_arr['5_sinhalese'];
        $tamil = $post_arr['6_tamil'];
        $muslim = $post_arr['7_muslim'];
        $other_nat = $post_arr['8_other_nat'];
        $male = $post_arr['9_male'];
        $female = $post_arr['10_female'];
        $age_16 = $post_arr['11_age_1_16'];
        $age_30 = $post_arr['12_age_16_30'];
        $age_50 = $post_arr['13_age_30_50'];
        $age_50_above = $post_arr['14_age_50'];
        
        $sql = "INSERT INTO tbl_branches(branchname, branchdsc, tbl_zones_zoneid, tbl_zones_tbl_divisions_divisionid)
                VALUES('" . $branch_name . "', '" . addslashes($branch_desc) . "', " . $zone . ", " . $division . ")";
        $qry = $this->db->query($sql);
        $branchid = $this->db->insert_id();
        if($qry)
        {
            //for($i = 0; $i < 14; $i++)
            //{
                $sql2 = "INSERT INTO tbl_branches_has_tbl_populationcategories(tbl_branches_branchid, tbl_branches_tbl_zones_zoneid, tbl_branches_tbl_zones_tbl_divisions_divisionid, tbl_populationcategories_populationid, populationcount)
                        VALUES(" . $branchid . ", " . $zone . ", " . $division . " , 1, " . $buddhist . ")";                
                $qry2 = $this->db->query($sql2);

                $sql3 = "INSERT INTO tbl_branches_has_tbl_populationcategories(tbl_branches_branchid, tbl_branches_tbl_zones_zoneid, tbl_branches_tbl_zones_tbl_divisions_divisionid, tbl_populationcategories_populationid, populationcount)
                        VALUES(" . $branchid . ", " . $zone . ", " . $division . " , 2, " . $catholic . ")";
                
                $qry3 = $this->db->query($sql3);

                $sql4 = "INSERT INTO tbl_branches_has_tbl_populationcategories(tbl_branches_branchid, tbl_branches_tbl_zones_zoneid, tbl_branches_tbl_zones_tbl_divisions_divisionid, tbl_populationcategories_populationid, populationcount)
                        VALUES(" . $branchid . ", " . $zone . ", " . $division . " , 3, " . $islam . ")";
               
                $qry4 = $this->db->query($sql4);

                $sql5 = "INSERT INTO tbl_branches_has_tbl_populationcategories(tbl_branches_branchid, tbl_branches_tbl_zones_zoneid, tbl_branches_tbl_zones_tbl_divisions_divisionid, tbl_populationcategories_populationid, populationcount)
                        VALUES(" . $branchid . ", " . $zone . ", " . $division . " , 4, " . $other_rel . ")";
                $qry5 = $this->db->query($sql5);

                $sql6 = "INSERT INTO tbl_branches_has_tbl_populationcategories(tbl_branches_branchid, tbl_branches_tbl_zones_zoneid, tbl_branches_tbl_zones_tbl_divisions_divisionid, tbl_populationcategories_populationid, populationcount)
                        VALUES(" . $branchid . ", " . $zone . ", " . $division . " , 5, " . $sinhalese . ")";
                
                $qry6 = $this->db->query($sql6);

                $sql7 = "INSERT INTO tbl_branches_has_tbl_populationcategories(tbl_branches_branchid, tbl_branches_tbl_zones_zoneid, tbl_branches_tbl_zones_tbl_divisions_divisionid, tbl_populationcategories_populationid, populationcount)
                        VALUES(" . $branchid . ", " . $zone . ", " . $division . " , 6, " . $tamil . ")";
                
                $qry7 = $this->db->query($sql7);

                $sql8 = "INSERT INTO tbl_branches_has_tbl_populationcategories(tbl_branches_branchid, tbl_branches_tbl_zones_zoneid, tbl_branches_tbl_zones_tbl_divisions_divisionid, tbl_populationcategories_populationid, populationcount)
                        VALUES(" . $branchid . ", " . $zone . ", " . $division . " , 7, " . $muslim . ")";
                
                $qry8 = $this->db->query($sql8);

                $sql9 = "INSERT INTO tbl_branches_has_tbl_populationcategories(tbl_branches_branchid, tbl_branches_tbl_zones_zoneid, tbl_branches_tbl_zones_tbl_divisions_divisionid, tbl_populationcategories_populationid, populationcount)
                        VALUES(" . $branchid . ", " . $zone . ", " . $division . " , 8, " . $other_nat . ")";
                
                $qry9 = $this->db->query($sql9);
                
                $sql10 = "INSERT INTO tbl_branches_has_tbl_populationcategories(tbl_branches_branchid, tbl_branches_tbl_zones_zoneid, tbl_branches_tbl_zones_tbl_divisions_divisionid, tbl_populationcategories_populationid, populationcount)
                        VALUES(" . $branchid . ", " . $zone . ", " . $division . " , 9, " . $male . ")";
                
                $qry10 = $this->db->query($sql10);

                $sql11 = "INSERT INTO tbl_branches_has_tbl_populationcategories(tbl_branches_branchid, tbl_branches_tbl_zones_zoneid, tbl_branches_tbl_zones_tbl_divisions_divisionid, tbl_populationcategories_populationid, populationcount)
                        VALUES(" . $branchid . ", " . $zone . ", " . $division . " , 10, " . $female . ")";

                $qry11 = $this->db->query($sql11);

                $sql12 = "INSERT INTO tbl_branches_has_tbl_populationcategories(tbl_branches_branchid, tbl_branches_tbl_zones_zoneid, tbl_branches_tbl_zones_tbl_divisions_divisionid, tbl_populationcategories_populationid, populationcount)
                        VALUES(" . $branchid . ", " . $zone . ", " . $division . " , 11, " . $age_16 . ")";

                $qry12 = $this->db->query($sql12);

                $sql13= "INSERT INTO tbl_branches_has_tbl_populationcategories(tbl_branches_branchid, tbl_branches_tbl_zones_zoneid, tbl_branches_tbl_zones_tbl_divisions_divisionid, tbl_populationcategories_populationid, populationcount)
                        VALUES(" . $branchid . ", " . $zone . ", " . $division . " , 12, " . $age_30 . ")";

                $qry13 = $this->db->query($sql13);
                
                $sql14 = "INSERT INTO tbl_branches_has_tbl_populationcategories(tbl_branches_branchid, tbl_branches_tbl_zones_zoneid, tbl_branches_tbl_zones_tbl_divisions_divisionid, tbl_populationcategories_populationid, populationcount)
                        VALUES(" . $branchid . ", " . $zone . ", " . $division . " , 13, " . $age_50 . ")";

                $qry14 = $this->db->query($sql14);
                
                $sql15 = "INSERT INTO tbl_branches_has_tbl_populationcategories(tbl_branches_branchid, tbl_branches_tbl_zones_zoneid, tbl_branches_tbl_zones_tbl_divisions_divisionid, tbl_populationcategories_populationid, populationcount)
                        VALUES(" . $branchid . ", " . $zone . ", " . $division . " , 14, " . $age_50_above . ")";

                $qry15 = $this->db->query($sql15);
                
                return true;
            //}
        }
    }

    function getOrgCat()
    {
        $sql = "SELECT orgcatid, orgcatdsc
                FROM tbl_organizationcats
                LIMIT 0, 3";
        $qry = $this->db->query($sql);
        $result_arr = $qry->result_array();

        return $result_arr;
    }

    function addOrganization($post_arr)
    {
        //print_r($post_arr);
        //exit;
        error_reporting(E_ALL);
        $this->load->model("admincommon_model");
        $this->load->library("image");
        $division = $post_arr['division'];
        $zone = $post_arr['zone'];
        $branch = $post_arr['branch'];
        $orgcat = $post_arr['orgcat'];
        $memdesignation = $post_arr['memdesignation'];
        $memname = $post_arr['memname'];
        $memaddress = $post_arr['memaddress'];
        $memtel = $post_arr['memtel'];
        $memserviceperiod = $post_arr['memserviceperiod'];
        $memotherinfo = $post_arr['memotherinfo'];

        $member_photo_dir = "images/members/";
        $filename = $member_photo_dir . $_FILES['memphoto']['name'];
        //$memphoto = $_FILES[''];

        $sql = "INSERT INTO tbl_organizations(tbl_branches_branchid, tbl_branches_tbl_zones_zoneid, tbl_branches_tbl_zones_tbl_divisions_divisionid, tbl_organizationcats_orgcatid)
                VALUES(" . $branch . ", " . $zone . ", " . $division . ", " . $orgcat . ")";
        $qry = $this->db->query($sql);
        if($qry)
        {
            $org_id = $this->db->insert_id();
            $sql2 = "INSERT INTO tbl_members(membername, memberaddress, membertelephone, otherinfo)
                    VALUES('" . $memname . "', '" . $memaddress . "', '" . $memtel . "', '" . $memotherinfo . "')";
            $qry2 = $this->db->query($sql2);

            $mem_id = $this->db->insert_id();

            $sql3 = "INSERT INTO tbl_designations(designationname)
                    VALUES('" . $memdesignation . "')";
            $qry3 = $this->db->query($sql3);
            $designation_id = $this->db->insert_id();

            $sql4 = "INSERT INTO tbl_organizations_has_tbl_members(tbl_organizations_orgid, tbl_organizations_tbl_branches_branchid, tbl_organizations_tbl_branches_tbl_zones_zoneid, tbl_org_tbl_branch_tbl_zone_tbl_div_divisionid, tbl_organizations_tbl_organizationcats_orgcatid, tbl_members_memberid, serviceperiod, tbl_designations_designationid)
                    VALUES(" . $org_id . ", " . $branch . ", " . $zone . ", " . $division . ", " . $orgcat . ", " . $mem_id . ", " . $memserviceperiod . ", " . $designation_id . ")";
        
            $qry4 = $this->db->query($sql4);
            

            if(move_uploaded_file($_FILES['memphoto']['tmp_name'], $member_photo_dir . $_FILES['memphoto']['name']))
            {
                $ext = pathinfo($filename, PATHINFO_EXTENSION); // get file extension
                list($width, $height, $type, $attr) = getimagesize($member_photo_dir . $_FILES['memphoto']['name']);                
                if($width > 300)
                {
                    $this->image->load($member_photo_dir . $_FILES['memphoto']['name']);
                    $this->image->resizeToWidth(300);
                    $filename = random_string() . "." . $ext;
                    $this->image->save($member_photo_dir . $filename);
                    $this->image->resizeToWidth(150);
                    $this->image->save($member_photo_dir . "thumbs/" . $filename);
                    unlink($member_photo_dir . $_FILES['memphoto']['name']);
                    $sql5 = "UPDATE tbl_members SET memberimage = '" . $filename . "' 
                            WHERE memberid = " . $mem_id;
                    $qry5 = $this->db->query($sql5);
                    return true;

                }
            }
        }
    }

    function listbranchByDivisionId($division_id)
    {
        $sql = "SELECT B.*,Z.zonename, D.divisionname FROM tbl_branches B
                LEFT JOIN tbl_zones Z ON Z.zoneid = B.tbl_zones_zoneid
                LEFT JOIN tbl_divisions D ON D.divisionid = B.tbl_zones_tbl_divisions_divisionid
                WHERE B.tbl_zones_tbl_divisions_divisionid = " . $division_id;
        $qry = $this->db->query($sql);
        $result_arr = $qry->result_array();

        return $result_arr;
    }

    function getBranchDetailsById($branch_id)
    {
        $sql = "SELECT B.*,Z.zonename, D.divisionname FROM tbl_branches B
                LEFT JOIN tbl_zones Z ON Z.zoneid = B.tbl_zones_zoneid
                LEFT JOIN tbl_divisions D ON D.divisionid = B.tbl_zones_tbl_divisions_divisionid
                WHERE B.branchid = " . $branch_id;
        $qry = $this->db->query($sql);
        $result_arr = $qry->result_array();

        return $result_arr;
    }

    function getDesignations()
    {
        $sql = "SELECT * FROM tbl_designations";
        $qry = $this->db->query($sql);
        $result_arr = $qry->result_array();

        return $result_arr;
    }
}
?>
