<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('ReadCLOB')){
	function ReadCLOB($obj){
		if(is_object($obj)){
			return $obj->load();
		}else{
			return "";
		}
	}
}
