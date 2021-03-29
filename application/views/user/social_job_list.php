<?php
//	echo '<pre>';print_r($getdata);die;
	//echo "<pre>";print_r($jobdata['target_ids']);die;
	$this->load->view('user/header');	
?>

<div class="app-content content container-fluid">
      <div class="content-wrapper">
        
        <div class="content-body"><!-- Basic Tables start -->
<!-- Table head options start -->
<div class="row">
    <div class="col-xs-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">View Jobs List</h3>
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
		        
                <div class="table-responsive">
                    <table class="table tablerec">
                        <thead class="thead-inverse">
                            <tr>
                                <th>Job Title</th>
								<th>Add Account </th>
                                <th>Sync Interval</th>
								<th>Sync Frequency</th>
								<th>Creation Time</th>
								<th>Operation</th>
                           </tr>
                        </thead>
                        <tbody>
							<?php foreach($jobdata as $row){?>
                            	
								<tr>
									
									<td><?php echo $row['job_title']; ?></td>
									<td width="350px;"><?php $targetid=explode(',',$row['target_ids']); 

										foreach($targetid as $val)
										{
											
											foreach($getdata as $id)
											{
												if($val==$id['social_id']&&$id['social_type']=='facebook')
												{
													?>
													<img src="<?php echo base_url(); ?>/assets/user/icon_image/facebook.png" height="40px" width="40px;" />
													<?php 	echo $id['name'];	
												}
												if($val==$id['social_id']&&$id['social_type']=='twitter')
												{
													?>
													<img src="<?php echo base_url(); ?>/assets/user/icon_image/twitter.png" height="40px" width="40px;" />
													<?php echo $id['name'];	
												}
												
												if($val==$id['social_id']&&$id['social_type']=='linkedin')
												{
													?>
													<img src="<?php echo base_url(); ?>/assets/user/icon_image/linkedin.png" height="40px" width="40px;" />
													<?php 	echo $id['name'];	
												}
												if($val==$id['social_id']&&$id['social_type']=='google')
												{
													?>
													<img src="<?php echo base_url(); ?>/assets/user/icon_image/google_plus.png" height="40px" width="40px;" />
													<?php 	echo $id['name'];	
												}
												if($val==$id['url']&&$id['social_type']=='tumblr')
												{
													?>
													<img src="<?php echo base_url(); ?>/assets/user/icon_image/tumblr.png" height="40px" width="40px;" />
													<?php 	echo $id['name'];	
												}
												if($val==$id['social_id']&&$id['social_type']=='pinterest')
												{
													?>
													<img src="<?php echo base_url(); ?>/assets/user/icon_image/pinterest.png" height="40px" width="40px;" />
													<?php 	echo $id['name'];	
												}
												
											}
										}
											
										
									
									?></td>
									<td><?php echo $row['sync_interval']; ?></td>
									<td><?php echo $row['sync_frequency']; ?></td>								
									<td><?php echo $row['creation_time']; ?></td>
							    	
									<td><a href="<?php echo site_url('user/Social_Post/show_post/'.$row['job_id']);?>" data-i18n="nav.invoice.invoice_template" class="menu-item" style="color:#0000CC;">View Jobs Report</a></td>
                            	</tr>
							<?php }?>
							<tr>
								<td colspan="10" >
								 <center>
								 	<div class="pagination">
										<?php echo $this->pagination->create_links(); ?>
									</div>
								</center>
								</td>
							</tr>
                        </tbody>
                    </table>
                        
                </div>
            </div>
        </div>
    </div>
</div>
        </div>
      </div>
    </div>
  

<?php
	$this->load->view('user/footer');
?>