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
					<h4 class="card-title" id="basic-layout-icons">Add-City</h4>
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
							
							if(form_error('state_id'))
							 {
								echo form_error('state_id');
							 }
							else if(form_error('city_name'))
							 {
								echo form_error('city_name');
							 }
						?>
						</div>
						<form class="form" method="post" enctype="multipart/form-data">
							<div class="form-body">

								<div class="form-group">
									<label for="timesheetinput1">State Id</label>
									<div class="position-relative has-icon-left">
										<!--<input type="text" id="timesheetinput1" class="form-control" placeholder="State id" name="state_id" value="<?php// echo set_value('state_id'); ?>">-->
										
										<select name="state_id" id="timesheetinput1" class="form-control">	
												<option value="">Select State</option>
											<?php foreach($state_data as $cc){?>	
												
												<option value="<?php echo $cc['state_id'];?>"><?php echo $cc['state_name']; ?></option>
												
												<option value="<?php echo $cc['state_id'];?>" <?php if(@$update['state_id']==$cc['state_id']){?> selected="selected" <?php } ?>><?php echo $cc['state_name']; ?></option>
												
										
											<?php } ?>
										</select>
										
										
											
										<div class="form-control-position">
											<i class="icon-code"></i>
										</div>
									</div>
								</div>
										
							</div>
							
							<div class="form-body">

								<div class="form-group">
									<label for="timesheetinput1">City Name</label>
									<div class="position-relative has-icon-left">
										<input type="text" id="timesheetinput1" class="form-control" placeholder="City Name" name="city_name" value="<?php echo @$city_name; ?>">
											
										<div class="form-control-position">
											<i class="icon-location2"></i>
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
