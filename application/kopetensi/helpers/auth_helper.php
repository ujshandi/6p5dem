<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

# Cek login
if ( ! function_exists('is_login'))
{
	function is_login()
	{
		return isset(get_instance()->session->userdata('login'))?TRUE:FALSE;
	}
}

# get Logged as
if ( ! function_exists('logged_as'))
{
	function logged_as()
	{
		return get_instance()->session->userdata('logged_as');
	}
}


