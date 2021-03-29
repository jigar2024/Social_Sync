<?php
//	echo '<pre>';print_r($postdata);die;
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
                <h3 class="card-title">View Post List</h3>
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
                    <table class="table tablerec" id="table1">
                        <thead class="thead-inverse ui-state-default">
                            <tr>
                                
                                <th>Post Desc</th>
								<th>Post Image</th>
								<th>Facebok Status</th>
                                <th>Google+ Status</th>
                                <th>Twitter Status</th>
                                <th>Tumblr Status</th>
                                <th>Linkedin Status</th>
                                <th>Pinterest status</th>
                                <th>Sync Order</th>
								<th>Sync_Log</th>
                           </tr>
                        </thead>
                        <tbody  id="tbody1">
								<?php foreach($postdata as $row){?>
									
                                <tr class="ui-state-default" data-post-id="<?php echo $row['post_id'];?>">	
                                							
									<td style="max-width:100px; overflow:auto;"><?php echo $row['post_desc']; ?></td>
									<td><img src="<?php echo base_url();?>/assets/user/post_image/<?php echo $row['post_image']; ?>" width="50px" height="50px" /></td>
									<td><?php echo $row['fb_status']; ?></td>
                                    <td><?php echo $row['gp_status']; ?></td>
                                    <td><?php echo $row['tw_status']; ?></td>
                                    <td><?php echo $row['tm_status']; ?></td>
                                    <td><?php echo $row['li_status']; ?></td>
                                    
                                    <td><?php echo $row['pi_status']; ?></td>
                                    <td><?php echo $row['sync_order']; ?></td>
									<td style="font-size:18px;"><a href="<?php echo site_url('admin/Social_Post/sync_log_report/'.$row['job_id']) ?>">Report</a></td>
                            	</tr>
								<?php }?>							
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