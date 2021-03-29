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
                <h3 class="card-title">View User</h3>
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
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
								<th>Gender</th>
								<th>Country</th>
								<th>Status</th>
                                <th>Profile</th>
                            </tr>
                        </thead>
                        <tbody>
							<?php foreach($data as $row){ ?>
                            <tr>
                                <td><?php echo $row['id'];?></td>
                                <td><?php echo $row['name'];?></td>
                                <td style="max-width:125px; overflow:auto;"><?php echo $row['email'];?></td>
								<td><?php echo $row['gender'];?></td>
								<td><?php echo $row['country'];?></td>
								<td>
									<select id="status_box" name="status" onchange="change_fun(<?php echo $row['id'];?>,this.value)" >
										<option value="1" <?php if($row['status']==1){echo 'selected="selected"';} ?> >Active</option>
										<option value="0" <?php if($row['status']==0){echo 'selected="selected"';} ?> >Block</option>
									</select>
								</td>
                                <td><img src="<?php echo base_url();echo "/assets/user/image/".$row['image'];?>" width="75" height="75" /></td>
								<!--<td><a href="<?php echo site_url('admin/User/delete_user/'.$row['id']);?>" data-i18n="nav.invoice.invoice_template" class="menu-item"><i class="icon-cross"></i></a>&nbsp;&nbsp; | &nbsp;&nbsp;<a href="<?php //echo site_url('admin/User/update_user/'.$row['id']);?>" data-i18n="nav.invoice.invoice_template" class="menu-item"><i class="icon-plus2"></i></a></td>-->
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