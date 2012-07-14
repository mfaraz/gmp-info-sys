<?php
class About_us extends CI_Controller {
    public function index() {
        $this->template->set('title','About US');
       $this->template->load('template', 'about_us');
    }
}

?>
