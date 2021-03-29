<?php
	$this->load->view('user/header');
	//echo '<pre>';print_r($loginURL);die;
?>W

	

    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body"><!-- stats -->

<!--/ stats -->
<!--/ project charts -->
<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card">
            <div class="card-body userdash_content">
                <h4>Add Post</h4>
				<p>Add post to many different social_accounts in  our social_sync website.</p>
				<p>Click The 'Send' Buttons and Share Posts.</p>
            </div>
            <div class="card-footer userdash_content_social">
					<form class="form" method="post" enctype="multipart/form-data">
							<div class="form-body">
							
							<div class="form-group">
									<label for="timesheetinput1">Job Title</label>
									<div class="position-relative has-icon-left">
										<input type="text" id="timesheetinput1" class="form-control" placeholder="Enter Job Title" name="job_title" />
											
										<div class="form-control-position">
											<i class="icon-code"></i>
										</div>
									</div>
								</div>

							<div class="form-group">
									<label for="timesheetinput1">Account Name</label>
									<div class="position-relative has-icon-left">
										<select name="account_name[]" id="multi-select" size="3" multiple="multiple" tabindex="1" class="acc_drop">		
												
											<?php foreach($acc_type as $social_type){?>	
												
												<option value="<?php if($social_type['social_type'] == 'tumblr'){ echo $social_type['social_type']."_".$social_type['url']; } else{ echo $social_type['social_type']."_".$social_type['social_id']; } ?>">&nbsp;<?php echo $social_type['social_type']; ?>&nbsp;(<?php echo $social_type['name']; ?>)</option>
												
											<?php } ?>
											</select>
										
									</div>
								</div>
								<div class="form-group post" id="addplus">
									<label for="timesheetinput1">Add Post</label>
									<div class="position-relative has-icon-left">
										
										
										<div class="border rounded post_style" >
											
												<textarea name="add_post" placeholder="What do you want to share" class="text_post"></textarea>
												<div class="form-control-position" style="padding-top:9px;">
													<i class="icon-pencil3"></i>
												</div>
											
											<div class="post_img">
												<label for="choose_pic" style="margin:0;">
													<i class="fa fa-camera"></i>
													<span>Add A Photo or Videos</span>
													<input type="file" id="choose_pic" name="post_image" onchange="readURL(this);" style=" display:none; opacity:0;"/>
													
    												<img id="blah" src="#" />
												</label>
											</div>
										</div>
										<div class="plus1">
											<label id="pls"><i class="icon-plus" id="add"></i></label>
										</div>
									</div> 	
									
								</div>
								
								<div class="form-group" id="past">
								</div>		
								
								<div style="clear:both;"></div>
								<div class="form-group" style="margin-top:20px;">
									<label for="timesheetinput1">Interval</label>
									<div class="position-relative has-icon-left">
									
			
										<select name="interval" id="timesheetinput1" class="form-control">	
												<option value="">Select Interval</option>
												<option value="1">1 minute</option>
												<option value="2">2 minute</option>
												<option value="3">3 minute</option>
												<option value="4">4 minute</option>
												<option value="5">5 minute</option>
												<option value="6">6 minute</option>
												<option value="7">7 minute</option>
												<option value="8">8 minute</option>
												<option value="9">9 minute</option>
												<option value="10">10 minute</option>
												<option value="15">15 minute</option>
												<option value="30">30 minute</option>
												<option value="45">45 minute</option>
												<option value="60">60 minute</option>
												<option value="120">2 hour</option>
												<option value="180">3 hour</option>
												<option value="240">4 hour</option>
												<option value="300">5 hour</option>
												<option value="360">6 hour</option>
												<option value="420">7 hour</option>
												<option value="480">8 hour</option>
												<option value="540">9 hour</option>
												<option value="600">10 hour</option>
												<option value="900">15 hour</option>
												<option value="1200">20 hour</option>
												<option value="1440">1 day</option>
												<option value="2880">2 day</option>
												<option value="4320">3 day</option>
												<option value="5760">4 day</option>
												<option value="7200">5 day</option>
												<option value="8640">6 day</option>
												<option value="10080">7 day</option>
												<option value="11520">8 day</option>
												<option value="12960">9 day</option>
												<option value="14400">10 day</option>
												<option value="21600">15 day</option>
												<option value="28800">20 day</option>
												<option value="36000">25 day</option>
												<option value="43200">1 month</option>												
										</select>
										
											
										<div class="form-control-position">
											<i class="icon-code"></i>
										</div>
									</div>
								</div>
								
								
								
								
								<div class="form-group" style="margin-top:20px;" >
									<label for="timesheetinput1">Frequency</label>
									<div class="position-relative has-icon-left">
									
			
										<select name="frequency" id="timesheetinput1" class="form-control">	
												<option value="">Select Frequency</option>
												<?php
													for($i=1;$i<=50;$i++)
													{
												 ?>
												 <option value="<?php  echo $i; ?>"><?php  echo $i; ?></option>
												 <?php 
												 	}
												 ?>
												
										</select>
										
											
										<div class="form-control-position">
											<i class="icon-code"></i>
										</div>
									</div>
								</div>
							</div>


							<div class="form-actions right">
								<input type="submit" class="btn btn-primary" name="send" value="Send">
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
    <!-- ////////////////////////////////////////////////////////////////////////////-->

<?php
	$this->load->view('user/footer');
?>
