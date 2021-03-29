<?php
	$this->load->view('admin/header');


?>


 <div class="app-content content container-fluid">
      <div class="content-wrapper">
        
        <div class="content-body"><!-- Basic form layout section start -->
<section id="basic-form-layouts">
	


	<div class="row match-height" >
	   <div class="container">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title" id="basic-layout-icons">Add-User</h4>
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
										<input type="text" id="timesheetinput1" class="form-control" placeholder="User Name" name="name" value="<?php echo @$name; ?>">
											
										<div class="form-control-position">
											<i class="icon-head"></i>
										</div>
									</div>
								</div>

								<div class="form-group">
									<label for="timesheetinput2">Email</label>
									<div class="position-relative has-icon-left">
										<input type="text" id="timesheetinput2" class="form-control" placeholder="User Email" name="email" value="<?php echo @$email; ?>" >
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
													<input type="radio" name="gender" class="custom-control-input" value="male" <?php if(@$gender=='male'){ echo 'checked="checked"';} ?>>
													<span class="custom-control-indicator"></span>
													<span class="custom-control-description ml-0">Male</span>
												</label>&nbsp;&nbsp;
												
												<i class="icon-female2"></i>&nbsp;&nbsp;
												<label class="display-inline-block custom-control custom-radio">
													<input type="radio" name="gender" class="custom-control-input" value="female" <?php if(@$gender=='female'){ echo 'checked="checked"';} ?>>
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
												<option value="<?php echo $aa['country_name']; ?>" <?php if(@$country_update == $aa['country_name']){ echo 'selected="selected"';} ?> ><?php echo $aa['country_name']; ?></option>
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
										<input type="password" id="timesheetinput2" class="form-control" placeholder="User Password" name="password" value="<?php echo @$password; ?>" >
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
													<input type="radio" name="status" class="custom-control-input" checked="checked" value="active" <?php if(@$status=='active'){ echo 'checked="checked"';} ?>>
													<span class="custom-control-indicator"></span>
													<span class="custom-control-description ml-0">Active</span>
												</label>&nbsp;&nbsp;
												
												<i class="icon-ban"></i>&nbsp;&nbsp;
												<label class="display-inline-block custom-control custom-radio">
													<input type="radio" name="status" class="custom-control-input" value="block" <?php if(@$status=='block'){ echo 'checked="checked"';} ?>>
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

							<div class="form-actions right">
								<input type="submit" class="btn btn-primary" name="submit" value="Save">
								<input type="reset" class="btn btn-warning mr-1" name="reset" value="Cancel" >
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



<?php
	$this->load->view('admin/footer');
?>	
