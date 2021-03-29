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

	<div class="content_feedback">
		
        
		<div class="main_feedback">
		
        <div style="width:100%; text-align:center; color:#FF0000;">
						<?php
							
							if(form_error('name'))
							 {
								echo form_error('name');
							 }
							else if(form_error('email'))
							 {
							 	echo form_error('email');
							 }
							else if(form_error('review'))
							 {
							 	echo form_error('review');
							 }
							 
						?>
						</div>
        
        	<form method="post">
                    <h5>Your Name</h5>
                    <input type="text" name="name" value="<?php echo @$name; ?>">
                    <h5>Email</h5>
                    <input type="text"  name="email" value="<?php echo @$email; ?>" >
                <h5>Your Review <span>( Tips and Guidelines ) </span> </h5>	
                    <textarea onFocus="this.value = '';" value="<?php echo @$review; ?>"name="review"></textarea>
                
            
            
            <h5>Want to rate with us for customer services?</h5>
                <span class="starRating">
                    <input id="rating5" type="radio" name="rating" value="5">
                    <label for="rating5">5</label>
                    <input id="rating4" type="radio" name="rating" value="4">
                    <label for="rating4">4</label>
                    <input id="rating3" type="radio" name="rating" value="3" >
                    <label for="rating3">3</label>
                    <input id="rating2" type="radio" name="rating" value="2" checked>
                    <label for="rating2">2</label>
                    <input id="rating1" type="radio" name="rating" value="1">
                    <label for="rating1">1</label>
                </span>
                
                <h5>Is there anything you would like to tell us?</h5>	
                    <textarea onFocus="this.value = '';"  name="faq"></textarea>
                    <input type="submit" name="submit" value="Send Feedback"/>
		</form>	
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
