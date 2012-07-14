<?php
class Accesscheck
{
     var $CI;
     var $session;

    function __construct(){
        $this->CI =& get_instance();
        $this->session= $this->CI->session;
    }

    public function index($params)
    {
        require_once('permissions.php');
        $baseURL = $GLOBALS['CFG']->config['base_url'];
        $routing =& load_class('Router');
        $class = $routing->fetch_class();
        $method =$routing->fetch_method();
        $dir=$routing->fetch_directory();

       if($dir=="../modules/secu/controllers/")
           {
                 if(!empty($doesNotRequireLogin[$class][$method])) { return true; }
                 elseif(empty($permissions[$this->session->userdata("admin_usertype")][$class][$method])||$permissions[$this->session->userdata("admin_usertype")][$class][$method]!=true)
                                {
                                    header("location: {$baseURL}secu/unauthorized");
                                    exit;
                                }
                            else
                                {
                                return true;
                                }

            }
       
    }

}

?>
