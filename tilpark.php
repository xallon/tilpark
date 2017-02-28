<?php
ob_start();
session_start();

date_default_timezone_set('Europe/Istanbul');
error_reporting(E_ALL);


/*** GLOBAL ***/



/* --------------------------------------------------- ROOT */

/** 
 * title: root_path()
 * desc: root_path() fonksiyonu, lazim olan dosyalari ice aktarirken kok dizini bulmamızı kolaylastirir.
 */
define( 'ROOT_PATH', dirname(__FILE__));

function root_path($val) {
	return ROOT_PATH.'/'.$val;
}
include root_path('config.php');



function til_include($val) {
	require_once root_path('includes/'.$val.'.php');
}







/* --------------------------------------------------- THEME */

/** 
 * title: get_header()
 * desc: header.php dosyasını include eder.
 */
function get_header()
{
	include root_path('content/themes/default/header.php');
}

/** 
 * title: get_footer()
 * desc: footer.php dosyasını include eder.
 */
function get_footer()
{
	include root_path('content/themes/default/footer.php');
}

/** 
 * title: get_sidebar()
 * desc: sidebar.php dosyasını include eder.
 */
function get_sidebar()
{
	include root_path('content/themes/default/sidebar.php');
}



/* --------------------------------------------------- URL */
/** 
 * title: get_site_url()
 * desc: site adresini dondurur
 */
function get_site_url($val='', $val_2=false)
{
	if(_helper_site_url($val)) {
		$val = _helper_site_url($val);

		if(is_numeric($val_2)) {
			$val = $val.'?id='.$val_2;
		} else {
			$val = $val.'?'.$val_2;
		}
	}

	if(substr($val, 0,1) == '/') {
		return _site_url.''.$val;
	} else {
		return _site_url.'/'.$val;
	}
	
}
/**
 * title: site_url()
 * desc: site adresini gosterir
 * func: get_site_url() 
 */
function site_url($val='', $val_2=false)
{
	echo get_site_url($val, $val_2);
}

/*
 * _helper_site_url()
 *	get_site_url() fonksiyonu icin kisaltmalari olusturur
 */
function _helper_site_url($val) {
	if($val == 'form') {
		return 'admin/form/detail.php';
	} else if($val == 'item') {
		return 'admin/item/detail.php';
	} else if($val == 'message') {
		return 'admin/user/message/detail.php';
	} else if($val == 'task') {
		return 'admin/user/task/detail.php';
	} else {
		return false;
	}
}



/** 
 * title: get_template_url()
 * desc: secili temanın klasör adresini url olarak döndürür
 */
function get_template_url($val='')
{
	return get_site_url().'/content/themes/default/'.$val;
}
/** 
 * title: template_url()
 * func: get_template_url()
 */
function template_url($val='')
{
	echo get_template_url($val);
}





/* --------------------------------------------------- INCLUDE FUNCTIONS */
til_include('db');
til_include('lang');
til_include('login');
til_include('helper');
til_include('input');
til_include('user');
til_include('log');
til_include('options');
til_include('theme');
til_include('account');
til_include('item');
til_include('form');
til_include('case');
til_include('chartjs');
til_include('message');
til_include('upload');
til_include('task');

















/* --------------------------------------------------- DEFAULT FUNCTIONS */
is_login();




$_args = array(
	'taxonomy'=>'form',
	'name'=>'Form',
	'description'=>'Genel form durumu yönetimi',
	'in_out'=>true,
	'sms_template'=>true,
	'email_template'=>true,
	'color'=>true,
	'bg_color'=>true
);
register_form_status($_args);
unset($_args);



$_args = array(
	'taxonomy'=>'teknik_servis',
	'name'=>'Teknik Servis',
	'description'=>'',
	'in_out'=>false,
	'sms_template'=>false,
	'email_template'=>false,
	'color'=>true,
	'bg_color'=>false
);
register_form_status($_args);
unset($_args);















?>