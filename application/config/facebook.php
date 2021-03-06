<?php defined('BASEPATH') OR exit('No direct script access allowed');
/*
| -------------------------------------------------------------------
|  Facebook API Configuration
| -------------------------------------------------------------------
|
| To get an facebook app details you have to create a Facebook app
| at Facebook developers panel (https://developers.facebook.com)
|
|  facebook_app_id               string   Your Facebook App ID.
|  facebook_app_secret           string   Your Facebook App Secret.
|  facebook_login_type           string   Set login type. (web, js, canvas)
|  facebook_login_redirect_url   string   URL to redirect back to after login. (do not include base URL)
|  facebook_logout_redirect_url  string   URL to redirect back to after logout. (do not include base URL)
|  facebook_permissions          array    Your required permissions.
|  facebook_graph_version        string   Specify Facebook Graph version. Eg v2.6
|  facebook_auth_on_load         boolean  Set to TRUE to check for valid access token on every page load.
*/
if($_SERVER['HTTP_HOST'] == 'localhost'){
	$config['facebook_app_id']              = '1846562505417895';
	$config['facebook_app_secret']          = '7edcadd112cf3bcf71252c0c81556fd5';
	$config['facebook_login_type']          = 'web';
	$config['facebook_login_redirect_url']  = 'index.php/user/Dashboard/facebook_redirect';
	$config['facebook_logout_redirect_url'] = 'index.php/user/Dashboard/logout';
	$config['facebook_permissions']         = array('email','publish_actions','manage_pages','publish_pages','user_likes','user_managed_groups');
	$config['facebook_graph_version']       = 'v2.12';
	$config['facebook_auth_on_load']        = TRUE;
}else{
	$config['facebook_app_id']              = '176454176298097';
	$config['facebook_app_secret']          = '2b579369aa0c82d41538c8f269381b3b';
	$config['facebook_login_type']          = 'web';
	$config['facebook_login_redirect_url']  = 'index.php/user/Dashboard/facebook_redirect';
	$config['facebook_logout_redirect_url'] = 'index.php/user/Dashboard/logout';
	$config['facebook_permissions']         = array('email','publish_actions','manage_pages','publish_pages');
	$config['facebook_graph_version']       = 'v2.12';
	$config['facebook_auth_on_load']        = TRUE;
	
}