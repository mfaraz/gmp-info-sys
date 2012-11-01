<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends Controller {

	function __construct()
	{
            parent::__construct();
            //$this->template->load('template', 'home');            
        }

	function index()
	{            
        $this->template->load('template', 'home');
    }

    function lang()
    {
        error_reporting(E_ALL);
        $lang=$this->uri->segment(3);
        try
        {
            $lang_sess_data = array('sess_lang' => $lang);
            //$this->session->set_langdata($lang_sess_data);
            $this->session->set_userdata('language', $lang);
        } catch (Exception $e) {
            throw new Exception('Error session assign');
        }
        redirect("index");
        $this->template->load('template', 'home');
    }
}