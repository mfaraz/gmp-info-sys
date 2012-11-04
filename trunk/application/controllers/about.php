<?php
class About extends Controller {
    public function index() {
        //$this->template->set('title','About US');
        //$this->template->load('template', 'about_us');
    }

    public function aboutmap()
    {
        $this->template->load('template', 'aboutmap');
    }

    public function aboutgampola()
    {
        error_reporting(E_ALL);
        $this->template->load('template', 'aboutgampola');
    }

    public function historical()
    {
        $this->template->load('template', 'historical');
    }

    public function creatures()
    {
        $this->template->load('template', 'creatures');
    }

    public function gallery()
    {
        $this->template->load('template', 'gallery');
    }
}
?>
