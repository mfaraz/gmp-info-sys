<?php


/**
 * Description of Customer
 *
 * @author teran
 */
class Customer extends CI_Model {

    public function insert_customer($customer_details) {
        $customer_sql = "INSERT INTO customer
                                     (first_name,
                                      last_name,
                                      salutation,
                                      dob,
                                      customer_type_id,
                                      current_payment_type 
                                     )
                              VALUES (?, ?,?,?,?,?)";
        $dob = $customer_details['dob_year'].'-'.$customer_details['dob_month'].'-'.$customer_details['dob_day'];
        try{
            $this->db->query($customer_sql, array( $customer_details['first_name'],
                                               $customer_details['last_name'],
                                               $customer_details['salutation'],
                                               $dob,
                                               $customer_details['customer_type_id'],
                                               $customer_details['current_payment_type']));
            $customer_id = $this->db->insert_id();
            return $customer_id;
        } catch(Exception $e){
            throw new Exception('Error in DB Insertion');
            return FALSE;
        }
    }

    public function insert_customer_address($customer_details) {
        try{
            $customer_address_sql = "INSERT INTO customer_address
                                             (street_number,
                                              street_name,
                                              street_suffix,
                                              suburb,
                                              state,
                                              post_code,
                                              address_type,
                                              customer_id
                                             )
                                      VALUES (?,?,?,?,?,?,?,?)";
            $this->db->query($customer_address_sql, array( $customer_details['street_number'],
                                               $customer_details['street_name'],
                                               $customer_details['street_suffix'],
                                               $customer_details['surburb'],
                                               $customer_details['state'],
                                               $customer_details['post_code'],
                                               $customer_details['address_type'],
                                               $customer_details['customer_id']));
            $customer_address_id = $this->db->insert_id();
                return $customer_address_id;
            } catch(Exception $e){
                throw new Exception('Error in DB Insertion');
                return FALSE;
            }
    }

    public function insert_customer_email($customer_details) {
        try{
            $customer_email_sql = " INSERT INTO customer_emails
                                                (email_address,
                                                 customer_id,
                                                 email_address_type)
                                         VALUES (?,?,?)";
            $this->db->query($customer_email_sql, array($customer_details['email_address'],
                                                        $customer_details['customer_id'],
                                                        $customer_details['email_address_type']
            ));
            $customer_email_id = $this->db->insert_id();
            return $customer_email_id;
        } catch(Exception $e){
            throw new Exception('Error in DB Insertion');
            return FALSE;
        }
    }

    public function insert_customer_phone_number($customer_details) {
        try{
            $customer_phone_number_sql = "INSERT INTO customer_phone_numbers
                                                      (contact_number,
                                                      customer_id,
                                                      mobile_number,
                                                      phone_number_type
                                                      )
                                               VALUES (?,?,?,?)";
            $this->db->query($customer_phone_number_sql, array($customer_details['contact_number'],
                                                $customer_details['customer_id'],
                                                $customer_details['mobile_number'],
                                                $customer_details['phone_number_type']

            ));
            $customer_phone_number_id = $this->db->insert_id();
            return $customer_phone_number_id;
        } catch(Exception $e){
            throw new Exception('Error in DB Insertion');
            return FALSE;
        }
    }

    public function insert_customer_credit_payment($customer_payment_details) {
        try{
            $customer_payment_sql = "INSERT INTO credit_payment
                                                 (card_type,
                                                  card_holder_name,
                                                  card_number,
                                                  expiry_month,
                                                  expiry_year,
                                                  cvv,
                                                  customer_id)
                                          VALUES (?,?,?,?,?,?,?)";
            $this->db->query($customer_payment_sql, array($customer_payment_details['card_type'],
                                                    $customer_payment_details['card_holder_name'],
                                                    $customer_payment_details['card_number'],
                                                    $customer_payment_details['expiry_month'],
                                                    $customer_payment_details['expiry_year'],
                                                    $customer_payment_details['cvv'],
                                                    $customer_payment_details['customer_id']

             ));
        } catch(Exception $e){
            throw new Exception('Error in DB Insertion');
            return FALSE;
        }
    }

    public function insert_customer_debit_payment($debit_payment_details) {
    
        try{
           $customer_payment_sql = "INSERT INTO debit_payment
                                                 (bank_name,
                                                  account_name,
                                                  account_number,
                                                  bsb,
                                                  branch_name,
                                                  customer_id)
                                          VALUES (?,?,?,?,?,?)";
            $this->db->query($customer_payment_sql, array($debit_payment_details['bank_name'],
                                                    $debit_payment_details['account_name'],
                                                    $debit_payment_details['account_number'],
                                                    $debit_payment_details['bsb'],
                                                    $debit_payment_details['branch_name'],
                                                    $debit_payment_details['customer_id']

            ));
        } catch(Exception $e){
            throw new Exception('Error in DB Insertion');
            return FALSE;
        }
    }

    public function create_customer_login($customer_details) {
        try{
            $customer_login_sql = "INSERT INTO customer_login
                                               (customer_id,
                                                user_name,
                                                user_password,
                                                creation_date,
                                                last_update,
                                                customer_status)
                                         VALUES (?,?,?,?,?,?)";
            $this->db->query($customer_login_sql, array($customer_details['customer_id'],
                                                    $customer_details['user_name'],
                                                    $customer_details['user_password'],
                                                    $customer_details['creation_date'],
                                                    $customer_details['last_update'],
                                                    $customer_details['customer_login_status']

            ));
        } catch(Exception $e){
            throw new Exception('Error in DB Insertion');
            return FALSE;
        }
    }

     public function email_exist($customer_email) {
        try{
             $customer_email_exist_sql = "SELECT email_address_id
                                           FROM customer_emails
                                          WHERE email_address=?";

            $customer_email_count = $this->db->query($customer_email_exist_sql,array(trim($customer_email)));
            if($customer_email_count->num_rows() > 0) {
                return TRUE;
            } else {
                return FALSE;
            }
        } catch(Exception $e){
            throw new Exception('Error in DB query');
            return FALSE;
        }

    }
    public function username_exist($user_name) {
        try{
            $user_name_exist_sql = "SELECT customer_login_id
                                      FROM customer_login
                                     WHERE user_name=?";

            $exist_user_count = $this->db->query($user_name_exist_sql,array(trim($user_name)));
            if($exist_user_count->num_rows() > 0) {
                return TRUE;
            } else {
                return FALSE;
            }
        } catch(Exception $e){
            throw new Exception('Error in DB query');
            return FALSE;
        }

    }

    public function get_address_details($address_id) {
        try {
            $address_details_sql = "SELECT *
                                      FROM customer_address
                                     WHERE address_id=?";
            $address_result_obj = $this->db->query($address_details_sql,array(trim($address_id)));
            if ($address_result_obj->num_rows() > 0){
                return $address_result = $address_result_obj->row_array();
            } else {
                return FALSE;
            }
        }catch(Exception $e){
            throw new Exception('Error in DB query');
            return FALSE;
        }
    }

    public function get_dsl_order_status($customer_id) {
        try {
            $dsl_order_status_sql = "SELECT dsl_number, 
                                            order_status 
                                       FROM dsl_order
                                      WHERE customer_id=?";
            $dsl_order_status_result_obj = $this->db->query($dsl_order_status_sql,array(trim($customer_id)));
            if ($dsl_order_status_result_obj->num_rows() > 0){
                return $dsl_order_status_result = $dsl_order_status_result_obj->result();
            } else {
                return FALSE;
            }
        }catch(Exception $e){
            throw new Exception('Error in DB query');
            return FALSE;
        }
    }

    public function get_ethernet_order_status($customer_id) {
        try {
            $ethernet_order_status_sql = "SELECT ethernet_number,
                                                 order_status
                                            FROM ethernet_order
                                           WHERE customer_id=?";
            $ethernet_order_status_result_obj = $this->db->query($ethernet_order_status_sql,array(trim($customer_id)));
            if ($ethernet_order_status_result_obj->num_rows() > 0){
                return $ethernet_order_status_result = $ethernet_order_status_result_obj->result();
            } else {
                return FALSE;
            }
        }catch(Exception $e){
            throw new Exception('Error in DB query');
            return FALSE;
        }
    }

    public function get_current_payment_details($customer_id) {
        try {
            $current_payment_details_sql = "SELECT current_payment_type
                                              FROM customer
                                             WHERE customer_id=?";
            $current_payment_result_obj = $this->db->query($current_payment_details_sql,array(trim($customer_id)));
            if ($current_payment_result_obj->num_rows() > 0){
                $current_payment_result = $current_payment_result_obj->row_array();
                $current_payment_type = $current_payment_result['current_payment_type'];
                if($current_payment_type == 'credit') {
                    $payment_credit_sql = "SELECT *
                                             FROM credit_payment
                                            WHERE customer_id=? 
                                              AND active_status=?";
                    $payment_credit_result_obj = $this->db->query($payment_credit_sql,array(trim($customer_id),'A'));
                    if ($payment_credit_result_obj->num_rows() > 0){
                        $payment_credit_result = $payment_credit_result_obj->result();
                        $current_payment_details = array();
                        foreach ($payment_credit_result as $payment_credit_values) {
                            $current_payment_details['card_type'] = $payment_credit_values->card_type;
                            $current_payment_details['card_holder_name'] = $payment_credit_values->card_holder_name;
                            
                        }
                        $current_payment_details['current_payment_type'] = 'credit';
                        //$current_payment_details = $current_payment_details['current_payment_details'];
                        return $current_payment_details;
                    }
                } else if($current_payment_type == 'debit') {
                    $payment_debit_sql = "SELECT *
                                             FROM debit_payment
                                            WHERE customer_id=? 
                                              AND active_status=?";
                    $payment_debit_result_obj = $this->db->query($payment_debit_sql,array(trim($customer_id),'A'));
                    if ($payment_debit_result_obj->num_rows() > 0){
                        $payment_debit_result = $payment_debit_result_obj->result();
                        $current_payment_details = array();
                        foreach ($payment_debit_result as $payment_debit_values) {
                            $current_payment_details['account_name'] = $payment_debit_values->account_name;
                        }
                        $current_payment_details['current_payment_type'] = 'debit';
                        return $current_payment_details;
                    }
                }
            } else {
                return FALSE;
            }
        }catch(Exception $e){
            throw new Exception('Error in DB query');
            return FALSE;
        }

       
    }
     public function inactive_current_payment_details($customer_id, $payment_details) {
        $payment_option = $payment_details['payment_option'];
        try {
            if($payment_option == 'credit') {
                $payment_update_sql = "UPDATE credit_payment
                                          SET active_status=?
                                        WHERE customer_id=?";
            } else if($payment_option == 'debit') {
                $payment_update_sql = "UPDATE debit_payment
                                          SET active_status=?
                                        WHERE customer_id=?";
            }
            $payment_result_obj = $this->db->query($payment_update_sql,array('I',trim($customer_id)));
        }catch(Exception $e){
            throw new Exception('Error in DB query');
            return FALSE;
        }
     }

     public function update_current_payment_type($customer_id,$payment_option) {
         try {
           $current_payment_update_sql = "UPDATE customer
                                             SET current_payment_type=?
                                           WHERE customer_id=?";
           $current_payment_update_obj = $this->db->query($current_payment_update_sql,array($payment_option,trim($customer_id)));
         } catch(Exception $e){
            throw new Exception('Error in DB query');
            return FALSE;
        }
     }
}
?>
