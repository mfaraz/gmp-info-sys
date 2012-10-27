<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Adminnews_model extends  Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function listNews()
    {
        $sql = "SELECT * FROM tbl_news";
        $qry = $this->db->query($sql);
        $result_arr = $qry->result_array();

        return $result_arr;
    }

    function addNews($post_arr)
    {        
        $news_title = $post_arr['news_title'];
        $news_desc = $post_arr['news_desc'];
        $status = $post_arr['status'];
        if($status == "")
        {
            $status = 0;
        } else {
            $status = $status;
        }

        $created_date = date('Y-m-d');

        $sql = "INSERT INTO tbl_news(news_title, news_desc, status, created_date)
                VALUES('" . addslashes($news_title) . "', '" . addslashes($news_desc) . "', " . $status . ", '" . $created_date . "')";
        $qry = $this->db->query($sql);
        if($qry)
        {
            redirect(base_url() . "secu/news/index");
        }
    }

    function delNews($news_id)
    {
        $sql = "DELETE FROM tbl_news WHERE news_id = " . $news_id;
        $qry = $this->db->query($sql);
        if($qry2)
        {
            echo "Selected news record is successfully deleted.";
        }
    }

    function getNewsById($news_id)
    {
        $sql = "SELECT * FROM tbl_news WHERE news_id = " . $news_id;
        $qry = $this->db->query($sql);
        $news_arr = $qry->row();

        return $news_arr;
    }

    function updateNews($post_arr, $news_id)
    {
        $news_title = $post_arr['news_title'];
        $news_desc = $post_arr['news_desc'];
        //$status = $post_arr['status'];
        if(isset($post_arr['status']))
        {
            $status = 1;
        } else {
            $status = 0;
        }
        $created_date = date('Y-m-d');

        $sql = "UPDATE tbl_news
                SET news_title = '" . addslashes($news_title) . "', news_desc = '" . addslashes($news_desc) . "', created_date = '" . $created_date . "', status = " . $status . "
                WHERE news_id = " . $news_id;
        $qry = $this->db->query($sql);
        if($qry)
        {
            redirect(base_url() . "secu/news/index");
        }
    }
}
?>
