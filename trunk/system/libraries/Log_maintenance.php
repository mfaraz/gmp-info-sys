<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Description of Log_maintenance
 *
 * @author teran
 */
class Log_maintenance {

    function Log_maintenance(){
        $this->CI =& get_instance();
        $this->log_days_to_keep = $this->CI->config->item('log_days_to_keep');
        $this->delete_old_logs(); // delete the old log files
    }

    function delete_old_logs(){
        $dir = $this->CI->config->item('log_path');
        if( !is_dir($dir) ){ return false; }
        $dh = opendir($dir);
        $deleted = 0;
        $kept = 0;
        while ( ($file = readdir($dh)) !== false){
            // check log filename: log*.php
            if (  substr( strtolower($file), -4, 4 )=='.php' && substr( strtolower($file), 0, 3 )=='log'){
                // check how old they are
                if( filemtime($dir.$file) < strtotime('-'.$this->log_days_to_keep.' days') ) {
                    unlink($dir.$file);
                    $deleted++;
                }else{
                    $kept++;
                }
            }
        }
        closedir($dh);
        $total = $deleted+$kept;
        if( $deleted>0 ){
            log_message('info', $total.' log files: '.$deleted.' deleted, '.$kept.' kept.');
        }
        $a = array('total'=>$total, 'deleted'=>$deleted, 'kept'=>$kept);
        return $a;
    }
}
?>
