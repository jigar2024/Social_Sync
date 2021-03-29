<script src="<?php echo site_url('../assets/admin/assets/js/jquery-3.2.1.min.js'); ?>"></script>

<script>


$(document).ready(function(e){
	$('#timesheetinput1').change(function(){
		
		id=$('#timesheetinput1').val();
		
		if(id=="")
		 {
		 	$.ajax({
			
			type:'POST',
			url:'<?php echo site_url('admin/State/re_view_state');?>',
			data:{},
			success:function(data)
				{
					$('#rectbl').html(data);
				}
			
			
			});
		 }
		
		$.ajax({
			
			type:'POST',
			url:'<?php echo site_url('admin/State/get_country');?>',
			data:
			 	{
					'id':id
				},
			success:function(data)
				{
					$('#rectbl').html(data);
				}
			
			
		});
		
	});


});


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
                <h3 class="card-title">
				<form method="post">
					View State
					<select name="country_code" id="timesheetinput1" style="padding-right:40px;margin-left:25px;">	
 							<option value="">Select Country</option>
							   <?php foreach($country_data as $cc){?>	
												
									<option value="<?php echo $cc['country_code'];?>"><?php echo $cc['country_name']; ?></option>
					
							   <?php } ?>
					</select>
				</form>
				</h3>
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
                    <table class="table tablerec" id="rectbl" >
                        <thead class="thead-inverse">
                            <tr>
								<th>State_Id</th>
                                <th>Country_Name</th>
                                <th>State_Name</th>
								<th>Operation</th>
                            </tr>
                        </thead>
                        <tbody>
							<?php foreach($data as $row){ ?>
                            <tr>
								<td><?php echo $row['state_id'];?></td>
                                <td><?php echo $row['country_name'];?></td>
                                <td><?php echo $row['state_name'];?></td>
								<td><a href="<?php echo site_url('admin/State/delete_state/'.$row['state_id']);?>" data-i18n="nav.invoice.invoice_template" class="menu-item"><i class="icon-cross"></i></a> &nbsp;&nbsp; | &nbsp;&nbsp; <a href="<?php echo site_url('admin/State/update_state/'.$row['state_id']);?>" data-i18n="nav.invoice.invoice_template" class="menu-item"><i class="icon-plus2"></i></a></td>
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