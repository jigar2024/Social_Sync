
<script src="<?php echo site_url('../assets/admin/assets/js/jquery-3.2.1.min.js'); ?>"></script>
<script>
	//$(document).ready(function(){
		
		
		function change_fun(id,status)
		{
			//var status=$('#status_box').val();
			//alert(status);
			window.location="<?php echo site_url('admin/User/update_user/');?>"+id+"/"+status;
		}
		
	//});
</script>

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
                <h3 class="card-title">View Social Accounts</h3>
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
                    <table class="table tablerec" width="100%">
                        <thead class="thead-inverse">
                            <tr>
                                <th>Name</th>
                                <th>Username</th>
								<th>Email</th>
								<th>Url</th>
								<th>Social_Type</th>
                                <th>Image</th>
                                
                                <th>Operation</th>
                            </tr>
                        </thead>
                        <tbody>
							<?php foreach($soc_data as $row){ ?>
                            <tr>
                                <td ><?php echo $row['name'];?></td>
                                <td style="max-width:125px; overflow:auto;"><?php echo $row['username'];?></td>
                                <td style="max-width:125px; overflow:auto;"><?php echo $row['email'];?></td>
								<td style="max-width:125px; overflow:auto;"><?php echo $row['url'];?></td>
                                <td><?php echo $row['social_type'];?></td>
                               
                                <td><img src="<?php echo $row['image'];?>" width="50" height="50" /></td>
                                
                                
								<td style="text-align:center;"><a href="<?php echo site_url('admin/Social_Post/delete_social_account/'.$row['account_id']);?>" data-i18n="nav.invoice.invoice_template" class="menu-item"><i class="icon-cross"></i></a></td>
                            </tr>
							<?php }?>
					</tbody>
                    <tr>
							<td colspan="10" >
								 <center>
								 	<div class="pagination">
										<?php echo $this->pagination->create_links(); ?>
									</div>
								</center>
							</td>
					</tr>
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