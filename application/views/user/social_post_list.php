<?php
//	echo '<pre>';print_r($postdata);die;
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
                    <table class="table tablerec">
                        <thead class="thead-inverse">
                            <tr>
                                
                                <th>Post Desc</th>
								<th>Post Image</th>
								<th>Facebook Status</th>
                                <th>Google+ Status</th>
                                <th>Twitter Status</th>
                                <th>Linkedin Status</th>
                                <th>Tumblr Status</th>
                                <th>Pinterest Status</th>
								<th>Sync Time</th>
                           </tr>
                        </thead>
                        <tbody>
								<tr>		
                                	<?php
									
									 foreach($check_for_social as $chk_social)
									  {?>		
									<td><?php  echo $postdata['post_desc']; ?></td>
									<td><img src="<?php echo base_url();?>/assets/user/post_image/<?php echo $postdata['post_image']; ?>" width="55px" height="55px" /></td>
									<td><?php if($chk_social['social_type']== 'facebook'){  if($postdata['fb_status']==0){echo "Pending";}elseif($postdata['fb_status']==1){echo "Successfull"; }else{echo "Error"; }} else { echo "---";}?></td>
                                    <td><?php if($chk_social['social_type']== 'google'){ if($postdata['gp_status']==0){echo "Pending";}elseif($postdata['gp_status']==1){echo "Successfull"; }else{echo "Error"; }}else { echo "---";} ?></td>
                                    <td><?php if($chk_social['social_type']== 'twitter'){ if($postdata['tw_status']==0){echo "Pending";}elseif($postdata['tw_status']==1){echo "Successfull"; }else{echo "Error"; }}else{echo "---";}?></td>
                                    <td><?php if($chk_social['social_type']== 'linkedin'){ if($postdata['li_status']==0){echo "Pending";}elseif($postdata['li_status']==1){echo "Successfull"; }else{echo "Error"; }}else{echo "---";}?></td>
                                    <td><?php if($chk_social['social_type']== 'tumblr'){ if($postdata['tm_status']==0){echo "Pending";}elseif($postdata['tm_status']==1){echo "Successfull"; }else{echo "Error"; }}else{echo "---";}?></td>
                                    <td><?php if($chk_social['social_type']== 'pinterest'){ if($postdata['pi_status']==0){echo "Pending";}elseif($postdata['pi_status']==1){echo "Successfull"; }else{echo "Error"; }}else{echo "---";}?></td>
									<td><?php echo $postdata['sync_time']; ?></td>
                            		<?php } ?>
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