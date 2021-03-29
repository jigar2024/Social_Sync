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
					<li><a href="#">Pricing</a></li>
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
        <li><a href="#">Pricing</a></li>
        <li><a href="<?php echo site_url('Front_page/about');?>">About</a></li>
        <li><a href="<?php echo site_url('Front_page/contact');?>">Contact</a></li>
        <li><a href="<?php echo site_url('Front_page/feedback');?>">Feedback</a></li>
	</ul>	
</header>



<div class="owl-carousel owl-theme owl-loaded slider1">
    <div class="item img1">
		<img src="<?php echo base_url();?>assets/front_page/image/fb.jpg"  />
	</div>
	<div class="item img1">
		<img src="<?php echo base_url();?>assets/front_page/image/linkdin.jpg"  />
	</div>
	<div class="item img1">
		<img src="<?php echo base_url();?>assets/front_page/image/pinterest.png"  />
	</div>
	<div class="item img1">
		<img src="<?php echo base_url();?>assets/front_page/image/twitter.png"  />
	</div>
	<div class="item img1">
		<img src="<?php echo base_url();?>assets/front_page/image/tumblr.png"  />
	</div>
	<div class="item img1">
		<img src="<?php echo base_url();?>assets/front_page/image/googleplus1.jpeg"  />
	</div>
</div>




<div class="content">	
	<div class="social_msg">
		<h1>Save Time Managing Your Social Media</h1>
		<p>Social sync is simpler and easier way to schedule posts , track the perfomance of <br /> your content and manage all your accounts in one place</p>
		<a href="<?php echo site_url('user/User/add_user'); ?>">Sign up for free</a>

	</div>
</div>

<div class="customer_logo">
	<p>We're delighted to support 4,000,000+ marketers in their social media success</p>
	<ul>
		<li><img src="<?php echo base_url();?>assets/front_page/image/1.jpg" /></li>
		<li><img src="<?php echo base_url();?>assets/front_page/image/2.jpg" /></li>
		<li><img src="<?php echo base_url();?>assets/front_page/image/3.jpg" /></li>
		<li><img src="<?php echo base_url();?>assets/front_page/image/4.jpg" /></li>
		<li><img src="<?php echo base_url();?>assets/front_page/image/5.jpg" /></li>
	</ul>
	
</div>

<div class="home_page">
	<div class="container">
		<div class="messeging">
			<h2>Schedule your social media posts for later</h2>
			<p>Quickly and easily schedule posts for all of your social accounts and Buffer will publish them automatically, according to the posting schedule you put in place.</p>
			<p>
				<a href="<?php echo site_url('user/Login/index'); ?>">Schedule your first post now <span> <i class="fa fa-angle-right"></i></span></a>
			</p>
			<div class="social_icon">
				<ul>
					<li><span><i class="fa fa-facebook"></i></span></li>
					<li><span><i class="fa fa-linkedin"></i></span></li>
					<li><span><i class="fa fa-twitter"></i></span></li>
					<li><span><i class="fa fa-pinterest"></i></span></li>
					<li><span><i class="fa fa-google-plus"></i></span></li>
				</ul>
			</div>
			<div class="video_div">
				<video width="60%" height="40%" muted controls >
					<source src="<?php echo base_url();?>assets/front_page/image/social1.webm" type="video/webm">
					<source src="<?php echo base_url();?>assets/front_page/image/social.mp4" type="video/mp4">
				</video>
				
			</div>
		</div>
	</div>
</div>


<div class="homepage_feature">
	<div>
		<h2>Manage all your social accounts <br /> from one simple dashboard</h2>
		<p>Fully manage all of your social media accounts in one place. No more wasting<br /> time, no more logging into multiple social accounts.</p>
		<p>
			<a href="<?php echo site_url('user/Login/index'); ?>">Schedule your first post now <span> <i class="fa fa-angle-right"></i></span></a>
		</p>
	</div>
	
	<div class="feature_data row no-gutters">
		<div class="feature1 col-lg-4 col-md-12 col-sm-12 col-xl-4 col-12">	
			<img src="<?php echo base_url(); ?>assets/front_page/image/feature1.png"  />
			<h4>Set your posting schedule</h4>
			<p>Choose the dates and times you want to<br /> publish to each account. Just set this once<br /> and you're good to go!</p>
		</div>
		<div class="feature2 col-lg-4 col-md-12 col-sm-12 col-xl-4 col-12">
			<img src="<?php echo base_url(); ?>assets/front_page/image/feature2.png"  />
			<h4>Add posts to your Buffer queue</h4>
			<p>Create social media posts when you have<br /> time, and Buffer will automatically share<br /> them according to your schedule.</p>
		</div>
		<div class="feature3 col-lg-4 col-md-12 col-sm-12 col-xl-4  col-12">
			<img src="<?php echo base_url(); ?>assets/front_page/image/feature3.png"  />
			<h4>Build your following</h4>
			<p>Buffer makes it easy to maintain a<br /> consistent presence on social, so you can<br /> build your following and influence.</p>
		</div>
	</div>
</div>



<div class="homepage_callout">
	<div class="home_container">
	
		<div class="homepage_messaging">
				<h3><i class="fa fa-facebook-f"></i> Social Sync For Facebook</h3>
				<p>The easiest way to plan, track, and amplify your Facebook marketing.</p>
				<p>Create beautiful Facbook content on desktop or mobile and schedule reminders to post your photos at the ideal time.</p>
				<p>
					<a href="<?php echo site_url('user/Login/index'); ?>">Try Social Sync For Facebook <span> > </span></a>
				</p>
		</div>
		<div class="homepage_social">
			<img src="<?php echo base_url(); ?>assets/front_page/image/fb_messaging.png" />
		</div>
	
	
	</div>
</div>


<div class="homepage_mobile">
	
	<div class="homepage_container">
		<div class="homepage_heading">
			<h2>Schedule content as you discover it</h2>
			<p>Whether you're browsing the web or on the go, you can easily add content to your queue with our browser extensions and mobile apps. Save time and get more done by working from anywhere.</p>
		</div>
		<div class="homepage_mobile_content">
			<div class="home_mobile_img">
				<img src="<?php echo base_url(); ?>assets/front_page/image/mobile-discovery.png" />
			</div>
			<div class="home_mobile_link" >
				
				<ul>
					<li>
						<div class="inner_content">
							<span><i class="fa fa-bars"></i> <a href="#">Install the browser extension ></a></span>
						</div>
					</li>
					<li>
						<div class="inner_content">
							<span><i class="fa fa-android"></i> <a href="#">Get Social Sync for Android ></a></span>
						</div>
					</li>
					<li>
						<div class="inner_content">
							<span><i class="fa fa-apple"></i><a href="#">Get Social Sync for iOS ></a></span>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>
<div style="clear:both;"></div>
<div class="container_main_analyze">
	<div class="analyze_container">

		<h2>Analyze the performance of your posts</h2>
		<p>Track engagement and interactions on the posts you've shared, so you can see how your content is performing across all your social accounts.</p>
		<p class="blue-link"><a href="<?php echo site_url('user/Login/index'); ?>">Start analyzing your posts now <span> > </span></a></p>
	
		<div class="analyze_vedio">
			<video width="100%" height="100%" muted controls >
				<source src="<?php echo base_url();?>assets/front_page/image/analytics.webm" type="video/webm">
				<source src="<?php echo base_url();?>assets/front_page/image/analytics.mp4" type="video/mp4">
			</video>
		</div>
		<h2 class="analytics_overview_h2">Get a complete overview of how you're trending on social</h2>
		<p>With streamlined analytics, Social Sync makes it easy to be a data whiz and quickly determine which types of content perform best with your audience.</p>
		<p class="blue-link"><a href="<?php echo site_url('user/Login/index'); ?>">Start analyzing your posts now <span> > </span></a></p>
		<div class="analyze_feature row no-gutters">
			<div class="feature_div">
				<div class="back_img" style="background-image:url(<?php echo base_url();?>assets/front_page/image/analyze1.png);"></div>
				<h4>Track key engagement metrics</h4>
				<p>Easily dig into key metrics such as Clicks, Likes, Reach, Shares, Comments, Retweets, Mentions, and more. </p>
			</div>
			<div class="feature_div" style="float:none;">
				<div class="back_img" style="background-image:url(<?php echo base_url();?>assets/front_page/image/analyze2.png);"></div>
				<h4>See your best posts at a glance</h4>
				<p>Instantly see which posts are performing best, so you can do more of what works and continually increase engagement.</p>
			</div>
			<div class="feature_div" style="float:right;">
				<div class="back_img" style="background-image:url(<?php echo base_url();?>assets/front_page/image/analyze3.png);"></div>
				<h4>Reporting made easy</h4>
				<p>Get the data you need to see how your content is performing, and export all your social media reports in a snap.</p>
			</div>
		</div>
	</div>
</div>

<div class="key_feature">
		 <h2>Even more great features</h2>
		 <p>Here are even more ways Social Sync can help you supercharge your social media efforts.</p>
		 <div class="clearfix">
		 	<div class="left_feature">
				<div class="left_sub_feature" style="background-image:url(<?php echo base_url();?>assets/front_page/image/left_feature1.png);" >
					<h4>Browser Extension</h4>
					<p>Save something to share for later, no matter when or where you find it</p>
				</div>
				
				<div class="left_sub_feature" style="background-image:url(<?php echo base_url();?>assets/front_page/image/left_feature2.png);" >
					<h4>RSS Feed</h4>
					<p>Publish content from your favorite sites, with one click of a button</p>
				</div>
				
				<div class="left_sub_feature" style="background-image:url(<?php echo base_url();?>assets/front_page/image/left_feature3.png);" >
					<h4>Social Analytics</h4>
					<p>Get the data you need to keep getting better and better on social media</p>
				</div>
				
				<div class="left_sub_feature" style="background-image:url(<?php echo base_url();?>assets/front_page/image/left_feature4.png);" >
					<h4>Pablo Image Creator</h4>
					<p>Create beautiful images easily to make your posts pop</p>
				</div>
				
			</div>
			<div class="right_feature">
				<div class="right_sub_feature" style="background-image:url(<?php echo base_url();?>assets/front_page/image/right_feature1.png);" >
					<h4>Mobile Apps</h4>
					<p>Save time and get more done by working from anywhere with our apps for iOS and Android</p>
				</div>
				
				<div class="right_sub_feature" style="background-image:url(<?php echo base_url();?>assets/front_page/image/right_feature2.png);" >
					<h4>Social Media Calendar</h4>
					<p>Organize how and when your content gets shared with ease</p>
				</div>
				
				<div class="right_sub_feature" style="background-image:url(<?php echo base_url();?>assets/front_page/image/right_feature3.png);" >
					<h4>Video & GIF Uploader</h4>
					<p>Add richer content to your posts through our fast video and GIF uploader</p>
				</div>
			</div>
		 </div>
</div>

<div class="customer_support">
	<div class="customer_support_container">
		<h2>World Class Customer Support</h2>
		<p>We have a worldwide team of customer advocates on standby to support you so that all your questions get an answer, fast.</p>
		
		<div class="world_map_div">
			<img src="<?php echo base_url();?>assets/front_page/image/customer-support-map.png" height="95%" width="100%" alt="World Map" />
		</div>
	</div>
</div>

<div class="pricing">
	<div class="pricing_container">
		<div class="pricing_heading">
			<h2>Find the plan that's right for you</h2>
			<p>Get started for free. No credit card required! All prices are all-inclusive as opposed to a "per team member" cost.</p>
		</div>
		<div class="pricing_details">
			<div class="pricing_div">
				<h4>Individual</h4>
				<p>3 Social Profiles</p>
				<p>10 Scheduled Posts per Profile</p>
				<p><br /></p>
				<h5>Free</h5>
			</div>
			<div class="pricing_div">
				<h4>Awesome</h4>
				<p>10 Social Profiles</p>
				<p>100 Scheduled Posts per Profile</p>
				<p><br /></p>
				<h5>$10<span>per month</span></h5>
			</div>
			<div class="pricing_div">
				<h4>Business</h4>
				<p>25+ Social Profiles</p>
				<p>2,000 Scheduled Posts per Profile</p>
				<p>5+ Additional Team Members</p>
				<h5>$99+<span>per month</span></h5>
			</div>
		</div>
		<div class="text_center">
			<a href="#">See plans and pricing</a>
		</div>
		<p class="pricing_extra">Want to see the full details for each plan? <a href="#">Check out our plans and pricing.</a></p>
	</div>
</div>

<div class="footer" >
	<div class="footer_container">
		<div class="footer_column">
			<h5>Buffer</h5>
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
           <p><a href="#">Buffer for Business</a></p>
           <p><a href="#">Buffer for Nonprofits</a></p>
           <p><a href="#">Pricing Page</a></p>
        </div>
		<div class="footer_column tab_view1">
           <h5>Buffer-to-Go</h5>
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
			<p>Copyright @2018 Social Sync : <a href="#">Privacy </a> : <a href="#">Terms</a> : <a href="#">Security</a></p>
	</div>
</div>

</body>
</html>
