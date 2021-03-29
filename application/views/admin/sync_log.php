<?php
	$this->load->view('admin/header');	
?>

<div class="app-content content container-fluid">
      <div class="content-wrapper">
        
        <div class="content-body"><!-- Basic Tables start -->
<!-- Table head options start -->
<div class="row">
    <div class="col-xs-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">View Sync Log</h3>
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
                                <th>Job Id</th>
								<th>Message</th>
                                <th>Posted_Id</th>
								<th>Social_Type</th>
								<th>Operation</th>
                           </tr>
                        </thead>
                        <tbody>
							<?php foreach($soc_sync as $row){?>
                            		
                                    
									<td><?php echo $row['job_id']; ?></td>
									<td><?php echo $row['message']; ?></td>								
									<td><?php echo $row['posted_id']; ?></td>
							    	<td><?php echo $row['social_type']; ?></td>
                                    
                                    
									<td style="text-align:center;"><a href="<?php echo site_url('admin/Social_Post/delete_sync_log/'.$row['log_id']);?>" data-i18n="nav.invoice.invoice_template" class="menu-item"><i class="icon-cross"></i></a></td>
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
	$this->load->view('admin/footer');
?>