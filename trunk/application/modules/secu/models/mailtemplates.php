<?php

/**
 * Description of dsl_order
 *
 * @author teran
 */
class Mailtemplates extends CI_Model {

  
    public function getmailtemplate($templateid) {
        try {
            $mail_template_sql = "SELECT content from mail_templates 
                                         WHERE templateid=?";

            $mail_template = $this->db->query($mail_template_sql,$templateid);
            if($mail_template->num_rows() > 0) {
                return $mail_template_content = $mail_template->result_array();
            } else {
                return FALSE;
            }
        }catch(Exception $e){
            throw new Exception('Error in DB query');
            return FALSE;
        }
    }
    
     public function format_order_mail($type,$customer_details,$selected_plan_name,$payment_details)
	{
              $content= $this->getmailtemplate(1);
              $mailbody=$content[0]['content'];
              if(strstr($mailbody, "[[planname]]")) { 
                 $mailbody=str_replace("[[planname]]",$type." ".$selected_plan_name,$mailbody);
               } 
               if(strstr($mailbody, "[[creationdate]]")) { 
                 $mailbody=str_replace("[[creationdate]]",$customer_details["creation_date"],$mailbody);
               } 
              if(strstr($mailbody, "[[usrname]]")) { 
                 $mailbody=str_replace("[[usrname]]",$customer_details["user_name"],$mailbody);
               } 
               
              if(strstr($mailbody, "[[salutation]]")) { 
                 $mailbody=str_replace("[[salutation]]",$customer_details["salutation"],$mailbody);
               } 
              if(strstr($mailbody, "[[firstname]]")) { 
                 $mailbody=str_replace("[[firstname]]",$customer_details["first_name"],$mailbody);
               } 
              if(strstr($mailbody, "[[lastname]]")) { 
                 $mailbody=str_replace("[[lastname]]",$customer_details["last_name"],$mailbody);
               } 
               if(strstr($mailbody, "[[plantype]]")) { 
                 $mailbody=str_replace("[[plantype]]",$selected_plan_name,$mailbody);
               } 
               if(strstr($mailbody, "[[streetno]]")) { 
                 $mailbody=str_replace("[[streetno]]",$customer_details["street_number"],$mailbody);
               } 
               if(strstr($mailbody, "[[streetname]]")) { 
                 $mailbody=str_replace("[[streetname]]",$customer_details["street_name"],$mailbody);
               } 
               if(strstr($mailbody, "[[streetsuffix]]")) { 
                 $mailbody=str_replace("[[streetsuffix]]",$customer_details["street_suffix"],$mailbody);
               } 
               if(strstr($mailbody, "[[state]]")) { 
                 $mailbody=str_replace("[[state]]",$customer_details["state"],$mailbody);
               } 
               if(strstr($mailbody, "[[suburb]]")) { 
                 $mailbody=str_replace("[[suburb]]",$customer_details["surburb"],$mailbody);
               } 
               if(strstr($mailbody, "[[postcode]]")) { 
                 $mailbody=str_replace("[[postcode]]",$customer_details["post_code"],$mailbody);
               } 
               if(strstr($mailbody, "[[contactno]]")) { 
                 $mailbody=str_replace("[[contactno]]",$customer_details["contact_number"],$mailbody);
               } 
               if(strstr($mailbody, "[[mobileno]]")) { 
                 $mailbody=str_replace("[[mobileno]]",$customer_details["mobile_number"],$mailbody);
               } 
               if(strstr($mailbody, "[[email]]")) { 
                 $mailbody=str_replace("[[email]]",$customer_details["email_address"],$mailbody);
               } 
               
                if(strstr($mailbody, "[[payment_details]]")) { 
                 $mailbody=str_replace("[[payment_details]]",$payment_details,$mailbody);
               } 
               if(strstr($mailbody, "[[contract_duration]]")) { 
                 $mailbody=str_replace("[[contract_duration]]",$customer_details["contract_duration"],$mailbody);
               } 
          return $mailbody;
           

	}


   
}
?>
