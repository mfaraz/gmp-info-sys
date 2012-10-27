<?php
class Translate
{
    public function translator($keytext, $section)
    {        
        error_reporting(E_ALL);
        $CI =& get_instance();
        $CI->load->library('session');
        //$CI->load->library('database');
        $lang = $CI->session->userdata('language');
        

        $CI->db->query("SET NAMES 'utf8'");
        $sql = "SELECT id FROM tbl_labels WHERE keytext = '" . stripslashes($keytext) ."' AND lang = '" . $lang . "' ";
        $query = $CI->db->query($sql);
        $row = $query->result_array();
        
        if($query->num_rows() == 0) {
            $add_labels_sql = "INSERT INTO tbl_labels(lang, keytext, lvalue, section)
                                VALUES('" . $lang . "', '" . addslashes($keytext) . "', '" . addslashes($keytext) . "', '" . $section . "')";
            $CI->db->query($add_labels_sql);
        } else {
            foreach ($row as $result)
            {
                $id = $result['id'];
                $CI->db->query("SET NAMES 'utf8'");
                $sql2 = "SELECT lvalue
                         FROM tbl_labels
                         WHERE id = " . $id . " AND keytext = '" . $keytext . "' AND lang='" . $lang . "' ";
                $qry2 = $CI->db->query($sql2);
                $row2 = $qry2->result_array();
                foreach ($row2 as $result2)
                {
                    $content = $result2['lvalue'];
                    $content = str_replace("%", "", $content);
                    return $content;
                }
            }
        }
    }
}