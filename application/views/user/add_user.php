<!DOCTYPE html>
<html lang="en" data-textdirection="ltr" class="loading">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Robust admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, robust admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title></title>
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo base_url();?>/assets/admin/app-assets/images/ico/apple-icon-60.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url();?>/assets/admin/app-assets/images/ico/apple-icon-76.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url();?>/assets/admin/app-assets/images/ico/apple-icon-120.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url();?>/assets/admin/app-assets/images/ico/apple-icon-152.png">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url();?>/assets/admin/app-assets/images/ico/favicon.ico">
    <link rel="shortcut icon" type="image/png" href="<?php echo base_url();?>/assets/admin/app-assets/images/ico/favicon-32.png">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/admin/app-assets/css/bootstrap.css">
    <!-- font icons-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/admin/app-assets/fonts/icomoon.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/admin/app-assets/fonts/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/admin/app-assets/vendors/css/extensions/pace.css">
    <!-- END VENDOR CSS-->
    <!-- BEGIN ROBUST CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/admin/app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/admin/app-assets/css/app.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/admin/app-assets/css/colors.css">
    <!-- END ROBUST CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/admin/app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/admin/app-assets/css/core/menu/menu-types/vertical-overlay-menu.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/admin/app-assets/css/pages/login-register.css">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/admin/assets/css/style.css">
    <!-- END Custom CSS-->
  </head>
  <body data-open="click" data-menu="vertical-menu" data-col="1-column" class="vertical-layout vertical-menu 1-column  blank-page blank-page">


 <div class="app-content content container-fluid">
      <div class="content-wrapper">
        
        <div class="content-body"><!-- Basic form layout section start -->
<section id="basic-form-layouts">
	


	<div class="row match-height" >
	   <div class="container">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title" id="basic-layout-icons">Registration</h4>
					<a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
					<div class="heading-elements">
						<ul class="list-inline mb-0">
							<li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
							<li><a data-action="reload"><i class="icon-reload"></i></a></li>
							<li><a data-action="expand"><i class="icon-expand2"></i></a></li>
							<li><a data-action="close"><i class="icon-cross2"></i></a></li>
						</ul>
					</div>
				</div>
				<div class="card-body collapse in">
					<div class="card-block">
						<div style="width:100%; text-align:center; color:#FF0000;">
						<?php
							
							if(form_error('name'))
							 {
								echo form_error('name');
							 }
							else if(form_error('email'))
							 {
							 	echo form_error('email');
							 }
							else if(@$check_email !='')
							 {
							 	echo "This Email Is Already Used Please Enter Another One";
							 }
							else if(form_error('gender'))
							 {
							 	echo form_error('gender');
							 }
							else if(form_error('country'))
							 {
							 	echo form_error('country');
							 }
							else if(form_error('password'))
							 {
							 	echo form_error('password');
							 }
							else if(@$file_err)
							 {
							 	echo $file_err;
							 }
							 
						?>
						</div>
						<form class="form" method="post" enctype="multipart/form-data">
							<div class="form-body">
								<div class="form-group">
									<label for="timesheetinput1">Name</label>
									<div class="position-relative has-icon-left">
										<input type="text" id="timesheetinput1" class="form-control" placeholder="User Name" name="name" value="<?php echo set_value('name'); ?>">
											
										<div class="form-control-position">
											<i class="icon-head"></i>
										</div>
									</div>
								</div>

								<div class="form-group">
									<label for="timesheetinput2">Email</label>
									<div class="position-relative has-icon-left">
										<input type="text" id="timesheetinput2" class="form-control" placeholder="User Email" name="email" value="<?php echo set_value('email'); ?>" >
										<div class="form-control-position">
											<i class="icon-mail6"></i>
										</div>
									</div>
								</div>
								
								
								<div class="form-group">
											<label>Gender</label>
											<div class="input-group">
												<i class="icon-male2"></i>
												<label class="display-inline-block custom-control custom-radio ml-1">
													<input type="radio" name="gender" class="custom-control-input" value="male" <?php echo set_radio('gender','male'); ?>>
													<span class="custom-control-indicator"></span>
													<span class="custom-control-description ml-0">Male</span>
												</label>&nbsp;&nbsp;
												
												<i class="icon-female2"></i>&nbsp;&nbsp;
												<label class="display-inline-block custom-control custom-radio">
													<input type="radio" name="gender" class="custom-control-input" value="female" <?php set_radio('gender','female'); ?>>
													<span class="custom-control-indicator"></span>
													<span class="custom-control-description ml-0">Female</span>
												</label>
											</div>
								</div>
								
								
								<div class="form-group">
									<label for="timesheetinput2">Country</label>
									<div class="position-relative has-icon-left">
										
										<select name="country" id="timesheetinput2" class="form-control">
											
											<option value="">-- select --</option>
											<?php foreach($country as $aa){?>
												<option value="<?php echo $aa['country_name']; ?>" <?php echo set_select('country',$aa['country_name']); ?> ><?php echo $aa['country_name']; ?></option>
											<?php }?>
										</select>
										
										<div class="form-control-position">
											<i class="icon-android-globe	"></i>
										</div>
									</div>
								</div>
								
								
								<div class="form-group">
									<label for="timesheetinput2">Password</label>
									<div class="position-relative has-icon-left">
										<input type="password" id="timesheetinput2" class="form-control" placeholder="User Password" name="password" value="<?php echo set_value('password'); ?>" >
										<div class="form-control-position">
											<i class="icon-key3"></i>
										</div>
									</div>
								</div>
								
								
								<div class="form-group">
											<label>Status</label>
											<div class="input-group">
												<i class="icon-check"></i>
												<label class="display-inline-block custom-control custom-radio ml-1">
													<input type="radio" name="status" class="custom-control-input" checked="checked" value="1" <?php echo set_radio('status','1');?>>
													<span class="custom-control-indicator"></span>
													<span class="custom-control-description ml-0">Active</span>
												</label>&nbsp;&nbsp;
												
												<i class="icon-ban"></i>&nbsp;&nbsp;
												<label class="display-inline-block custom-control custom-radio">
													<input type="radio" name="status" class="custom-control-input" value="0" <?php set_radio('status','0'); ?>>
													<span class="custom-control-indicator"></span>
													<span class="custom-control-description ml-0">Block</span>
												</label>
											</div>
								</div>
								
								
								
								
								
								
								<div class="form-group">
									<label for="timesheetinput2">Photo</label>
									<div class="position-relative has-icon-left">
									
										<input type="file" id="timesheetinput2" class="form-control"  name="photo">
										<?php if(@$image){?>
											<img src="<?php echo base_url();echo "/assets/user/image/".$image;?>" height="100" width="100"/>	
										<?php } ?>
										<div class="form-control-position">
											<i class="icon-image4"></i>
										</div>
									</div>
								</div>
								
								
								
								
							
							
							</div>
							<div class="form-actions left" style="float:left;">
								<input type="submit" class="btn btn-primary" name="cancel" value="Back">
							</div>
							<div class="form-actions right">
								<input type="submit" class="btn btn-primary" name="submit" value="Save">
								<input type="reset" class="btn btn-warning mr-1" name="reset" value="Reset" >
							</div>
							
						</form>

					</div>
				</div>
			</div>
		</div>
	   </div>
	</div>


</section>
<!-- // Basic form layout section end -->
        </div>
      </div>
    </div>



<!-- BEGIN VENDOR JS-->
    <script src="<?php echo base_url();?>/assets/admin/app-assets/js/core/libraries/jquery.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>/assets/admin/app-assets/vendors/js/ui/tether.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>/assets/admin/app-assets/js/core/libraries/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>/assets/admin/app-assets/vendors/js/ui/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>/assets/admin/app-assets/vendors/js/ui/unison.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>/assets/admin/app-assets/vendors/js/ui/blockUI.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>/assets/admin/app-assets/vendors/js/ui/jquery.matchHeight-min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>/assets/admin/app-assets/vendors/js/ui/screenfull.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>/assets/admin/app-assets/vendors/js/extensions/pace.min.js" type="text/javascript"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN ROBUST JS-->
    <script src="<?php echo base_url();?>/assets/admin/app-assets/js/core/app-menu.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>/assets/admin/app-assets/js/core/app.js" type="text/javascript"></script>
    <!-- END ROBUST JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <!-- END PAGE LEVEL JS-->
  </body>
</html>