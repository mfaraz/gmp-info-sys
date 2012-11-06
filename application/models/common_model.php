<?php
class Common_model extends  Model {

    public function getDivisionInfoById($division_id)
    {
        $sql = "SELECT Z.*, D.divisionname
                FROM tbl_zones Z
                LEFT JOIN tbl_divisions D ON D.divisionid = Z.tbl_divisions_divisionid
                WHERE tbl_divisions_divisionid = " . $division_id;
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

    function getDivisionInfo($division_id)
    {
        $sql = "SELECT pc.populationcatdesc, SUM(populationcount) AS TOTALCOUNT
                FROM tbl_branches_has_tbl_populationcategories bpc
                LEFT JOIN tbl_populationcategories AS pc ON pc.populationid = bpc.tbl_populationcategories_populationid
                WHERE tbl_branches_tbl_zones_tbl_divisions_divisionid = " . $division_id . "
                GROUP BY tbl_populationcategories_populationid";
        $qry = $this->db->query($sql);
        $result_arr = $qry->result_array();

        return $result_arr;
    }

    function getGampolaInfo()
    {
        $sql = "SELECT pc.populationcatdesc, SUM(populationcount) AS TOTALCOUNT
                FROM tbl_branches_has_tbl_populationcategories bpc
                LEFT JOIN tbl_populationcategories AS pc ON pc.populationid = bpc.tbl_populationcategories_populationid
                GROUP BY tbl_populationcategories_populationid";
        $qry = $this->db->query($sql);
        $result_arr = $qry->result_array();

        return $result_arr;
    }

    function getZoneInfoById($division_id, $zone_id)
    {
        $sql = "SELECT pc.populationcatdesc, SUM(populationcount) AS TOTALCOUNT
                FROM tbl_branches_has_tbl_populationcategories bpc
                LEFT JOIN tbl_populationcategories AS pc ON pc.populationid = bpc.tbl_populationcategories_populationid
                WHERE bpc.tbl_branches_tbl_zones_tbl_divisions_divisionid = " . $division_id . "
                AND bpc.tbl_branches_tbl_zones_zoneid = " . $zone_id . "
                GROUP BY bpc.tbl_populationcategories_populationid";
        $qry = $this->db->query($sql);
        $result_arr = $qry->result_array();

        return $result_arr;
    }

    function getZoneById($zone_id)
    {
        $sql = "SELECT zonename FROM tbl_zones WHERE zoneid = " . $zone_id;
        $qry = $this->db->query($sql);
        $result_arr = $qry->row();

        return $result_arr;
    }

    function getBranchById($division_id, $zone_id, $branch_id)
    {
        $sql = "SELECT branchname, branchdsc FROM tbl_branches
        WHERE branchid = " . $branch_id . " AND tbl_zones_zoneid = " . $zone_id . " AND tbl_zones_tbl_divisions_divisionid = " . $division_id;
        $qry = $this->db->query($sql);
        $result_arr = $qry->row();

        return $result_arr;
    }

    function getBranchInfoById($division_id, $zone_id, $branch_id)
    {
        $sql = "SELECT pc.populationcatdesc, SUM(populationcount) AS TOTALCOUNT FROM tbl_branches_has_tbl_populationcategories bpc
                LEFT JOIN tbl_populationcategories AS pc ON pc.populationid = bpc.tbl_populationcategories_populationid
                WHERE bpc.tbl_branches_tbl_zones_tbl_divisions_divisionid = " . $division_id . "
                AND bpc.tbl_branches_tbl_zones_zoneid = " . $zone_id . "
                AND tbl_branches_branchid = " . $branch_id . "
                GROUP BY bpc.tbl_populationcategories_populationid";
        $qry = $this->db->query($sql);
        $result_arr = $qry->result_array();

        return $result_arr;
    }

    function getOrgMemInfo($division_id, $zone_id, $branch_id, $org_id)
    {
        $sql = "SELECT m.*, om.serviceperiod, om.telephone, d.designationname FROM tbl_members m
                LEFT JOIN tbl_organizations_has_tbl_members om ON om.tbl_members_memberid = m.memberid
                LEFT JOIN tbl_organizations og ON og.orgid = om.tbl_organizations_orgid
                LEFT JOIN tbl_designations d ON d.designationid = om.tbl_designations_designationid
                WHERE om.tbl_organizations_tbl_branches_branchid = " . $branch_id . " AND om.tbl_org_tbl_branch_tbl_zone_tbl_div_divisionid =" . $division_id . "
                AND om.tbl_organizations_tbl_branches_tbl_zones_zoneid = " . $zone_id . "
                AND om.tbl_organizations_tbl_organizationcats_orgcatid = " . $org_id;

        $qry = $this->db->query($sql);
        $result_arr = $qry->result_array();

        return $result_arr;
    }

    function getChairmanList()
    {
        $sql = "SELECT m.*, om.serviceperiod, om.telephone, d.designationname, dv.divisionname, zn.zonename, brn.branchname, og.orgname
FROM tbl_members m
                LEFT JOIN tbl_organizations_has_tbl_members om ON om.tbl_members_memberid = m.memberid
                LEFT JOIN tbl_organizations og ON og.orgid = om.tbl_organizations_orgid
                LEFT JOIN tbl_designations d ON d.designationid = om.tbl_designations_designationid
                LEFT JOIN tbl_divisions dv ON dv.divisionid = om.tbl_org_tbl_branch_tbl_zone_tbl_div_divisionid
                LEFT JOIN tbl_zones zn ON zn.zoneid = om.tbl_organizations_tbl_branches_tbl_zones_zoneid
                LEFT JOIN tbl_branches brn ON brn.branchid = om.tbl_organizations_tbl_branches_branchid
                WHERE om.tbl_designations_designationid = 1";
        $qry = $this->db->query($sql);
        $result_arr = $qry->result_array();

        return $result_arr;
    }

    function getChairmanListByDivision($division_id)
    {
        $sql = "SELECT m.*, om.serviceperiod, om.telephone, d.designationname, dv.divisionname, zn.zonename, brn.branchname, og.orgname
FROM tbl_members m
                LEFT JOIN tbl_organizations_has_tbl_members om ON om.tbl_members_memberid = m.memberid
                LEFT JOIN tbl_organizations og ON og.orgid = om.tbl_organizations_orgid
                LEFT JOIN tbl_designations d ON d.designationid = om.tbl_designations_designationid
                LEFT JOIN tbl_divisions dv ON dv.divisionid = om.tbl_org_tbl_branch_tbl_zone_tbl_div_divisionid
                LEFT JOIN tbl_zones zn ON zn.zoneid = om.tbl_organizations_tbl_branches_tbl_zones_zoneid
                LEFT JOIN tbl_branches brn ON brn.branchid = om.tbl_organizations_tbl_branches_branchid
                WHERE om.tbl_designations_designationid = 1
                AND om.tbl_org_tbl_branch_tbl_zone_tbl_div_divisionid = " . $division_id;
        $qry = $this->db->query($sql);
        $result_arr = $qry->result_array();

        return $result_arr;
    }

    function getZonesByDivision($division_id)
    {
        $sql = "SELECT zoneid, zonename
                FROM tbl_zones
                WHERE tbl_divisions_divisionid = " . $division_id;
        $qry = $this->db->query($sql);
        $result_arr = $qry->result_array();

        return $result_arr;
    }

    function getBranchInfoByZone($zoneid, $divisionid)
    {
        $sql = "SELECT branchid, branchname
                FROM tbl_branches
                WHERE tbl_zones_zoneid = " . $zoneid . "
                AND tbl_zones_tbl_divisions_divisionid = " . $divisionid;
        $qry = $this->db->query($sql);
        $result_arr = $qry->result_array();

        return $result_arr;
    }

    function getSearchResult($division, $region, $branch)
    {
        $where = "";
        if($division == "" && $region == "" && $branch == "") {
            $where .= "";
        } else if($division != "" && $region == "" && $branch == "") {
            $where .= "WHERE om.tbl_org_tbl_branch_tbl_zone_tbl_div_divisionid = " . $division;
        } else if($division != "" && $region != "" && $branch == "") {
            $where .= "WHERE om.tbl_org_tbl_branch_tbl_zone_tbl_div_divisionid = " . $division . "
                    AND tbl_organizations_tbl_branches_tbl_zones_zoneid = " . $region;
        } else if($division != "" && $region != "" && $branch != "") {
            $where .= "WHERE om.tbl_org_tbl_branch_tbl_zone_tbl_div_divisionid = " . $division . "
                    AND tbl_organizations_tbl_branches_tbl_zones_zoneid = " . $region . "
                    AND tbl_organizations_tbl_branches_branchid = " . $branch;
        } else if($division == "" && $region != "" && $branch != "") {
            $where .= "WHERE tbl_organizations_tbl_branches_tbl_zones_zoneid = " . $region . "
                    AND tbl_organizations_tbl_branches_branchid = " . $branch;
        } else if($division == "" && $region == "" && $branch != "") {
            $where .= "WHERE tbl_organizations_tbl_branches_branchid = " . $branch;
        } else if($division == "" && $region != "" && $branch == "") {
            $where .= "WHERE tbl_organizations_tbl_branches_tbl_zones_zoneid = " . $region;
        } else {
            $where = "";
        }


        $sql = "SELECT m.*, om.serviceperiod, om.telephone, d.designationname, zn.zonename, brn.branchname, og.orgname, dv.divisionname
                FROM tbl_members m
                LEFT JOIN tbl_organizations_has_tbl_members om ON om.tbl_members_memberid = m.memberid
                LEFT JOIN tbl_organizations og ON og.orgid = om.tbl_organizations_orgid
                LEFT JOIN tbl_designations d ON d.designationid = om.tbl_designations_designationid
                LEFT JOIN tbl_zones zn ON zn.zoneid = om.tbl_organizations_tbl_branches_tbl_zones_zoneid
                LEFT JOIN tbl_branches brn ON brn.branchid = om.tbl_organizations_tbl_branches_branchid
                LEFT JOIN tbl_divisions dv ON dv.divisionid = om.tbl_org_tbl_branch_tbl_zone_tbl_div_divisionid
                " . $where;
        $qry = $this->db->query($sql);
        $result_arr = $qry->result_array();

        return $result_arr;
    }

    function getReligiousInfo($category)
    {
        if($category == "All")
        {
            $where = "WHERE OC.orgcatdsc = 'Temple' OR OC.orgcatdsc = 'Church' OR OC.orgcatdsc = 'Kovil' OR OC.orgcatdsc = 'Mosque'";
        } else {
            $where = "WHERE OC.orgcatdsc = '" . $category . "' ";
        }

        $sql = "SELECT O.*, OC.orgcatdsc AS ORG, M.membername, M.memberimage FROM tbl_organizations O
                LEFT JOIN tbl_organizationcats OC ON OC.orgcatid = O.tbl_organizationcats_orgcatid
                LEFT JOIN tbl_organizations_has_tbl_members OM ON OM.tbl_organizations_orgid = O.orgid
                LEFT JOIN tbl_members M ON M.memberid = OM.tbl_members_memberid
                " . $where;
        $qry = $this->db->query($sql);
        $result_arr = $qry->result_array();

        return $result_arr;
    }

    function getOrgDetailsById($orgid)
    {
        $sql = "SELECT O.*, OC.orgcatdsc AS ORG, M.memberid, M.membername, M.memberimage, B.branchname, Z.zonename, D.divisionname
                FROM tbl_organizations O
                LEFT JOIN tbl_organizationcats OC ON OC.orgcatid = O.tbl_organizationcats_orgcatid
                LEFT JOIN tbl_organizations_has_tbl_members OM ON OM.tbl_organizations_orgid = O.orgid
                LEFT JOIN tbl_members M ON M.memberid = OM.tbl_members_memberid
                LEFT JOIN tbl_branches B ON B.branchid = O.tbl_branches_branchid
                LEFT JOIN tbl_zones Z ON Z.zoneid = O.tbl_branches_tbl_zones_zoneid
                LEFT JOIN tbl_divisions D ON D.divisionid - O.tbl_branches_tbl_zones_tbl_divisions_divisionid
                WHERE O.orgid = " . $orgid;

        $qry = $this->db->query($sql);
        $result_arr = $qry->row();

        return $result_arr;
    }

    function getOrgDetailsMain()
    {
        $sql = "SELECT O.*, dv.divisionname, zn.zonename, brn.branchname, m.membername, m.memberaddress, m.membertelephone
                FROM tbl_members m
                LEFT JOIN tbl_organizations_has_tbl_members om ON om.tbl_members_memberid = m.memberid
                LEFT JOIN tbl_organizations O ON O.orgid = om.tbl_organizations_orgid
                LEFT JOIN tbl_organizationcats OC ON OC.orgcatid = O.tbl_organizationcats_orgcatid
                LEFT JOIN tbl_divisions dv ON dv.divisionid = O.tbl_branches_tbl_zones_tbl_divisions_divisionid
                LEFT JOIN tbl_zones zn ON zn.zoneid = O.tbl_branches_tbl_zones_zoneid
                LEFT JOIN tbl_branches brn ON brn.branchid = O.tbl_branches_branchid
                WHERE OC.orgcatid = 5";

        $qry = $this->db->query($sql);
        $result_arr = $qry->result_array();

        return $result_arr;
    }

    function getOrgDetailsYouth()
    {
        $sql = "SELECT O.*, dv.divisionname, zn.zonename, brn.branchname, m.membername, m.memberaddress, m.membertelephone
                FROM tbl_members m
                LEFT JOIN tbl_organizations_has_tbl_members om ON om.tbl_members_memberid = m.memberid
                LEFT JOIN tbl_organizations O ON O.orgid = om.tbl_organizations_orgid
                LEFT JOIN tbl_organizationcats OC ON OC.orgcatid = O.tbl_organizationcats_orgcatid
                LEFT JOIN tbl_divisions dv ON dv.divisionid = O.tbl_branches_tbl_zones_tbl_divisions_divisionid
                LEFT JOIN tbl_zones zn ON zn.zoneid = O.tbl_branches_tbl_zones_zoneid
                LEFT JOIN tbl_branches brn ON brn.branchid = O.tbl_branches_branchid
                WHERE OC.orgcatid = 6";

        $qry = $this->db->query($sql);
        $result_arr = $qry->result_array();

        return $result_arr;
    }

    function getOrgDetailsWomen()
    {
        $sql = "SELECT O.*, dv.divisionname, zn.zonename, brn.branchname, m.membername, m.memberaddress, m.membertelephone
                FROM tbl_members m
                LEFT JOIN tbl_organizations_has_tbl_members om ON om.tbl_members_memberid = m.memberid
                LEFT JOIN tbl_organizations O ON O.orgid = om.tbl_organizations_orgid
                LEFT JOIN tbl_organizationcats OC ON OC.orgcatid = O.tbl_organizationcats_orgcatid
                LEFT JOIN tbl_divisions dv ON dv.divisionid = O.tbl_branches_tbl_zones_tbl_divisions_divisionid
                LEFT JOIN tbl_zones zn ON zn.zoneid = O.tbl_branches_tbl_zones_zoneid
                LEFT JOIN tbl_branches brn ON brn.branchid = O.tbl_branches_branchid
                WHERE OC.orgcatid = 7";

        $qry = $this->db->query($sql);
        $result_arr = $qry->result_array();

        return $result_arr;
    }
}
?>
