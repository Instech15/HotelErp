<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Lsoft_setting
{
 //sms config update form for sending sms
    public function sms_configuration_form(){
        $CI =& get_instance();
        $CI->load->model('dashboard/Sms_model','sms_model');
        $setting_detail = $CI->sms_model->retrieve_sms_editdata();
        return $setting_detail;
    } 
	
	//send sms after order completed
    public function send_sms($order_no=null,$customer_id=null,$type=null){

        $CI =& get_instance();
        $CI->load->model('dashboard/Sms_model','sms_model');
        $gateway =    $CI->sms_model->retrieve_active_getway();
        $sms_template = $CI->db->select('*')->from('sms_template')->where('type',$type)->get()->row();
        $sms = $CI->db->select('*')->from('sms_configuration')->get()->row();
		$customer_info=$CI->db->select('cust_phone')->from('customerinfo')->where('customerid',$customer_id)->get()->row();
		$recipients = $customer_info->cust_phone;
		 $sms_type= strtolower($sms_template->type);
         if($sms_type == "completeorder" || $sms_type == "processing" || $sms_type == "cancel"){             
             $message= str_replace('{id}', $order_no,  $sms_template->message);
         }
        if(1 == $gateway->id ){


         /****************************
        *Gateway Setup
        ****************************/
         $CI =& get_instance();
         $url      = "http://api.smsrank.com/sms/1/text/singles";      
         $username = $gateway->user_name;
         $password=base64_encode($gateway->password); 
         $message=base64_encode($message);
         $curl = curl_init();

         curl_setopt($curl, CURLOPT_URL, "$url?username=$username&password=$password&to=$recipients&text=$message");
         curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
         $agent = 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)';
         curl_setopt($curl, CURLOPT_USERAGENT, $agent);
         $output = json_decode(curl_exec($curl), true);
         return  true;
         curl_close($curl);
        }
        if( 2 == $gateway->id ){
        /****************************
        *Gateway Setup
        ****************************/
        $api = $gateway->user_name;
        $secret_key = $gateway->password;
        $message  =   $message;
        $from       = $gateway->sms_from; 

        $data = array(
            'from'     => $from,
            'text'     => $message,
            'to'       => $recipients
        );
        require_once APPPATH.'libraries/nexmo/vendor/autoload.php';
        $basic  = new \Nexmo\Client\Credentials\Basic($api, $secret_key);
        $client = new \Nexmo\Client($basic);
        $message = $client->message()->send($data);
        if(!$message) 
        {      
            return json_encode(array(
                'status'      => false,
                'message'     => 'Curl error: '
            ));
        } else {    
            return json_encode(array(
                'status'      => true,
                'message'     => "Send Message: Success "
            ));  
        }
    }

    if( 3 == $gateway->id ){
        /****************************
        *Gateway Setup
        ****************************/
        $message          = $message;
        $from             = $gateway->sms_from; 
        $userid           = $gateway->userid; 
        $username         = $gateway->user_name; 
        $handle           = $gateway->password; 

        $data = array(
            'handle'   => $handle,
            'username' => $username,
            'userid'   => $userid,
            'from'     => $from,
            'msg'      => $message,
            'to'       => $recipients
        );
				
		$url      = "https://api.budgetsms.net/sendsms/";   

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($curl);
		  
        if(curl_errno($curl)) 
        {      
            return json_encode(array(
                'status'      => false,
                'message'     => 'Send Message: ' . "Unknown Error"
            ));
        } else {
            if($response=="ERR 1001")  {  
            return json_encode(array(
                'status'      => true,
                'message'     => "Send Message: ". "Not enough credits to send messages"
            ));
        }
        else if($response=="ERR 1002")  {  
            return json_encode(array(
                'status'      => true,
                'message'     => "Send Message: ". "Identification failed. Wrong credentials"
            ));
        }  
        else if($response=="ERR 1003")  {  
            return json_encode(array(
                'status'      => true,
                'message'     => "Send Message: ". "Account not active, contact BudgetSMS"
            ));
        }  
        else if($response=="ERR 1005")  {  
            return json_encode(array(
                'status'      => true,
                'message'     => "Send Message: ". "No handle provided"
            ));
        }  
        else if($response=="ERR 1006")  {  
            return json_encode(array(
                'status'      => true,
                'message'     => "Send Message: ". "No UserID provided"
            ));
        }  
        else if($response=="ERR 1007")  {  
            return json_encode(array(
                'status'      => true,
                'message'     => "Send Message: ". "No Username provided"
            ));
        }  
        else if($response=="ERR 2001")  {  
            return json_encode(array(
                'status'      => true,
                'message'     => "Send Message: ". "SMS message text is empty"
            ));
        }  
        else if($response=="ERR 2002")  {  
            return json_encode(array(
                'status'      => true,
                'message'     => "Send Message: ". "SMS numeric senderid can be max. 16 numbers"
            ));
        }  
        else if($response=="ERR 2003")  {  
            return json_encode(array(
                'status'      => true,
                'message'     => "Send Message: ". "SMS alphanumeric sender can be max. 11 characters"
            ));
        }  
        else if($response=="ERR 2004")  {  
            return json_encode(array(
                'status'      => true,
                'message'     => "Send Message: ". "SMS senderid is empty or invalid"
            ));
        }  
        else if($response=="ERR 2011")  {  
            return json_encode(array(
                'status'      => true,
                'message'     => "Send Message: ". "Destination is invalid"
            ));
        }  
        else {  
            return json_encode(array(
                'status'      => true,
                'message'     => "Send Message: ". "Unknown error, Code: ".$response 
            ));
        }  
        }   

        curl_close($curl);


    }

}
   


}

