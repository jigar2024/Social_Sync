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
	
	
	
	  
	<section class="about" id="about">
    <div class="container text-center">
      <h3 class="heading">
          About Us
      </h3>

      <p class="paragraph">
       We pull in data from facebook,google+,twitter,linkedin,tumbler and pinterest and feeds to keep you up to date with what you are influencers are posting.
      </p>
		<div class="row about-cols">

          <div class="col-md-4 wow fadeInUp">
            <div class="about-col">
              <div class="img">
                <img src="<?php echo base_url();?>assets/front_page/image/7.jpg" alt="" class="img-fluid">
                <div class="icon"><i class="ion-ios-speedometer-outline"></i></div>
              </div>
              <h2 class="title"><a href="#">Our Mission</a></h2>
              <p>
                When Brand Networks pioneered social advertising in 2018 with our Social Sync technology, our mission was to help digital advertisers deliver integrated, real-time, multi-touch campaigns combining the first and second screens. Today, that goal remains the same, and with our partnership with TVTY, our commitment becomes even stronger.

              </p>
            </div>
          </div>

          <div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
            <div class="about-col">
              <div class="img">
                <img src="<?php echo base_url();?>assets/front_page/image/8.jpg" alt="" class="img-fluid">
                <div class="icon"><i class="fa fa-list"></i></div>
              </div>
              <h2 class="title"><a href="#">Our Plan</a></h2>
              <p>
                We bring you original and comprehensive articles, expert interviews, original research, and the news you need to improve your social sync marketing.Our large events and training opportunities provide you access to the industry top experts so you can remain on the leading edge of social sync.

              </p>
            </div>
          </div>

          <div class="col-md-4 wow fadeInUp" data-wow-delay="0.2s">
            <div class="about-col">
              <div class="img">
                <img src="<?php echo base_url();?>assets/front_page/image/9.jpg" alt="" class="img-fluid">
                <div class="icon"><i class="fa fa-eye"></i></div>
              </div>
              <h2 class="title"><a href="#">Our Vision</a></h2>
              <p>
                Basically, how do you want to use social sync  to promote your business? It also should outline your business's strengths and weaknesses when it comes to social sync. How are your accounts already successful? Which areas could use improving? Keep your vision short, simple, and succinct.
 </p>
            </div>
          </div>
		  </section>
        </div>
		<section id="services">
      <div class="container">

        
          <h3 class="heading">Services</h3>
          <p class="paragraph">Laudem latine persequeris id sed, ex fabulas delectus quo. No vel partiendo abhorreant vituperatoribus, ad pro quaestio laboramus. Ei ubique vivendum pro. At ius nisl accusam lorenta zanos paradigno tridexa panatarel.</p>
       

        <div class="row">

          <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-duration="1.4s">
            <div class="icon"><i class=""></i></div>
            <h4 class="title"><a href="">Facebook</a></h4>
            <p class="description">Facebook pages are far more detailed than Twitter accounts. They allow a product to provide videos, photos, and longer descriptions, and testimonials as other followers can comment on the product pages for others to see. Facebook can link back to the product's Twitter page as well as send out event reminders. As of May 2015, 93% of businesses marketers use Facebook to promote their brand. A study from 2011 attributed 84% of "engagement" or clicks to Likes that link back to Facebook advertising.</p>
          </div>
          <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-duration="1.4s">
            <div class="icon"><i class="ion-ios-bookmarks-outline"></i></div>
            <h4 class="title"><a href="">Google+</a></h4>
            <p class="description">Google+, in addition to providing pages and some features of Facebook, is also able to integrate with the Google search engine. Other Google products are also integrated, such as Google Adwords and Google Maps. With the development of Google Personalized Search and other location-based search services, Google+ allows for targeted advertising methods, navigation services, and other forms of location-based marketing and promotion.</p>
          </div>
          <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-duration="1.4s">
            <div class="icon"><i class="ion-ios-paper-outline"></i></div>
            <h4 class="title"><a href="">Twitter</a></h4>
            <p class="description">Twitter allows companies to promote their products in short messages known as tweets limited to 140 characters which appear on followers' Home timelines. Tweets can contain text, Hashtag, photo, video, Animated GIF, Emoji, or links to the product's website and other social media profiles, etc. Twitter is also used by companies to provide customer service. Some companies make support available 24/7 and answer promptly, thus improving brand loyalty and appreciation.</p>
          </div>
          <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-delay="0.1s" data-wow-duration="1.4s">
            <div class="icon"><i class=""></i></div>
            <h4 class="title"><a href=""> LinkedIn</a></h4>
            <p class="description">LinkedIn, a professional business-related networking site, allows companies to create professional profiles for themselves as well as their business to network and meet others. Through the use of widgets, members can promote their various social networking activities, such as Twitter stream or blog entries of their product pages, onto their LinkedIn profile page. LinkedIn provides its members the opportunity to generate sales leads and business partners.</p>
          </div>
          <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-delay="0.1s" data-wow-duration="1.4s">
            <div class="icon"><i class="ion-ios-barcode-outline"></i></div>
            <h4 class="title"><a href="">Pinterest</a></h4>
            <p class="description">Pinterest is a free website that requires registration to use. Users can upload, save, sort, and manage images known as pins and other media content (e.g., videos) through collections known as pinboards.Content can also be found outside of Pinterest and similarly uploaded to a board via the "Pin It" button, which can be downloaded to the bookmark bar on a web browser or be implemented by a webmaster directly on the website.</p>
          </div>
          <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-delay="0.1s" data-wow-duration="1.4s">
            <div class="icon"><i class="ion-ios-people-outline"></i></div>
            <h4 class="title"><a href="">Tumbler</a></h4>
            <p class="description">Blogging website Tumblr first launched ad products on May 29, 2012. Rather than relying on simple banner ads, Tumblr requires advertisers to create a Tumblr blog so the content of those blogs can be featured on the site. In one year, four native ad formats were created on web and mobile, and had more than 100 brands advertising on Tumblr with 500 cumulative sponsored posts.</p>
          </div>

        </div>

      </div>
    </section>
		
		<section id="portfolio"  class="section-bg" >
      <div class="container">

       
          <h3 class="heading">Our Portfolio</h3>
        

        <div class="row">
          <div class="col-lg-12">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
             
            </ul>
          </div>
        </div>

        <div class="row portfolio-container">

          <div class="col-lg-4 col-md-6 portfolio-item filter-app wow fadeInUp">
            <div class="portfolio-wrap">
              <figure>
                <img src="<?php echo base_url();?>assets/front_page/image/portfolio/facebook-sync.jpg" class="img-fluid" alt="">
                <a href="<?php echo base_url();?>assets/front_page/image/portfolio/facebook-sync.jpg" data-lightbox="portfolio" data-title="App 1" class="link-preview" title="Preview"><i class="fa fa-eye"></i></a>
                             </figure>

              <div class="portfolio-info">
                <h4><a href="#">Facebook</a></h4>
                <p>Facebook</p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web wow fadeInUp" data-wow-delay="0.1s">
            <div class="portfolio-wrap">
              <figure>
                <img src="<?php echo base_url();?>assets/front_page/image/portfolio/google-plus-pixel.jpg" class="img-fluid" alt="">
                <a href="<?php echo base_url();?>assets/front_page/image/portfolio/google-plus-pixel.jpg" class="link-preview" data-lightbox="portfolio" data-title="Web 3" title="Preview"><i class="fa fa-eye"></i></a>
                            </figure>

              <div class="portfolio-info">
                <h4><a href="#">Google+</a></h4>
                <p>Google+</p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app wow fadeInUp" data-wow-delay="0.2s">
            <div class="portfolio-wrap">
              <figure>
                <img src="<?php echo base_url();?>assets/front_page/image/portfolio/vontweetinhandWEB-720x480.jpg" class="img-fluid" alt="">
                <a href="<?php echo base_url();?>assets/front_page/image/portfolio/vontweetinhandWEB-720x480.jpg" class="link-preview" data-lightbox="portfolio" data-title="App 2" title="Preview"><i class="fa fa-eye"></i></a>
                              </figure>

              <div class="portfolio-info">
                <h4><a href="#">Twitter</a></h4>
                <p>Twitter</p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card wow fadeInUp">
            <div class="portfolio-wrap">
              <figure>
                <img src="<?php echo base_url();?>assets/front_page/image/portfolio/larger-15-LinkedIn-app-Android-1.jpg" class="img-fluid" alt="">
                <a href="<?php echo base_url();?>assets/front_page/image/portfolio/larger-15-LinkedIn-app-Android-1.jpg" class="link-preview" data-lightbox="portfolio" data-title="Card 2" title="Preview"><i class="fa fa-eye"></i></a>
                            </figure>

              <div class="portfolio-info">
                <h4><a href="#">LinkedIn</a></h4>
                <p>LinkedIn</p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web wow fadeInUp" data-wow-delay="0.1s">
            <div class="portfolio-wrap">
              <figure>
                <img src="<?php echo base_url();?>assets/front_page/image/portfolio/web-buy-it-portal-tile2x.jpg" class="img-fluid" alt="">
                <a href="<?php echo base_url();?>assets/front_page/image/portfolio/web-buy-it-portal-tile2x.jpg" class="link-preview" data-lightbox="portfolio" data-title="Web 2" title="Preview"><i class="fa fa-eye"></i></a>
                              </figure>

              <div class="portfolio-info">
                <h4><a href="#">Pinterest</a></h4>
                <p>Pinterest</p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app wow fadeInUp" data-wow-delay="0.2s">
            <div class="portfolio-wrap">
              <figure>
                <img src="<?php echo base_url();?>assets/front_page/image/portfolio/Tumblr.jpg" class="img-fluid" alt="">
                <a href="<?php echo base_url();?>assets/front_page/image/portfolio/Tumblr.jpg" class="link-preview" data-lightbox="portfolio" data-title="App 3" title="Preview"><i class="fa fa-eye"></i></a>
                            </figure>

              <div class="portfolio-info">
                <h4><a href="#">Tumbler</a></h4>
                <p>Tumbler</p>
              </div>
            </div>
          </div>


        </div>

      </div>
    </section>
	<section id="team">
      <div class="container">
        <div class="section-header wow fadeInUp">
          <h3 class="heading">Team</h3>
          <p class="paragraph">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
        </div>

        <div class="row">

          <div class="col-lg-3 col-md-6 wow fadeInUp">
            <div class="member">
              <img src="<?php echo base_url();?>assets/front_page/image/team-1.jpg" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Walter White</h4>
                  <span>Chief Executive Officer</span>
                  <div class="social">
                    <a href=""><i class="fa fa-twitter"></i></a>
                    <a href=""><i class="fa fa-facebook"></i></a>
                    <a href=""><i class="fa fa-google-plus"></i></a>
                    <a href=""><i class="fa fa-linkedin"></i></a>                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
            <div class="member">
              <img src="<?php echo base_url();?>assets/front_page/image/team-1.jpg" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Sarah Jhonson</h4>
                  <span>Product Manager</span>
                  <div class="social">
                    <a href=""><i class="fa fa-twitter"></i></a>
                    <a href=""><i class="fa fa-facebook"></i></a>
                    <a href=""><i class="fa fa-google-plus"></i></a>
                    <a href=""><i class="fa fa-linkedin"></i></a>                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
            <div class="member">
              <img src="<?php echo base_url();?>assets/front_page/image/team-1.jpg" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>William Anderson</h4>
                  <span>CTO</span>
                  <div class="social">
                    <a href=""><i class="fa fa-twitter"></i></a>
                    <a href=""><i class="fa fa-facebook"></i></a>
                    <a href=""><i class="fa fa-google-plus"></i></a>
                    <a href=""><i class="fa fa-linkedin"></i></a>                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
            <div class="member">
              <img src="<?php echo base_url();?>assets/front_page/image/team-1.jpg" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Amanda Jepson</h4>
                  <span>Accountant</span>
                  <div class="social">
                    <a href=""><i class="fa fa-twitter"></i></a>
                    <a href=""><i class="fa fa-facebook"></i></a>
                    <a href=""><i class="fa fa-google-plus"></i></a>
                    <a href=""><i class="fa fa-linkedin"></i></a>                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section>
  		<?php /*?><div class="row1 stats-row">
        <div class="stats-col text-center col-md-3 col-sm-6">
          <div class="circle">
            <span class="stats-no" data-toggle="counter-up">232</span> Satisfied Customers
          </div>
        </div>

        <div class="stats-col text-center col-md-3 col-sm-6">
          <div class="circle">
            <span class="stats-no" data-toggle="counter-up">79</span> Released Projects
          </div>
        </div>

        <div class="stats-col text-center col-md-3 col-sm-6">
          <div class="circle">
            <span class="stats-no" data-toggle="counter-up">1,463</span> Hours Of Support
          </div>
        </div>

        <div class="stats-col text-center col-md-3 col-sm-6">
          <div class="circle">
            <span class="stats-no" data-toggle="counter-up">15</span> Hard Workers
          </div>
        </div>
      </div><?php */?>
	 <?php /*?><!-- <div class="container">
	  	<div class="row1 no-gutters about-cols">
			<div class="col-md-4 wow fadeInUp" style="visibility:visible; animation-name:fadeInUp;">
				<div class="about-col">
					<div class="img" alt class="img-fluid">
						<img src="<?php echo base_url();?>assets/front_page/image/7.jpg" style="height:200px"/>
						<div class="icon">
							 <i class="ion-ios-speedometer-outline"></i>
						</div>
					</div>
					<h2 class="title">
						<a href="#">Our Mission</a>
					</h2>
					<p>
						Lorem ipsum dolor sit amet, consectetur elit, sed do eiusmod tempor ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
					</p>
				</div>
			</div>
			<div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s" style="visibility:visible; animation-delay:0.1s; animation-name:fadeInUp;">
				<div class="about-col">
					<div class="img" alt class="img-fluid">
						<img src="<?php echo base_url();?>assets/front_page/image/8.jpg" style="height:200px" class="image"/>
						<div class="icon">
							 <i class="fa fa-list"></i>
						</div>
					</div>
					<h2 class="title">
						<a href="#">Our Plan</a>
					</h2>
					<p>
						Sed ut perspiciatis unde omnis iste natus error sit voluptatem doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
					</p>
				</div>
			</div>
			<div class="col-md-4 wow fadeInUp" data-wow-delay="0.2s" style="visibility:visible; animation-delay:0.2s; animation-name:fadeInUp;">
				<div class="about-col">
					<div class="img" alt class="img-fluid">
						<img src="<?php echo base_url();?>assets/front_page/image/9.jpg" style="height:200px"/>
						<div class="icon">
							 <i class="fa fa-eye"></i>
						</div>
					</div>
					<h2 class="title">
						<a href="#">Our Vision</a>
					</h2>
					<p>
						Nemo enim ipsam voluptatem quia voluptas sit aut odit aut fugit, sed quia magni dolores eos qui ratione voluptatem sequi nesciunt Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet.
					</p>
				</div>
			</div>			
		</div>
	  </div>
	  	
    </div>
  </section>--><?php */?>
  
 <?php /*?>/* <section id="services" class="services">
  	<div class="container text-center">
		<div class="section-header wow fadeInUp" style="visibility:visible; animation-name:fadeInUp;">
			<h3 class="heading">services</h3>
			<p class="paragraph">Laudem latine persequeris id sed, ex fabulas delectus quo. No vel partiendo abhorreant vituperatoribus, ad pro quaestio laboramus. Ei ubique vivendum pro. At ius nisl accusam lorenta zanos paradigno tridexa panatarel.</p>
		</div>
		
		<div class="row2">
			<div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-duration="1.4s" style="visibility:visible; animation-duration:1.4s; animation-name:fadeInUp;">
				
				<h4 class="title"><a href="#">Lorem Ipsum</a></h4>
				<p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
			</div>
			<div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-duration="1.4s" style="visibility:visible; animation-duration:1.4s; animation-name:fadeInUp;">
				
				<h4 class="title"><a href="#">Dolor Sitema</a></h4>
				<p class="description">Minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat tarad limino ata</p>
			</div>
			<div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-duration="1.4s" style="visibility:visible; animation-duration:1.4s; animation-name:fadeInUp;">
				
				<h4 class="title"><a href="#">Sed ut perspiciatis</a></h4>
				<p class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur</p>
			</div>
			<div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-duration="1.4s" style="visibility:visible; animation-duration:1.4s; animation-name:fadeInUp;">
				
				<h4 class="title"><a href="#">Magni Dolores</a></h4>
				<p class="description">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
			</div>
			<div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-duration="1.4s" style="visibility:visible; animation-duration:1.4s; animation-name:fadeInUp;">
				
				<h4 class="title"><a href="#">Nemo Enim</a></h4>
				<p class="description">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque</p>
			</div>
			<div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-duration="1.4s" style="visibility:visible; animation-duration:1.4s; animation-name:fadeInUp;">
				
				<h4 class="title"><a href="#">Eiusmod Tempor</a></h4>
				<p class="description">Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi</p>
			</div>
			
		</div>
	</div>
  </section>
		
	<section id="facts" class="wow fadeIn" style="visibility:visible; animation-name:fadeIn;">
		<div class="container">
			<div class="section-header">
				<h3>Facts</h3>
				<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>

			</div>
			<div class="row3 counters">
				<div class="col-lg-3 col-6 text-center">
					<span data-toggle="counter-up">27</span>
					<p>Clients</p>
				</div>
				<div class="col-lg-3 col-6 text-center">
					<span data-toggle="counter-up">41</span>
					<p>Projects</p>
				</div>
				<div class="col-lg-3 col-6 text-center">
					<span data-toggle="counter-up">136</span>
					<p>Hours Of Support</p>
				</div>
				<div class="col-lg-3 col-6 text-center">
					<span data-toggle="counter-up">0</span>
					<p>Hard Workers</p>
				</div>
			</div>
			<div class="facts-img">
				<img src="<?php echo base_url();?>assets/front_page/image/9.jpg" />
			</div>
		</div>
	</section>		
	
	<section id="team">
		<div class="container">
			<div class="section-header wow fadeInUp" style="visibility:visible; animation-name:fadeInUp;">
				<h3>Our Team</h3>
				<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
			</div>
			<div class="row4">
				<div class="col-lg-3 col-md-6 wow fadeInUp" style="visibility:visible; animation-name:fadeInUp;">
					<div class="member">
						<img src="<?php echo base_url();?>assets/front_page/image/team-1.jpg" />
					</div>
					<div class="member-info">
						<div class="member-info-content">
							<h4>Jemish Gadhiya</h4>
							<span>Chief Executive Officer</span>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s" style="visibility:visible; animation-delay:0.1s; animation-name:fadeInUp;">
					<div class="member">
						<img src="<?php echo base_url();?>assets/front_page/image/team-1.jpg" style="margin-right:60px;" />
					</div>
					<div class="member-info">
						<div class="member-info-content">
							<h4>Jigar Dhameliya</h4>
							<span>Project Manager</span>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 wow fadeInUp" style="visibility:visible; animation-delay:0.2s; animation-name:fadeInUp;">
					<div class="member">
						<img src="<?php echo base_url();?>assets/front_page/image/team-1.jpg" style="margin-right:20px;" />
					</div>
					<div class="member-info">
						<div class="member-info-content">
							<h4>Hiren Ghoghari</h4>
							<span>Manager</span>
						</div>
					</div>
				</div>
				
				</div>
			</div>
		</div>--><?php */?>
	
	<div class="footer" >
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
