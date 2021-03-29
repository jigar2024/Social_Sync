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
	

</body>
</html>
