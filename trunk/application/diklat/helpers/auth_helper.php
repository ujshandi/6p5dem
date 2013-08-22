<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

# get
if ( ! function_exists('get_level'))
{
	function get_level()
	{
		$CI =& get_instance();
		$CI->load->model('authentikasi');
		return $CI->authentikasi->get_level();
	}
}

# Cek login
if ( ! function_exists('is_login'))
{
	function is_login()
	{
		return get_instance()->session->userdata('login')?TRUE:FALSE;
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

# get User ID
if ( ! function_exists('get_userid'))
{
	function get_userid()
	{
		return get_instance()->session->userdata('userid');
	}
}

# get kode cabang
if ( ! function_exists('get_kodecabang'))
{
	function get_kodecabang()
	{
		return get_instance()->session->userdata('kodecabang');
	}
}

# get ID cabang
if ( ! function_exists('get_idcabang'))
{
	function get_idcabang()
	{
		return get_instance()->session->userdata('idcabang');
	}
}

# get user level
if ( ! function_exists('get_userlevel'))
{
	function get_userlevel()
	{
		return get_instance()->session->userdata('userlevel');
	}
}

