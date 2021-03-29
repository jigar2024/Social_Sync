<?php
		$this->load->model('admin/Dashboard_model');
		$id=$this->session->userdata('userdata');
		$ses=$this->Dashboard_model->getrec($id);
		//print_r($ses);die;
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
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo base_url();?>assets/admin/app-assets/images/ico/apple-icon-60.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url();?>assets/admin/app-assets/images/ico/apple-icon-76.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url();?>assets/admin/app-assets/images/ico/apple-icon-120.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url();?>assets/admin/app-assets/images/ico/apple-icon-152.png">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url();?>assets/admin/app-assets/images/ico/favicon.ico">
    <link rel="shortcut icon" type="image/png" href="<?php echo base_url();?>assets/admin/app-assets/images/ico/favicon-32.png">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/admin/app-assets/css/bootstrap.css">
    <!-- font icons-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/admin/app-assets/fonts/icomoon.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/admin/app-assets/fonts/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/admin/app-assets/vendors/css/extensions/pace.css">
    <!-- END VENDOR CSS-->
    <!-- BEGIN ROBUST CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/admin/app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/admin/app-assets/css/app.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/admin/app-assets/css/colors.css">
    <!-- END ROBUST CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/admin/app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/admin/app-assets/css/core/menu/menu-types/vertical-overlay-menu.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/admin/app-assets/css/core/colors/palette-gradient.css">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link href="<?php echo base_url();?>assets/admin/assets/css/style.css" rel="stylesheet" type="text/css" >
    <!-- END Custom CSS-->
	<link href="<?php echo base_url();?>assets/user/assets/css/style.css" rel="stylesheet" type="text/css" >
	<link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />	
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
            <li class="nav-item hidden-md-up float-xs-right"><a data-toggle="collapse" data-target="#navbar-mobile" class="nav-link open-navbar-container"><i class="icon-ellipsis pe-2x icon-icon-rotate-right-right"></i></a></li>
          </ul>
        </div>
        <div class="navbar-container content container-fluid">
          <div id="navbar-mobile" class="collapse navbar-toggleable-sm">
            <ul class="nav navbar-nav">
              <li class="nav-item hidden-sm-down"><a class="nav-link nav-menu-main menu-toggle hidden-xs"><i class="icon-menu5">         </i></a></li>
            </ul>
            <ul class="nav navbar-nav float-xs-right">
               <li class="dropdown dropdown-user nav-item"><a href="#" data-toggle="dropdown" class="dropdown-toggle nav-link dropdown-user-link"><span class="avatar avatar-online"><img src="<?php echo base_url('assets/admin/image/');echo @$ses['image'];?>" alt="avatar"><i></i></span><span class="user-name"><?php echo @$ses['name'];?></span></a>
                <div class="dropdown-menu dropdown-menu-right"><a href="<?php echo site_url('admin/Dashboard/adminprofile'); ?>" class="dropdown-item"><i class="icon-head"></i> Edit Profile</a>
                  <div class="dropdown-divider"></div><a href="<?php echo site_url('admin/Admin/logout');?>" class="dropdown-item"><i class="icon-power3"></i> Logout</a>
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
          
          <!-- Dashboard list -->
          	<li class=" nav-item"><a href="#"><i class="icon-steam3"></i><span data-i18n="nav.project.main" class="menu-title">Dashboard</span></a>
            <ul class="menu-content">
				  <li><a href="<?php echo site_url('admin/Dashboard/index');?>" data-i18n="nav.invoice.invoice_template" class="menu-item"><i class="icon-android-person-add"></i>Dashboard</a>
              	  </li> 
            </ul>
          </li>
          
		  <!-- admin list -->
		  
          
          
          <li class=" nav-item"><a href="#"><i class="icon-android-contact"></i><span data-i18n="nav.project.main" class="menu-title">Admin</span></a>
            <ul class="menu-content">
				  <li><a href="<?php echo site_url('admin/Admin/add_admin');?>" data-i18n="nav.invoice.invoice_template" class="menu-item"><i class="icon-android-person-add"></i> Add Admin</a>
              </li>
              
			  <li><a href="<?php echo site_url('admin/Admin/view_admin');?>" data-i18n="nav.gallery_pages.gallery_grid" class="menu-item"><i class="icon-android-person"></i> View Admin</a>
              </li>
              
            </ul>
          </li>
		  
		  
		  <li class=" nav-item"><a href="#"><i class="icon-android-contacts"></i><span data-i18n="nav.project.main" class="menu-title">User</span></a>
            <ul class="menu-content">
				  <!--<li><a href="<?php //echo site_url('admin/User/add_user');?>" data-i18n="nav.invoice.invoice_template" class="menu-item"><i class="icon-android-person-add"></i> Add User</a>
              </li>-->
              
			  <li><a href="<?php echo site_url('admin/User/view_user');?>" data-i18n="nav.gallery_pages.gallery_grid" class="menu-item"><i class="icon-android-person"></i> View User</a>
              </li>
              
            </ul>
          </li>
		  
		  
		  <!-- country list -->
		  
		  <li class=" nav-item"><a href="#"><i class="icon-android-globe"></i><span data-i18n="nav.project.main" class="menu-title">Country</span></a>
            <ul class="menu-content">
				  <li><a href="<?php echo site_url('admin/Country/add_country');?>" data-i18n="nav.invoice.invoice_template" class="menu-item"><i class="icon-android-add-circle"></i> Add Country</a>
              </li>
              
			  
			  
			  <li><a href="<?php echo site_url('admin/Country/view_country');?>" data-i18n="nav.gallery_pages.gallery_grid" class="menu-item"><i class="icon-eye5"></i> View Country</a>
              </li>
              
            </ul>
          </li>
		  
		  
		<li class=" nav-item"><a href="#"><i class="icon-location2"></i><span data-i18n="nav.project.main" class="menu-title">State</span></a>
            <ul class="menu-content">
				  <li><a href="<?php echo site_url('admin/State/add_state');?>" data-i18n="nav.invoice.invoice_template" class="menu-item"><i class="icon-android-add-circle"></i> Add state</a>
              </li>
              
			  <li><a href="<?php echo site_url('admin/State/view_state');?>" data-i18n="nav.gallery_pages.gallery_grid" class="menu-item"><i class="icon-eye5"></i> View state</a> 
              </li>
              
            </ul>
          </li>
		
		
		<li class=" nav-item"><a href="#"><i class="icon-location4"></i><span data-i18n="nav.project.main" class="menu-title">City</span></a>
            <ul class="menu-content">
				  <li><a href="<?php echo site_url('admin/City/add_city');?>" data-i18n="nav.invoice.invoice_template" class="menu-item"><i class="icon-android-add-circle"></i> Add city</a>
              </li>
              
			  <li><a href="<?php echo site_url('admin/City/view_city');?>" data-i18n="nav.gallery_pages.gallery_grid" class="menu-item"><i class="icon-eye5"></i> View city</a>
              </li>
              
            </ul>
          </li>
          
          
		<li class=" nav-item"><a href="#"><i class="icon-help-buoy"></i><span data-i18n="nav.project.main" class="menu-title">Social Accounts</span></a>
            <ul class="menu-content">
				 
			  <li><a href="<?php echo site_url('admin/Social_Post/view_social_account');?>" data-i18n="nav.gallery_pages.gallery_grid" class="menu-item"><i class="icon-help-buoy"></i>Social Accounts</a>
              </li>
              
            </ul>
          </li>

		<li class=" nav-item"><a href="#"><i class="icon-ios-bookmarks"></i><span data-i18n="nav.project.main" class="menu-title">Job List</span></a>
            <ul class="menu-content">
				 
			  <li><a href="<?php echo site_url('admin/Social_Post/view_job_list');?>" data-i18n="nav.gallery_pages.gallery_grid" class="menu-item"><i class="icon-ios-bookmarks"></i>Job List</a>
              </li>
              
            </ul>
          </li>
		

        </ul>
      </div>
      <!-- /main menu content-->
      <!-- main menu footer-->
      <!-- include includes/menu-footer-->
      <!-- main menu footer-->
    </div>
    <!-- / main menu-->