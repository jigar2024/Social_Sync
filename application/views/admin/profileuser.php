<?php
	$this->load->view('admin/header');
	//echo '<pre>';print_r($loginURL);die;
?>
<div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body"><!-- stats -->
		
		<div class="user_div">
			<div class="row match-height" >
	   <div class="container">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title" id="basic-layout	-icons">Edit Profile</h4>
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
								echo  form_error('name');
							 }
							else if(@$file_err)
							 {
							 	echo $file_err;
							 }
						?>
						</div>
						
						<form class="form" method="post" enctype="multipart/form-data">
							
							<div class="form-body">
								
								<?php 
									if(@$image)
									{?>
										<div class="user_image">
											<img src="<?php echo base_url('assets/admin/image/');echo @$image;?>">
										</div>
									<?php 	
									}
									?>
								
								<div class="form-group">
									<label for="timesheetinput1">Name</label>
									<div class="position-relative has-icon-left">
										<input type="text" id="timesheetinput1" class="form-control" placeholder="User Name" name="name" value="<?php echo @$name; ?>" >
										<div class="form-control-position">
											<i class="icon-head"></i>
										</div>
									</div>
								</div>

								<div class="form-group">
									<label for="timesheetinput1">Photo</label>
									<div class="position-relative has-icon-left">
										<input type="file" id="timesheetinput1" class="form-control"  name="photo" />
										<div class="form-control-position">
											<i class="icon-image4"></i>
										</div>
									</div>
								</div>
	
								<div class="form-group">							
									<div class="position-relative has-icon-left">
										<input type="hidden" id="timesheetinput2" class="form-control" placeholder="User Email" name="image" value="<?php echo @$userdata['image']; ?>" >	
									</div>
								</div>
							
							<div class="form-actions right">
								<input type="submit" class="btn btn-primary" name="submit" value="Edit Profile">
								<input type="submit" class="btn btn-warning mr-1" name="cancel" value="Cancel" >
							</div>
							
						</form>

					</div>
				</div>
			</div>
		</div>
	   </div>
	</div>
		</div>
		

        </div>
      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->

<?php
	$this->load->view('admin/footer');
?>