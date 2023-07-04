<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SecurityClass {

    function Securityfunction() {

        $this->CI =& get_instance();
        $security = $this->CI->db->select('*')->from('dbt_security')->get()->result(); 

        foreach ($security as $key => $value) {
        	$security_decode = json_decode($value->data, TRUE);

        	//Base URL change
        	if ($value->keyword=='url'  && $value->status==1) {
	        	$this->CI->config->set_item('base_url', $security_decode['url']);

        	}
        	
        	// Cookie will only be set if a secure HTTPS connection exists.
        	// Cookie will only be accessible via HTTP(S) (no javascript)
        	if ($value->keyword=='https') {   
        	    if ($security_decode['cookie_secure']==1) {		
		        	$this->CI->config->set_item('cookie_secure', TRUE);
		        }
	        	if ($security_decode['cookie_http']==1) {
		        	$this->CI->config->set_item('cookie_httponly', TRUE);
		        }
        	}

        	// Global xss filtering
        	if ($value->keyword=='xss_filter' && $value->status==1) { 
	        	$this->CI->config->set_item('global_xss_filtering', TRUE);
        	}
    		
        	//CSRF protection
        	if ($value->keyword=='csrf_token'  && $value->status==1) {  
        	    $this->CI->config->set_item('csrf_protection', TRUE);
	        	
        	}
	        
        }
        

        //Block IP check
        $blocklist = $this->CI->db->select('ip_mail')->get_where('dbt_blocklist', array('ip_mail =' => $this->CI->input->ip_address()))->row();

        if ($blocklist) {        	
        	$setting = $this->CI->db->select('*')->from('setting')->get()->row();
        	echo '<center><h2>'.$setting->title.'</h2><br><a href="mailto:'.$setting->email.'">'.$setting->email.'</a> <a href="tel:'.$setting->phone.'">'.$setting->phone.'</a><br><img src="'.base_url($setting->logo).'" width="150"/><center>';
        	exit();
        }

    }

}