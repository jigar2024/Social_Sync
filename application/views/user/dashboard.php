
<?php
	
	$this->load->view('user/header');
	//echo '<pre>';print_r($loginURL);die;

	
?>


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
                <h4>Connect A Social Accounts</h4>
				<p>Share to many different places with social sync and we make sure your posts look great everywhere.</p>
				<p>Click The 'Connect' Buttons Below To Begin Connecting Your Account To Social Sync.</p>
            </div>
            <div class="card-footer userdash_content_social">
					<ul class="social_ul">
						<li>
								<span><i class="fa fa-facebook" style="color:#fff; padding:15px; background-color:#3b5998; width:50%; border-radius:5px; margin:auto;"></i></span>
								<h4 style="color:#3b5998;">facebook</h4>
								
								<p><a href="<?php echo $oauthURL_facebook; ?>" style="background-color:#3b5998;">Connect</a></p>
						</li>
						<li>
								<span><i class="fa fa-twitter" style="color:#fff; padding:15px; background-color:#4099ff; width:50%; border-radius:5px; margin:auto;"></i></span>
								<h4 style="color:#4099ff;">twitter</h4>
								
								<p><a href="<?php echo $oauthURL; ?>" style="background-color:#4099ff;">Connect</a></p>
						</li>
						<li>
								<span><i class="fa fa-linkedin" style="color:#fff; padding:15px; background-color:#007bb6; width:50%; border-radius:5px; margin:auto;"></i></span>
								<h4 style="color:#007bb6;">linkedin</h4>
								
								<p><a href="<?php echo $oauthURL_linkedin; ?>" style="background-color:#007bb6;">Connect</a></p>
						</li>
						<li>
								<span><i class="fa fa-google-plus" style="color:#fff; padding:15px; background-color:#dd4b39; width:50%; border-radius:5px; margin:auto;"></i></span>
								<h4 style="color:#dd4b39;">google+</h4>
								
								<p><a href="<?php echo $loginURL; ?>" style="background-color:#dd4b39;">Connect</a></p>
						</li>
						<li>
								<span><i class="fa fa-tumblr" style="color:#fff; padding:15px; background-color:#2C4762; width:50%; border-radius:5px; margin:auto;"></i></span>
								<h4 style="color:#2C4762;">tumblr</h4>
								
								<p><a href="<?php echo $tm_url; ?>" style="background-color:#2C4762;">Connect</a></p>
						</li>
						<li>
								<span><i class="fa fa-pinterest" style="color:#fff; padding:15px; background-color:#dd081c; width:50%; border-radius:5px; margin:auto;"></i></span>
								<h4 style="color:#dd081c;">pinterest</h4>
								
								<p><a href="<?php echo $pin_url;?>" style="background-color:#dd081c;">Connect</a></p>
						</li>
					</ul>
            </div>
        </div>
		<div class="card">
			<div class="card-body userdash_content">
						<h4>Add Many Post in Social Accounts</h4>
						<p>Click The 'Add Post' Buttons Below To Add Post.But First Connect Above Social Accounts</p>
					</div>
            <div class="card-footer userdash_content_social">
					<ul class="social_ul">
						
						<li>							
								<p><a href="<?php echo site_url('user/Social_Post/add_post_page');?>">
										<!-- Button trigger modal -->
						<button type="button" class="btn btn-primary"  style="padding:10px 25px;">
						  Add Post
						</button>
					</a></p>
					
						
						<!-- Modal -->
						<div class="modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display:<?php if(@$modal=="true"){echo "block;";}else{echo "none;";} ?>">
						  <div class="modal-dialog" role="document">
							<div class="modal-content">
							  <div class="modal-header">
								<h1 class="modal-title" style="color:rgba(0,0,0,1);" id="exampleModalLabel">Alert For Add Account</h1>
							  </div>
							  <div class="modal-body">
							  	<h3> Please Add Account First</h3>
							  </div>
							  <div class="modal-footer">
								<a href="<?php echo site_url('user/Dashboard/index'); ?>" style="padding:10px 20px; background-color:#0000FF;color:#FFFFFF; border-radius:5px;">Ok</a>
							  </div>
							</div>
						  </div>
						</div>
						
						
						</li>
							
						
						
													
					</ul>
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