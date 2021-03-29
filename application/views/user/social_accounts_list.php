<?php
	$this->load->view('user/header');
	//echo '<pre>';print_r($loginURL);die;
?>

<div class="app-content content container-fluid">
      <div class="content-wrapper">
        
        <div class="content-body"><!-- Basic Tables start -->
<!-- Table head options start -->
<div class="row">
    <div class="col-xs-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">View Accounts</h3>
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
                                <th>Username</th>
                                <th>Email</th>
                                <th>Url</th>
								<th>Social_Type</th>
								<th>Operation</th>
                            </tr>
                        </thead>
                        <tbody>
							<?php foreach($social_data as $row){ ?>
                            <tr>
                                <td><?php echo $row['username'];?></td>
                                <td><?php echo $row['email'];?></td>
                                <td><?php echo $row['url'];?></td>
								<td><?php echo $row['social_type'];?></td>
									
								<td><a href="<?php echo site_url('user/Dashboard/remove_account/'.$row['social_id']."/".$row['social_type']);?>" data-i18n="nav.invoice.invoice_template" class="menu-item"><i class="icon-cross"></i></a></td>
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