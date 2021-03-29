<?php

class Dashboard extends CI_Controller
 {
 	 var $consumerKey = 'BxMYasuNYFh9DbrVMc1vEDYlBvS8tbBm9qAZhPJ0kMuEcJ1Slw';
	 var $consumerSecret = 'aegUqhZ3KX7WrQ2FDfjEHQELZReqa7Xy5u8IbQ8oRpBuR5rCYn';
	
 	 function __construct()
	  {
	  	parent :: __construct();
		
		if($this->session->userdata('normaluser')=='')
		 {
		 	redirect('user/Login');
		 }
		 $this->load->library('pinterest');
		
		$this->load->library('google');
		$this->load->config('linkedin');
		
		$this->load->helper('Tumblr');
		$this->load->library('facebook');
		
		$this->load->model('user/Dashboard_model');
		$this->load->model('user/Login_model');
	  }
	 function index()
	 {
	 	if(@$this->uri->segment(4)=="modal")
		{
			$data['modal']="true";
	 	}
	 	if(@$message)
		{
			echo $message;die;
		}
	 	error_reporting(0);
	 	$ses_id=$this->session->userdata('normaluser');
		if(isset($_GET['code'])){
			//authenticate user
			$this->google_func();
		}
		$data['userdata']=$this->Dashboard_model->getrec($ses_id);
		$data['loginURL'] = $this->google->loginURL();
		
		$this->load->library('pinterest');
		$data['pin_url']=$this->pinterest->getLoginUrl('https://localhost/social_sync/index.php/user/Dashboard/pin_success');
		
		$data['oauthURL'] = $this->get_twitter_url();
		$data['oauthURL_linkedin'] = $this->get_linkedin_url();
		$data['tm_url'] = $this->connect();
	 
		$data['oauthURL_facebook'] = $this->facebook_func();
		$this->session->set_userdata('loginURL',$data['loginURL']);
		$this->session->set_userdata('pin_url',$data['pin_url']);
		$this->session->set_userdata('oauthURL',$data['oauthURL']);
		$this->session->set_userdata('oauthURL_linkedin',$data['oauthURL_linkedin']);
		$this->session->set_userdata('tm_url',$data['tm_url']);
		$this->session->set_userdata('oauthURL_facebook',$data['oauthURL_facebook']);
		//echo '<pre>';print_r($data);die;
		
		$this->load->view('user/dashboard',$data);
	 }
	 
	 
	 function get_twitter_url(){
	 //Include the twitter oauth php libraries
		include_once APPPATH."libraries/twitter-oauth-php-codexworld/twitteroauth.php";
		
		//Twitter API Configuration

		$consumerKey = 'gwj0QtbOFChX99VIJq0eJmB4V';
		$consumerSecret = 'Kz5ASX21rl17U9v5a7GePHoHaPtKpCUc64BA3AqNfJn1M7lSSh';
		$oauthCallback = site_url().'/user/Dashboard/twitter_func';
		
		//Get existing token and token secret from session
		$sessToken = $this->session->userdata('token');
		$sessTokenSecret = $this->session->userdata('token_secret');
		
		//Get status and user info from session
		$sessStatus = $this->session->userdata('status');
		$sessUserData = $this->session->userdata('userData');
		
	 	//unset token and token secret from session
			$this->session->unset_userdata('token');
			$this->session->unset_userdata('token_secret');
			
			//Fresh authentication
			$connection = new TwitterOAuth($consumerKey, $consumerSecret);
			$requestToken = $connection->getRequestToken($oauthCallback);
			
			//Received token info from twitter
			$this->session->set_userdata('token',$requestToken['oauth_token']);
			$this->session->set_userdata('token_secret',$requestToken['oauth_token_secret']);
			
			//Any value other than 200 is failure, so continue only if http code is 200
			if($connection->http_code == '200'){
				//redirect user to twitter
				$twitterUrl = $connection->getAuthorizeURL($requestToken['oauth_token']);
				$data['oauthURL'] = $twitterUrl;
			}else{
				$data['oauthURL'] = base_url().'user_authentication';
				$data['error_msg'] = 'Error connecting to twitter! try again later!';
			}
			return $data['oauthURL'];
	 }
	 
	/*function profileuser()
	 {
		$data=array();
		
	 	$ses_id=$this->session->userdata('normaluser');
		$data['userdata']=$this->Dashboard_model->getrec($ses_id);
		
		$this->load->library('form_validation');
	  	if($this->input->post('submit'))
		 {
		 	$this->form_validation->set_rules('name','Name','required|alpha');
			$this->form_validation->set_rules('gender','Gender','required');
			
			if($this->form_validation->run() == FALSE)
			 {
				$data['name']=set_value('name');
				$data['gender']=set_value('gender');
			 }
			else
			 {	
			 		if($_FILES['photo']['name']=='')
					 {
						$data['file_err']="Please Select The Image";
					 }
					else
					 {
						$this->Dashboard_model->update_profile($ses_id);
						//redirect('user/Dashboard/index');
					 }
			 }
		 }
		if($this->input->post('cancel'))
		 {
			redirect('user/Dashboard/index');
		 } 
	 	$this->load->view('user/profileuser',$data);
	 }*/
	 
	function google_func()
	 {
	 	$this->google->getAuthenticate();
			
			//get user info from google
			$gpInfo = $this->google->getUserInfo();
			
			$userData['name'] 	= $gpInfo['name'];
			$userData['email'] 			= $gpInfo['email'];
			$userData['image'] 	= !empty($gpInfo['picture'])?$gpInfo['picture']:'';
			$userData['token']= $this->google->getAccessToken();
			$userData['user_id']=$this->session->userdata('normaluser');
			$userData['social_id'] 		= $gpInfo['id'];
			$userData['social_type'] = 'google';
			$userData['creation_time']=date('Y-m-d H:i:s');
            
			$userID = $this->Login_model->add_social_data($userData);
			redirect('user/Social_Post/index');
	 }
	 
	 
	function twitter_func()
	 {
	  	$userData = array();
		$sessToken = $this->session->userdata('token');
		$sessTokenSecret = $this->session->userdata('token_secret');
		//Include the twitter oauth php libraries
		include_once APPPATH."libraries/twitter-oauth-php-codexworld/twitteroauth.php";
		
		//Twitter API Configuration
		$consumerKey = 'gwj0QtbOFChX99VIJq0eJmB4V';
		$consumerSecret = 'Kz5ASX21rl17U9v5a7GePHoHaPtKpCUc64BA3AqNfJn1M7lSSh';
		$oauthCallback = site_url().'/user/Dashboard/twitter_func';
		
		if(isset($_REQUEST['oauth_token']) ){
			//Successful response returns oauth_token, oauth_token_secret, user_id, and screen_name
			$connection = new TwitterOAuth($consumerKey, $consumerSecret, $sessToken, $sessTokenSecret); //print_r($connection);die;
			$accessToken = $connection->getAccessToken($_REQUEST['oauth_verifier']);
			
			//echo $connection->http_code;die;
			if($connection->http_code == '200'){
				//Get user profile info
				$userInfo = $connection->get('account/verify_credentials');
				//echo '<pre>';print_r($userInfo);die;
				//Preparing data for database insertion
				$name = explode(" ",$userInfo->name);
				$first_name = isset($name[0])?$name[0]:'';
				$last_name = isset($name[1])?$name[1]:'';
				$userData = array(
					'name' => $userInfo->name,
					'username' => $userInfo->screen_name,
					'image' => $userInfo->profile_image_url,
					'token' => json_encode($accessToken),
					'user_id' => $this->session->userdata('normaluser'),
					'social_id' => $userInfo->id_str,
					'social_type' => 'twitter',
					'creation_time' => date('Y-m-d H:i:s')
				);
				//echo "<pre>";print_r($userData);die;
				//Insert or update user data
				
				$userID = $this->Login_model->add_social_data($userData);
				redirect('user/Social_Post/index');
				//Store status and user profile info into session
				$userData['accessToken'] = $accessToken;
				
				//Get latest tweets
				$data['tweets'] = $connection->get('statuses/user_timeline', array('screen_name' => $userInfo->screen_name, 'count' => 5));
			}else{
				$data['error_msg'] = 'Some problem occurred, please try again later!';
			}
		}else{
			$connection = new TwitterOAuth($consumerKey, $consumerSecret);
			$requestToken = $connection->getRequestToken($oauthCallback);
			if($connection->http_code == '200'){
				//redirect user to twitter
				$twitterUrl = $connection->getAuthorizeURL($requestToken['oauth_token']);
				$data['oauthURL'] = $twitterUrl;
			}else{
				$data['oauthURL'] = base_url().'user/Dashboard/index';
				$data['error_msg'] = 'Error connecting to twitter! try again later!';
			}
			 return $data['oauthURL'];
        }
	  } 	
	  function get_linkedin_url()
	  {
	  		$userData = array();
			$data=array();
			//Include the linkedin api php libraries
			include_once APPPATH."libraries/linkedin-oauth-client/http.php";
			include_once APPPATH."libraries/linkedin-oauth-client/oauth_client.php";
		
		
		//Get status and user info from session
			//$oauthStatus = $this->session->userdata('oauth_status');
			//$sessUserData = $this->session->userdata('userData');
			
			//if(isset($oauthStatus) && $oauthStatus == 'verified'){
				//User info from session
				//$userData = $sessUserData;
			if((isset($_REQUEST["oauth_init"]) && $_REQUEST["oauth_init"] == 1) || (isset($_REQUEST['oauth_token']) && isset($_REQUEST['oauth_verifier']))){
				$client = new oauth_client_class;
				$client->client_id = $this->config->item('linkedin_api_key');
				$client->client_secret = $this->config->item('linkedin_api_secret');
				$client->redirect_uri = site_url().$this->config->item('linkedin_redirect_url');
				$client->scope = $this->config->item('linkedin_scope');
				$client->debug = false;
				$client->debug_http = true;
				$application_line = __LINE__;
				
				//If authentication returns success
				if($success = $client->Initialize()){
					if(($success = $client->Process())){
						if(strlen($client->authorization_error)){
							$client->error = $client->authorization_error;
							$success = false;
						}elseif(strlen($client->access_token)){
						//echo '<pre>';print_r($_SESSION['OAUTH_ACCESS_TOKEN']);
						//echo '<pre>';print_r($client->access_token);die;
							$success = $client->CallAPI('http://api.linkedin.com/v1/people/~:(id,email-address,first-name,last-name,location,picture-url,public-profile-url,formatted-name)', 
							'GET',
							array('format'=>'json'),
							array('FailOnAccessError'=>true), $userInfo);
						}
					}
					$success = $client->Finalize($success);
				}
				
				if($client->exit) exit;
		
				if($success){
					//Preparing data for database insertion
					$first_name = !empty($userInfo->firstName)?$userInfo->firstName:'';
					$last_name = !empty($userInfo->lastName)?$userInfo->lastName:'';
					
					$image_url='';
					if($userInfo->pictureUrl != '')
					 {
					 	$image_url=$userInfo->pictureUrl;
					 }
					
					//echo '<pre>';print_r($userInfo);die;
					$userData = array(
					
						'name'=>$userInfo->formattedName,
						'email'=>$userInfo->emailAddress,
						'image'=>$image_url,
						'token'=>$client->access_token,
						'user_id' => $this->session->userdata('normaluser'),
						'social_id' => $userInfo->id,
						'social_type' => 'linkedin',
						'creation_time' => date('Y-m-d H:i:s')
						
					);
					//echo '<pre>';print_r($userData);die;
					//Insert or update user data
					
					//Store status and user profile info into session
					//$this->session->set_userdata('oauth_status','verified');
					//$this->session->set_userdata('userData',$userData);
					
					if($userID = $this->Login_model->add_social_data($userData)){
						//redirect('user/Social_Post/index');
					}
					//echo 'hello';die;
					//Redirect the user back to the same page
					//redirect('/user_authentication');
	
				}else{
					 $data['error_msg'] = 'Some problem occurred, please try again later!';
				}
				//echo 'dsfsf';die;
			}elseif(isset($_REQUEST["oauth_problem"]) && $_REQUEST["oauth_problem"] <> ""){
			//echo 'dfsdfsdf';die;
				$data['error_msg'] = $_GET["oauth_problem"];
			}else{
			//echo 'hello';die;
				$data['oauthURL_linkedin'] = site_url().$this->config->item('linkedin_redirect_url').'?oauth_init=1';
			}
			return $data['oauthURL_linkedin'];
			//$data['userData'] = $userData;
			
			// Load login & profile view
			//$this->load->view('user_authentication/index',$data);
	  }
	  
	  function pin_success(){
		$this->load->library('pinterest');
		$code = $this->input->get('code');
		if($code){
			$token_info = $this->pinterest->getOAuthToken($code);
			$token = $token_info['access_token'];
			#pre($token);die;
			//echo '<pre>';print_r($token);
			$this->pinterest->setOAuthToken($token_info['access_token']);
			 
			$user_info = $this->pinterest->me(array(
				'fields' => 'id,username,first_name,bio,last_name,image[small,large],created_at,counts,url,account_type','access_token'=> $token 
				));
				$user_info = $user_info['data'];
				$name=$user_info['first_name'].$user_info['last_name'];
				
				
				//echo '<pre>';print_r($user_info);die;
			$curDomain = str_replace('www.', '', $_SERVER['HTTP_HOST']);	
			$pinterest_id = $user_info['id'];	
			$user_img = $user_info['image']['large']['url'];
			
			
			$data=array(
					'name'=>$name,
					'username'=>$user_info['username'],
					'image'=>$user_img,
					'token'=>$token,
					'user_id' => $this->session->userdata('normaluser'),
					'social_id' => $pinterest_id,
					'social_type' => 'pinterest',
					'creation_time' => date('Y-m-d H:i:s')
						
				);
			$userID = $this->Login_model->add_social_data($data);
			
			redirect('user/Social_Post/index');
		}
	}

	function login_tum(){
		if($this->session->userdata('auth_token') AND $this->session->userdata('oauth_token_secret')){		
		
		$post_URI = 'http://api.tumblr.com/v2/blog/'.$this->base_hostname.'/post';
		$tum_oauth = new TumblrOAuth($this->consumerKey, $this->consumerSecret, $this->session->userdata('auth_token'), $this->session->userdata('oauth_token_secret'));		
		// Make an API call with the TumblrOAuth instance. For text Post, pass parameters of type, title, and body
		$parameters = array();
		$parameters['type'] = "link"; // type: link post, text, vidoe, photos and many more
		$parameters['title'] = "this is my Posting title";
		$parameters['url'] = 'http://pampim.com/home/index/Pakistan/page=117968/icon=youtube_259417';
		$parameters['description'] = "This is my test posting vidoe link";
		
		$post = $tum_oauth->post($post_URI,$parameters);
		//var_dump($tum_oauth);
		echo "<br><br>";
		var_dump($post);
		
		// Check for an error.
		if (201 == $tum_oauth->http_code) {
		  echo $post->meta->msg;
		  echo "<br>id:".$post->response->id;
		} else {
		  //die('error');
		  var_dump($post);
		}
		}else{
			//echo site_url('tumblr/connect');
			//echo base_url().'tumblr/connect';
			//die;
			redirect(site_url('tumblr/connect'));
		}
		
	}
	function login_tumblr(){
		$data['tm_url'] = $this->connect();
		//echo '<pre>';print_r($data);die;
		$this->load->view('user/dashboard',$data);
	}
	function connect()
	{
		
		// The callback URL is the script that gets called after the user authenticates with tumblr
		// In this example, it would be the included callback.php
		$callback_url = site_url('user/Dashboard/callback/'); // call bak url after authenticate
		
		// Let's begin.  First we need a Request Token.  The request token is required to send the user
		// to Tumblr's login page.
		
		// Create a new instance of the TumblrOAuth library.  For this step, all we need to give the library is our
		// Consumer Key and Consumer Secret
		$tum_oauth = new TumblrOAuth($this->consumerKey, $this->consumerSecret);
		
		// Ask Tumblr for a Request Token.  Specify the Callback URL here too (although this should be optional)
		$request_token = $tum_oauth->getRequestToken($callback_url);
		//print_r($request_token);
		//die;
		// Store the request token and Request Token Secret as out callback.php script will need this
		$this->session->set_userdata('request_token', $request_token['oauth_token']);
		$this->session->set_userdata('request_token_secret', $request_token['oauth_token_secret']);

		// Check the HTTP Code.  It should be a 200 (OK), if it's anything else then something didn't work.
		if($tum_oauth->http_code) {
		  //case 200:
			// Ask Tumblr to give us a special address to their login page
			 $url = $tum_oauth->getAuthorizeURL($request_token['oauth_token']);
			// Redirect the user to the login URL given to us by Tumblr
		//	pre($this->session->all_userdata());die;
			return $url;
			
			// That's it for our side.  The user is sent to a Tumblr Login page and
			// asked to authroize our app.  After that, Tumblr sends the user back to
			// our Callback URL (callback.php) along with some information we need to get
			// an access token.
			
			//break;
		//default:
			// Give an error message
			//echo 'Could not connect to Tumblr. Refresh the page or try again later.';
			
		}
		//exit();
	}
	
	
	function callback()
	{
		// It'll need our Consumer Key and Secret as well as our Request Token and Secret
		$tum_oauth = new TumblrOAuth($this->consumerKey, $this->consumerSecret, $this->session->userdata('request_token'), $this->session->userdata('request_token_secret'));
		#pre($this->session->all_userdata());die;

		// Ok, let's get an Access Token. We'll need to pass along our oauth_verifier which was given to us in the URL. 
		$access_token = $tum_oauth->getAccessToken($_REQUEST['oauth_verifier']);
		
		
		//echo '<pre>';print_r($access_token);
		
		// We're done with the Request Token and Secret so let's remove those.
		$this->session->unset_userdata('request_token');
		$this->session->unset_userdata('request_token_secret');
		
		// Make sure nothing went wrong.
		if (200 == $tum_oauth->http_code) {
			// if allow successfully we wills set here access token later can save in db for more uses
			$this->session->set_userdata('auth_token', $access_token['oauth_token']);
			$this->session->set_userdata('oauth_token_secret', $access_token['oauth_token_secret']);
			
			$userinfo = $tum_oauth->get('user/info');
			//echo '<pre>';print_r($userinfo->response->user->blogs[0]);die;
			$pro_url = $userinfo->response->user->blogs[0]->url;
			$userimg = str_replace('https://','',$pro_url);//https://api.tumblr.com/v2/blog/jemisworld.tumblr.com/avatar
			//$userImgInfo = $tum_oauth->get('blog/'.$userinfo->response->user->blogs[0]->uuid.'/avatar');
			$userImgInfo = 'https://api.tumblr.com/v2/blog/'.$userimg.'avatar';
			//echo '<pre>';print_r($userinfo);die;
			//$user_img = $userImgInfo->response->avatar_url;
		  	#
			$name	=	$userinfo->response->user->name;
			$url	=	$userinfo->response->user->blogs[0]->url;
			$today_date = date("Y-m-d H:i:s");
			$curDomain = str_replace('www.', '', $_SERVER['HTTP_HOST']);
			$active = 1;
			$data=array(
				'name'=>$name,
				'url'=>$url,
				'token'=>json_encode($access_token),
				'user_id' => $this->session->userdata('normaluser'),
				'social_type' => 'tumblr',
				'creation_time' => date('Y-m-d H:i:s'),
				'image'=>$userImgInfo,
				'social_id'=>md5($url)
			);
			
			//echo "<pre>";print_r($data);die;
			$userID = $this->Login_model->add_social_data_tumblr($data);
			redirect('user/Social_Post/index');
			
		} else {
		  die('Unable to authenticate');
		}
	}
	
	
	function facebook_func(){
	
	if($this->facebook->is_authenticated()){
			// Get user facebook profile details
			//echo '<pre>';print_r($this->facebook->is_authenticated());die;
			/*$userProfile = $this->facebook->request('get', '/me?fields=id,first_name,last_name,email,gender,locale,picture');
	//		echo '<pre>';print_r($userProfile);die;
            // Preparing data for database insertion
            $userData['oauth_provider'] = 'facebook';
            $userData['oauth_uid'] = $userProfile['id'];
            $userData['first_name'] = $userProfile['first_name'];
            $userData['last_name'] = $userProfile['last_name'];
            $userData['email'] = $userProfile['email'];
            $userData['gender'] = $userProfile['gender'];
            $userData['locale'] = $userProfile['locale'];
            $userData['profile_url'] = 'https://www.facebook.com/'.$userProfile['id'];
            $userData['picture_url'] = $userProfile['picture']['data']['url'];
			
            // Insert or update user data
            //$userID = $this->user->checkUser($userData);
			
			// Check user data insert or update status
            if(!empty($userID)){
                $data['userData'] = $userData;
                $this->session->set_userdata('userData',$userData);
            } else {
               $data['userData'] = array();
            }
			
			// Get logout URL
			$data['logoutUrl'] = $this->facebook->logout_url();*/
		}else{
            $fbuser = '';
			
			// Get login URL
            
        }
		$data['authUrl'] =  $this->facebook->login_url();
			return $data['authUrl'];
	}
	
	function facebook_redirect(){
		//echo 'hello';
		$data=array();
		$data_page=array();
		if($this->facebook->is_authenticated()){
			
			// Get user facebook profile details
			//echo '<pre>';print_r($this->facebook->is_authenticated());die;
			$userProfile = $this->facebook->request('get', '/me?fields=id,first_name,last_name,email,gender,locale,picture');
			$userlikes = $this->facebook->request('get', 'me/likes?fields=id,name');
			//page_type = 'likes_page';
//			echo '<pre>';print_r($userlikes);die;
			$usergroups = $this->facebook->request('get', 'me/groups?fields=id,name');
			//page_type = 'own_group';
			$useraccounts = $this->facebook->request('get', 'me/accounts?fields=id,name,access_token');
			//page_type = 'own_page';
			//echo '<pre>';print_r($useraccounts);die;
            // Preparing data for database insertion
            
			$userData['oauth_provider'] = 'facebook';
            $userData['oauth_uid'] = $userProfile['id'];
            $userData['first_name'] = $userProfile['first_name'];
            $userData['last_name'] = $userProfile['last_name'];
            $userData['email'] = $userProfile['email'];
            $userData['gender'] = $userProfile['gender'];
            $userData['locale'] = $userProfile['locale'];
            $userData['profile_url'] = 'https://www.facebook.com/'.$userProfile['id'];
            $userData['picture_url'] = $userProfile['picture']['data']['url'];
			
			$name=$userProfile['first_name']." ".$userProfile['last_name'];
			
			
		
			$data=array(
					'name'=>$name,
					'email'=>$userProfile['email'],
					'image'=>$userProfile['picture']['data']['url'],
					'token'=>$this->facebook->is_authenticated(),
					'user_id' => $this->session->userdata('normaluser'),
					'social_id' => $userProfile['id'],
					'social_type' => 'facebook',
					'creation_time' => date('Y-m-d H:i:s')
						
				);
			
			
			//echo '<pre>';print_r($userlikes);die;
			foreach($userlikes['data'] as $likes)
			{	
				//echo '<pre>';print_r($likes);die;
				    
				$data_page=array(		
							'page_id'=>$likes['id'],
							'page_name'=>$likes['name'],
							'page_type'=>'likes_page',
							'creation_time'=> date('Y-m-d H:i:s'),
							'social_id'=>$userProfile['id'],
							'user_id'=> $this->session->userdata('normaluser')
					);
				$this->Login_model->add_fb_likes_data($data_page);
			}
			
			foreach($usergroups['data'] as $groups)
			{	
				
				    
				$data_groups=array(		
							'page_id'=>$groups['id'],
							'page_name'=>$groups['name'],
							'page_type'=>'own_group',
							'creation_time'=> date('Y-m-d H:i:s'),
							'social_id'=>$userProfile['id'],
							'user_id'=> $this->session->userdata('normaluser')
							
					);
				$this->Login_model->add_fb_groups_data($data_groups);
					
			}
			
			foreach($useraccounts['data'] as $accounts)
			{	
				//echo '<pre>';print_r($accounts);die;
				    
				$data_accounts=array(		
							'page_id'=>$accounts['id'],
							'page_name'=>$accounts['name'],
							'page_token'=>$accounts['access_token'],
							'page_type'=>'own_page',
							'creation_time'=> date('Y-m-d H:i:s'),
							'social_id'=>$userProfile['id'],
							'user_id'=> $this->session->userdata('normaluser')
							
					);
				$this->Login_model->add_fb_accounts_data($data_accounts);
			}
			
			
			$userID = $this->Login_model->add_social_data($data);	
			
			
			redirect('user/Social_Post/index');
			
			
            //$userID = $this->user->checkUser($userData);
			
			// Check user data insert or update status
            if(!empty($userID)){
                $data['userData'] = $userData;
                $this->session->set_userdata('userData',$userData);
            } else {
               $data['userData'] = array();
            }
			
			// Get logout URL
			$data['logoutUrl'] = $this->facebook->logout_url();
		}
	}
	
	function acc_list()
	{
	 	$ses_id=$this->session->userdata('normaluser');	
		$data['userdata']=$this->Dashboard_model->getrec($ses_id);
		
		$this->load->library('pagination');
		$per_page=8;
		$start=0;
		$start=$this->uri->segment(4);
		
		$config['uri_segment']=4;
		$config['per_page']=$per_page;
		$config['total_rows']=$this->Dashboard_model->row_count($ses_id);
		$config['base_url']=site_url('user/Dashboard/acc_list');
		
		
		
		$config['full_tag_open']='<div class="pagination">';
		$config['full_tag_close']='</div>';
		$config['cur_tag_open']='<a class="active">';
		$config['full_tag_open']='</a>';
		
		
		
		
		$this->pagination->initialize($config);
		
		$data['social_data']=$this->Dashboard_model->getrec_social($ses_id,$per_page,$start);
	  	//$data['page']=$this->Dashboard_model->select_rec($per_page,$start);
		 
		 
		//$this->load->view('admin/view_admin',$arr);

		
		//echo "<pre>";print_r($data);die;
		$this->load->view('user/social_accounts_list',$data);
	}
	
	function remove_account($social_id='',$social_type='')
	{
		if($social_type=='facebook')
		 {
		 	$this->logout();
		 }
		
		$this->Dashboard_model->remove_acc($social_id);
	}
	public function logout() 
	{
		//$this->session->sess_destroy();
		// Remove local Facebook session
		$this->facebook->destroy_session();
		// Remove user data from session
		$this->session->unset_userdata('userData');
		// Redirect to login page
        //redirect('/user_authentication');
    }
	
	
	
	
  }	


?>