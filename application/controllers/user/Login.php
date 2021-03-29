<?php

class Login extends CI_Controller
 {
 	 function __construct()
	  {
	  	parent :: __construct();
		
		if($this->session->userdata('normaluser')!='')
		 {
		 	redirect('user/Dashboard');
		 }
		$this->load->library('google');		
		$this->load->model('user/Login_model');
	  }
	 
	 function index()
	  {//echo 'hello';die;
	 	$logerr=array();
		
	 	if($this->input->post('submit'))
		 {
		 	
			//check for email & password
			
			$qr=$this->Login_model->login();
				
			$num=$qr->num_rows();
			
			if($num==1)
			 {
			 	$arr=$qr->row_array();
			 	$id=$arr['id'];
				if($arr['status']==1)
				 {
			 		$this->session->set_userdata('normaluser',$id);
				 	redirect('user/Dashboard');
				 }
				else
				 {
				 	$logerr['block_status']="User Blocked";
			 		//$this->load->view('user/login',$logerr);
					
				 //	$logerr['invalid']="User Blocked";
			 		//$this->load->view('user/login',$logerr);
				 }
			 				 
			 }
			else
			 {
			 	$logerr['invalid']="invalid username or password";
			 	//$this->load->view('user/login',$logerr);
			 }
		 }
		if($this->input->post('cancel'))
		 {
			redirect('Front_page/index');
		 }
		$logerr['loginURL'] = $this->google->loginURL();
		//echo '<pre>';print_r($data);die;
		$this->load->view('user/login',$logerr);
	 }
	
	public function login_google()
	 {
		
		//redirect to profile page if user already logged in
		//if($this->session->userdata('loggedIn') == true)
		//{
			//redirect('user_authentication/profile/');
		//}
		
		if(isset($_GET['code'])){
			//authenticate user
			$this->google->getAuthenticate();
			
			//get user info from google
			$gpInfo = $this->google->getUserInfo();
			
            //preparing data for database insertion
			$userData['oauth_provider'] = 'google';
			$userData['oauth_uid'] 		= $gpInfo['id'];
            $userData['first_name'] 	= $gpInfo['given_name'];
            $userData['last_name'] 		= $gpInfo['family_name'];
            $userData['email'] 			= $gpInfo['email'];
			$userData['gender'] 		= !empty($gpInfo['gender'])?$gpInfo['gender']:'';
			$userData['locale'] 		= !empty($gpInfo['locale'])?$gpInfo['locale']:'';
            $userData['profile_url'] 	= !empty($gpInfo['link'])?$gpInfo['link']:'';
            $userData['picture_url'] 	= !empty($gpInfo['picture'])?$gpInfo['picture']:'';
			
			//insert or update user data to the database
            
			$userID = $this->Login_model->login_google($userData);
			
			
			redirect('user/Dashboard/index');
		
		} 
		
		//google login url
		$data['loginURL'] = $this->google->loginURL();
		
		//load google login view
		$this->load->view('user_authentication/index',$data);
    }
 
	function login_twitter(){
		$userData = array();
	echo 'test';die;	
		//Include the twitter oauth php libraries
		include_once APPPATH."libraries/twitter-oauth-php-codexworld/twitteroauth.php";
		
		//Twitter API Configuration
		$consumerKey = 'gwj0QtbOFChX99VIJq0eJmB4V';
		$consumerSecret = 'Kz5ASX21rl17U9v5a7GePHoHaPtKpCUc64BA3AqNfJn1M7lSSh';
		$oauthCallback = site_url().'/user/Login/login_twitter';
		
		if(isset($sessStatus) && $sessStatus == 'verified'){
			//Connect and get latest tweets
			$connection = new TwitterOAuth($consumerKey, $consumerSecret, $sessUserData['accessToken']['oauth_token'], $sessUserData['accessToken']['oauth_token_secret']); 
			$data['tweets'] = $connection->get('statuses/user_timeline', array('screen_name' => $sessUserData['username'], 'count' => 5));

			//User info from session
			$userData = $sessUserData;
		}elseif(isset($_REQUEST['oauth_token']) ){
			//Successful response returns oauth_token, oauth_token_secret, user_id, and screen_name
			$connection = new TwitterOAuth($consumerKey, $consumerSecret, $sessToken, $sessTokenSecret); //print_r($connection);die;
			$accessToken = $connection->getAccessToken($_REQUEST['oauth_verifier']);
			if($connection->http_code == '200'){
				//Get user profile info
				$userInfo = $connection->get('account/verify_credentials');
				echo '<pre>';print_r($userInfo);die;
				//Preparing data for database insertion
				$name = explode(" ",$userInfo->name);
				$first_name = isset($name[0])?$name[0]:'';
				$last_name = isset($name[1])?$name[1]:'';
				$userData = array(
					'oauth_provider' => 'twitter',
					'oauth_uid' => $userInfo->id,
					'username' => $userInfo->screen_name,
					'first_name' => $first_name,
					'last_name' => $last_name,
					'locale' => $userInfo->lang,
					'profile_url' => 'https://twitter.com/'.$userInfo->screen_name,
					'picture_url' => $userInfo->profile_image_url
				);
				
				//Insert or update user data
				$userID = $this->user->checkUser($userData);
				
				//Store status and user profile info into session
				$userData['accessToken'] = $accessToken;
				//$this->session->set_userdata('status','verified');
				//$this->session->set_userdata('userData',$userData);
				
				//Get latest tweets
				$data['tweets'] = $connection->get('statuses/user_timeline', array('screen_name' => $userInfo->screen_name, 'count' => 5));
			}else{
				$data['error_msg'] = 'Some problem occurred, please try again later!';
			}
		}else{
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
        }

		$data['userData'] = $userData;
		$this->load->view('user/dashboard',$data);    
	  }	
	
	
 }	


?>