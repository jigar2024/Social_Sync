	<?php
		$this->load->model('user/Dashboard_model');
		$id=$this->session->userdata('userdata');
		$ses=$this->Dashboard_model->getrec($id);
		
		
?>

<!DOCTYPE html>
<html lang="en" data-textdirection="ltr" class="loading">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Robust admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, robust admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Social Sync</title>
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo base_url();?>assets/user/app-assets/images/ico/apple-icon-60.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url();?>assets/user/app-assets/images/ico/apple-icon-76.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url();?>assets/user/app-assets/images/ico/apple-icon-120.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url();?>assets/user/app-assets/images/ico/apple-icon-152.png">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url();?>assets/user/app-assets/images/ico/favicon.ico">
    <link rel="shortcut icon" type="image/png" href="<?php echo base_url();?>assets/user/app-assets/images/ico/favicon-32.png">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/user/app-assets/css/bootstrap.css">
    <!-- font icons-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/user/app-assets/fonts/icomoon.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/user/app-assets/fonts/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/user/app-assets/vendors/css/extensions/pace.css">
    <!-- END VENDOR CSS-->
    <!-- BEGIN ROBUST CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/user/app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/user/app-assets/css/app.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/user/app-assets/css/colors.css">
    <!-- END ROBUST CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/user/app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/user/app-assets/css/core/menu/menu-types/vertical-overlay-menu.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/user/app-assets/css/core/colors/palette-gradient.css">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link href="<?php echo base_url();?>assets/user/assets/css/style.css" rel="stylesheet" type="text/css" >
	<link href="<?php echo base_url();?>assets/user/app-assets/css/font-awesome.min.css" rel="stylesheet" type="text/css" >
	<link href="<?php echo base_url();?>assets/user/assets/css/multiple-select.css" rel="stylesheet" type="text/css" >
    <!-- END Custom CSS-->
	<link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
	
	<?php if(@$modal=="true"){ ?>
	<style>
		.modal
		{
			background-color:rgba(0,0,0,.5) !important;
		}
	</style>
	<?php } ?>
  </head>
  <body data-open="click" data-menu="vertical-menu" data-col="2-columns" class="vertical-layout vertical-menu 2-columns  fixed-navbar">

    <!-- navbar-fixed-top-->
    <nav class="header-navbar navbar navbar-with-menu navbar-fixed-top navbar-semi-dark navbar-shadow">
      <div class="navbar-wrapper">
        <div class="navbar-header">
          <ul class="nav navbar-nav">
            <li class="nav-item mobile-menu hidden-md-up float-xs-left"><a class="nav-link nav-menu-main menu-toggle hidden-xs"><i class="icon-menu5 font-large-1"></i></a></li>
            <li class="nav-item"><a href="<?php echo site_url('user/Dashboard/index'); ?>" class="navbar-brand nav-link"><img alt="branding logo" class="logo_sync" src="<?php echo base_url();?>assets/user/image/logo.png" style="height:100%; width:100%; z-index:10;"></a></li>
            <li class="nav-item hidden-md-up float-xs-right"><a data-toggle="collapse" data-target="#navbar-mobile" class="nav-link open-navbar-container"><i class="icon-ellipsis pe-2x icon-icon-rotate-right-right"></i></a></li>
          </ul>
        </div>
        <div class="navbar-container content container-fluid">
          <div id="navbar-mobile" class="collapse navbar-toggleable-sm">
            <ul class="nav navbar-nav">
              <li class="nav-item hidden-sm-down"><a class="nav-link nav-menu-main menu-toggle hidden-xs"><i class="icon-menu5">         </i></a></li>
            </ul>
            <ul class="nav navbar-nav float-xs-right">
              <li class="dropdown dropdown-user nav-item"><a href="#" data-toggle="dropdown" class="dropdown-toggle nav-link dropdown-user-link"><span class="avatar avatar-online"><img src="<?php echo base_url('assets/user/image/');echo @$userdata['image'];?>" alt="avatar"><i></i></span><span class="user-name"><?php echo @$userdata['name'];?></span></a>
                <div class="dropdown-menu dropdown-menu-right">
				
				<a href="<?php echo site_url('user/User/profileuser'); ?>" class="dropdown-item"><i class="icon-head"></i> Edit Profile</a>
				
				  <div class="dropdown-divider"></div><a href="<?php echo site_url('user/User/logout');?>" class="dropdown-item"><i class="icon-power3"></i> Logout</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>

    <!-- ////////////////////////////////////////////////////////////////////////////-->


    <!-- main menu-->
    <div data-scroll-to-active="true" class="main-menu menu-fixed menu-dark menu-accordion menu-shadow">
      <!-- main menu header-->
      <div class="main-menu-header"></div>
      <!-- / main menu header-->
      <!-- main menu content-->
      <div class="main-menu-content">
        <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
          <li class=" nav-item"><a href="<?php echo site_url('user/Dashboard/index');?>"><i class="icon-home3"></i><span data-i18n="nav.dash.main" class="menu-title">Dashboard</span></a>
          </li>
		  
          <li class=" nav-item"><a href="<?php echo $this->session->userdata('oauthURL_facebook'); ?>"><i class="icon-facebook"></i><span data-i18n="nav.project.main" class="menu-title">Facebook</span></a></li>
		  
		  <li class=" nav-item"><a href="<?php echo $this->session->userdata('oauthURL'); ?>"><i class="icon-twitter"></i><span data-i18n="nav.project.main" class="menu-title">Twitter</span></a></li>
		  
		  <li class=" nav-item"><a href="<?php echo $this->session->userdata('oauthURL_linkedin'); ?>"><i class="icon-linkedin"></i><span data-i18n="nav.project.main" class="menu-title">Linkedin</span></a></li>
		  
		  <li class=" nav-item"><a href="<?php echo $this->session->userdata('loginURL'); ?>"><i class="icon-google-plus"></i><span data-i18n="nav.project.main" class="menu-title">Google+</span></a></li>
		  
		  <li class=" nav-item"><a href="<?php echo $this->session->userdata('tm_url'); ?>"><i class="icon-tumblr"></i><span data-i18n="nav.project.main" class="menu-title">Tumblr</span></a></li>
		  
		  <li class=" nav-item"><a href="<?php echo $this->session->userdata('pin_url'); ?>"><i class="icon-pinterest"></i><span data-i18n="nav.project.main" class="menu-title">Pinterest</span></a></li>

		  <li class=" nav-item"><a href="<?php echo site_url('user/Dashboard/acc_list'); ?>"><i class="icon-paper"></i><span data-i18n="nav.dash.main" class="menu-title">Account List</span></a>
          </li>
		  <li class=" nav-item"><a href="<?php echo site_url('user/Social_Post/view_job_list');?>"><i class="icon-paper"></i><span data-i18n="nav.dash.main" class="menu-title">Job List</span></a>
          </li>
        </ul>
      </div>
      <!-- /main menu content-->
      <!-- main menu footer-->
      <!-- include includes/menu-footer-->
      <!-- main menu footer-->
    </div>
    <!-- / main menu-->