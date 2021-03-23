<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$CI = &get_instance();
$CI->config->load();

$config['site_name'] = 'Adventure Exodus Pvt. Ltd.';
$config['site_link'] = 'http://webomatic.design/appolo/';
$config['site_email'] = 'menson.sundash@hotmail.com';

$config['site_path'] = $CI->config->item('base_url');
$config['admin_dir'] = 'admin';
$config['admin_path'] = $config['site_path'].$config['admin_dir'].'/';

$config['site_root'] = $_SERVER['DOCUMENT_ROOT'].'appolo/';

// Define assets path
$config['assets'] = $config['site_path'].'assets/';
$config['uploads'] = $config['site_root'].'uploads/';



// Error page
$config['css'] = $config['assets'].'css_admin/';
$config['js'] = $config['assets'].'js_admin/';
$config['site_js'] = $config['js'].'site_js/';
$config['images'] = $config['assets'].'images_admin/';
$config['plugins'] = $config['assets'].'plugins/';
$config['bootstrap'] = $config['assets'].'bootstrap/';

$config['admin_asset'] = $config['assets'];
$config['admin_css'] = $config['admin_asset'].'css_admin/';
$config['admin_js'] = $config['admin_asset'].'js_admin/';
$config['bootstrap'] = $config['admin_asset'].'bootstrap/';
$config['admin_images'] = $config['admin_asset'].'images_admin/';

$config['site_asset'] = $config['assets'].'site/';
$config['site_css'] = $config['site_asset'].'css_admin/';
$config['site_images'] = $config['site_asset'].'images_admin/';

// path to jquery Uploadify
$config['uploadify'] = $config['assets'].'uploadify/';

//path to Ckeditor
$config['ckeditor'] = $config['assets'].'editor/ckeditor/';
$config['ckfinder'] = $config['assets'].'editor/ckfinder/';

//Uploads Files

//$config['banner_images_root'] = $config['site_root'].'uploads/banner_images/';
//$config['banner_images_path'] = $config['uploads'].'banner_images/';

$config['rows_per_page'] = '10';
