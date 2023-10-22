<?php 
if(! defined('BASEPATH'))exit('No direct script access allowed');
if(!function_exists('is_login')){
	function is_login(){
		$CI=& get_instance();
		return(($CI->session->userdata('username')) ? TRUE: FALSE);
	}
}
?>