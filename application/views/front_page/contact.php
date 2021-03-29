<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title> Social Sync </title>

<link href="<?php echo base_url();?>assets/front_page/css/owl.carousel.min.css" rel="stylesheet" type="text/css" />
<link  href="<?php echo base_url();?>assets/front_page/css/owl.theme.default.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>assets/front_page/css/animate.css" rel="stylesheet" type="text/css" />



<link href="<?php echo base_url();?>assets/front_page/css/bootstrap.min.css" type="text/css" rel="stylesheet" />
<link href="<?php echo base_url();?>assets/front_page/css/style.css" type="text/css" rel="stylesheet" />
<link href="<?php echo base_url();?>assets/front_page/css/font-awesome.min.css" type="text/css" rel="stylesheet" />


<script src="<?php echo base_url();?>assets/front_page/js/jquery-3.2.1.min.js"></script>
<script src="<?php echo base_url();?>assets/front_page/js/owl.carousel.min.js"  type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/front_page/js/popper.min.js"></script>
<script src="<?php echo base_url();?>assets/front_page/js/bootstrap.min.js"></script>

<script>

	$(document).ready(function(e){
	
		$('.main_menu_mb').hide();
		
		$('.menu_icon i').click(function(){

			$('.main_menu_mb').slideToggle(300);
			$('.open_icon').toggleClass('fa fa-times');
			$('.open_icon').toggleClass('fa fa-bars');
		});
		
		
		$('.slider1').owlCarousel({	
				animateOut: 'zoomOutLeft',
				animateIn: 'flipInY',
				autoplay:true,
				loop:true,
				autoplayTimeout:5000,
				items:1,
				margin:30,
				stagePadding:30,
				smartSpeed:450
	    });
		
	})
	
	
	
</script>



</head>

<body>
 
 <header>
	<div class="header_div">
	
		<div class="logodiv">
			<img src="<?php echo base_url();?>assets/front_page/image/logo1.png" height="100%" width="100%" align="center;" />
 	
		</div> 
		
		<div class="menudiv">
			<div class="inner_menu_div">
				<ul class="mainmenu">
					<li><a href="<?php echo site_url('Front_page/index');?>">Home</a></li>
					<li><a href="<?php echo site_url('Front_page/pricing');?>">Pricing</a></li>
					<li><a href="<?php echo site_url('Front_page/about');?>">About</a></li>
					<li><a href="<?php echo site_url('Front_page/contact');?>">Contact</a></li>
					<li><a href="<?php echo site_url('Front_page/feedback');?>">Feedback</a></li>
				</ul>
				
			</div>
					
			<div class="log_btn_div"> 
				<ul class="sec_mainmenu">
					<li><a href="<?php echo site_url('user/Login/index'); ?>" class="btn_action" style="padding:7px 30px;">Login</a></li>
				</ul>
			</div>	
		</div>
	</div>
	<div class="menu_icon">
		<i class="fa fa-bars open_icon" ></i>
		<i class="fa fa-times open_icon" style="display:none;" ></i>
	</div>
	
	<ul class="main_menu_mb">
		<li><a href="<?php echo site_url('Front_page/index');?>">Home</a></li>
		<li><a href="<?php echo site_url('Front_page/pricing');?>">Pricing</a></li>
		<li><a href="<?php echo site_url('Front_page/about');?>">About</a></li>
		<li><a href="<?php echo site_url('Front_page/contact');?>">Contact</a></li>
		<li><a href="<?php echo site_url('Front_page/feedback');?>">Feedback</a></li>
	</ul>
</header>

		<div class="container-contact100">
			<div class="wrap-contact100">
            
            <div style="width:100%; text-align:center; color:#FF0000;">
                <?php
                    
                    if(form_error('first_name'))
                     {
                        echo form_error('first_name');
                     }
					 else if(form_error('last_name'))
                     {
                        echo form_error('last_name');
                     }
                    else if(form_error('email'))
                     {
                        echo form_error('email');
                     }
                    else if(form_error('message'))
                     {
                        echo form_error('message');
                     }
                     
                ?>
                </div>
            
				<form method="post" class="contact100-form validate-form">
					<span class="contact100-form-title">	
						Send Us A Message
					</span>
					<label class="label-input100" for="first-name">Enter your name *</label>
				<div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate="Type first name">
					<input id="first-name" class="input100" type="text" name="first_name" placeholder="First name"  value="<?php echo @$first_name; ?>">
					<span class="focus-input100"></span>
				</div>
				<div class="wrap-input100 rs2-wrap-input100 validate-input" data-validate="Type last name">
					<input class="input100" type="text" name="last_name" placeholder="Last name"  value="<?php echo @$last_name; ?>">
					<span class="focus-input100"></span>
				</div>

				<label class="label-input100" for="email">Enter your email *</label>
				<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
					<input id="email" class="input100" type="text" name="email" placeholder="Eg. example@email.com"  value="<?php echo @$email; ?>">
					<span class="focus-input100"></span>
				</div>

				
				<label class="label-input100" for="message">Message *</label>
				<div class="wrap-input100 validate-input" data-validate = "Message is required">
					<textarea id="message" class="input100" name="message" placeholder="Write us a message"  value="<?php echo @$message; ?>"></textarea>
					<span class="focus-input100"></span>
				</div>

				<div class="container-contact100-form-btn">
					<input type="submit" name="submit" class="contact100-form-btn" value="Send Message">
						
					
				</div>
				</form>
				
				<div class="contact100-more flex-col-c-m" style="background-image:url(<?php echo base_url();?>assets/front_page/image/bg-01.jpg);">
				<div class="flex-w size1 p-b-47">
					<div class="txt1 p-r-25">
						<span class="lnr lnr-map-marker"></span>
					</div>

					<div class="flex-col size2">
						<span class="txt1 p-b-20">
							Address
						</span>

						<span class="txt2">
							Turning Point 3th floor, 379 Hudson St, Amroli, Surat
						</span>
					</div>
				</div>

				<div class="dis-flex size1 p-b-47">
					<div class="txt1 p-r-25">
						<span class="lnr lnr-phone-handset"></span>
					</div>

					<div class="flex-col size2">
						<span class="txt1 p-b-20">
							Lets Talk
						</span>

						<span class="txt3">
							+91 7878965845
						</span>
					</div>
				</div>

				<div class="dis-flex size1 p-b-47">
					<div class="txt1 p-r-25">
						<span class="lnr lnr-envelope"></span>
					</div>

					<div class="flex-col size2">
						<span class="txt1 p-b-20">
							General Support
						</span>

						<span class="txt3">
							Socialsync@gmail.com
						</span>
					</div>
				</div>
			</div>
			</div>
		</div>
		
	<div class="footer">
	<div class="footer_container">
		<div class="footer_column">
			<h5>Social Sync</h5>
			<p><a href="<?php echo site_url('Front_page/about');?>">About Us</a></p>
			<p><a href="<?php echo site_url('Front_page/contact');?>">Our Team</a></p>
			<p><a href="<?php echo site_url('Front_page/feedback');?>">Feedback</a></p>
			<p><a href="#">Press</a></p>
		</div>
		<div class="footer_column">
           <h5>Help & Support</h5>
           <p><a href="#">FAQ</a></p>
           <p><a href="#">Guides & Tutorials</a></p>
           <p><a href="#">Webinars</a></p>
           <p><a href="#">Tweet @ Us</a></p>
        </div>
		<div class="footer_column">
           <h5>Be Awesome</h5>
           <p><a href="#">The Awesome Plan</a></p>
           <p><a href="#">Social Sync for Business</a></p>
           <p><a href="#">Social Sync for Nonprofits</a></p>
           <p><a href="#">Pricing Page</a></p>
        </div>
		<div class="footer_column tab_view1">
           <h5>Social Sync-to-Go</h5>
           <p><a href="#">iPhone & iPad App</a></p>
           <p><a href="#">Android App</a></p>
           <p><a href="#">Browser Extension</a></p>
           <p><a href="#">Apps & Extras</a></p>
        </div>
		<div class="footer_column tab_view2">
          	<h5>Culture</h5>
          	<p><a href="#">Social Media Blog</a></p>
            <p><a href="#">Culture Blog</a></p>
            <p><a href="#">Engineering Blog</a></p>
            <p><a href="#">Transparency</a></p>
        </div>
		<div style="clear:both;"></div>
	</div>
	<div class="footer_copyright">
			<p>Copyright @2017 Social Sync : <a href="#">Privacy </a> : <a href="#">Terms</a> : <a href="#">Security</a></p>
	</div>
</div>	
	
</body>
</html>
