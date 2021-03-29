<?php defined('BASEPATH') OR exit('No direct script access allowed');
/*
| -------------------------------------------------------------------
|  Google API Configuration
| -------------------------------------------------------------------
|  client_id         string   Your Google API Client ID.
|  client_secret     string   Your Google API Client secret.
|  redirect_uri      string   URL to redirect back to after login.
|  application_name  string   Your Google application name.
|  api_key           string   Developer key.
|  scopes            string   Specify scopes
*/

if($_SERVER['HTTP_HOST']=='localhost'){
$config['google']['client_id']        = '551100130580-dbbmofbtvgapsqevc2vimn1h1bf71lnj.apps.googleusercontent.com';
$config['google']['client_secret']    = 'A6vM7M-qTT3ymDgHyMVKJVQP';
$config['google']['redirect_uri']     = 'http://localhost/social_sync/index.php/user/Dashboard/index';
$config['google']['application_name'] = 'Login to CodexWorld.com';
$config['google']['api_key']          = 'AIzaSyCR47RIhU7qvlEHMerZZ-i2CH5gRizVA_Y';
$config['google']['scopes']           = array();
}else{
$config['google']['client_id']        = '551100130580-dbbmofbtvgapsqevc2vimn1h1bf71lnj.apps.googleusercontent.com';
$config['google']['client_secret']    = 'A6vM7M-qTT3ymDgHyMVKJVQP';
$config['google']['redirect_uri']     = 'http://localhost/social_sync/index.php/user/Dashboard/index';
$config['google']['application_name'] = 'Login to CodexWorld.com';
$config['google']['api_key']          = 'AIzaSyCR47RIhU7qvlEHMerZZ-i2CH5gRizVA_Y';
$config['google']['scopes']           = array();
}