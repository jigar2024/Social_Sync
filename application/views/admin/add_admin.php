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
					<h4 class="card-title" id="basic-layout-icons">Add-Admin</h4>
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
									<label for="timesheetinput1">Admin Name</label>
									<div class="position-relative has-icon-left">
										<input type="text" id="timesheetinput1" class="form-control" placeholder="Admin Name" name="name" value="<?php echo @$name; ?>">
											
										<div class="form-control-position">
											<i class="icon-head"></i>
										</div>
									</div>
								</div>

								<div class="form-group">
									<label for="timesheetinput2">Admin Email</label>
									<div class="position-relative has-icon-left">
										<input type="text" id="timesheetinput2" class="form-control" placeholder="Admin Email" name="email" value="<?php echo @$email; ?>" >
										<div class="form-control-position">
											<i class="icon-mail6"></i>
										</div>
									</div>
								</div>
								
								<div class="form-group">
									<label for="timesheetinput2">Admin Password</label>
									<div class="position-relative has-icon-left">
										<input type="password" id="timesheetinput2" class="form-control" placeholder="Admin Password" name="password" value="<?php echo @$password; ?>" >
										<div class="form-control-position">
											<i class="icon-key3"></i>
										</div>
									</div>
								</div>
								
								<div class="form-group">
									<label for="timesheetinput2">Admin Photo</label>
									<div class="position-relative has-icon-left">
										<input type="file" id="timesheetinput2" class="form-control img"  name="photo"  >
										<?php
											if(@$image)
											 {?>
											 	<img src="<?php echo base_url();echo "/assets/admin/image/".$image;?>" height="0" width="0"/>
									  <?php   }
										?>
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
