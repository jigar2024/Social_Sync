<?php
class Twitter_tweet extends CI_Controller
{
	 function __construct()
	  {
	  	parent :: __construct();
		// Load facebook library
		//$this->load->library('tumblr');		
		/*if($this->session->userdata('normaluser')=='')
		 {
		 	redirect('user/Login');
		 }*/
		 
		
		$this->load->model('user/Dashboard_model');
		$this->load->model('user/Social_Post_model');
		$this->load->model('user/Login_model');
		$this->load->model('social_accounts/Twitter_tweet_model');
	  }	 
	 
	 function index()
	 {
		 include_once APPPATH."libraries/twitter-oauth-php-codexworld/twitteroauth.php";
		 $consumerKey = 'gwj0QtbOFChX99VIJq0eJmB4V';
		$consumerSecret = 'Kz5ASX21rl17U9v5a7GePHoHaPtKpCUc64BA3AqNfJn1M7lSSh';
		 //$response = $this->tumblr->request('POST', 'http://api.twitter.com/1.1/statuses/update.json', array('include_entities' => 'true', 'status' => 'I want cookies'));die;
    
		//$ses_id=$this->session->userdata('normaluser');	
		//$data['userdata']=$this->Dashboard_model->getrec($ses_id);
		//echo "<pre>";print_r($data);die;
		
		$qr=$this->Twitter_tweet_model->get_all_tw_rec();
		//echo "<pre>";print_r($qr);die;
		//$this->config->item();
		foreach($qr as $row)
		{
			
			$posts=$this->Twitter_tweet_model->get_all_post_tw($row['job_id'],$row['sync_frequency']);
			
			$target_tw_id=explode(',',$row['tw_target_id']);
			
			
			//echo "<pre>";print_r($target_fb_id);
			//
			foreach($posts as $post){
			
				//$post_arr = array('message'=>$post['post_desc'],'picture'=>'https://411.ca/business-solutions-hero-lg.4fabe677c7d9c8304ce0.jpg','link'=>'http://creativewebinfotech.com');
				
				foreach($target_tw_id as $soc)
				{	
				
					$token_data=$this->Twitter_tweet_model->get_tw_token($soc);
		
					//echo "<pre>";print_r($token_data);
					
					$token_arr=json_decode($token_data['token'],TRUE);
					//$post_arr['access_token'] = $token;
					
					// Connect to Twitter
					
					$tmhoauth = new TwitterOAuth($consumerKey,
						 $consumerSecret,
						  $token_arr['oauth_token'],
						  $token_arr['oauth_token_secret']
						); // setting dynamic user
					#Twitter Status update
					$response = $tmhoauth->post('statuses/update', array(
					  'status' =>$post['post_desc']
					));
					
					//echo "<pre>";print_r($response);die;
					
					
					if(@$response->id_str)
					 {
					 	$message='success';
						$posted_id=$response->id_str;
						
						$this->Twitter_tweet_model->update_tw_status($post['post_id']);
					 }
					else
					 {
					 	$message=$response->errors[0]->message;

						$posted_id='';
					 }
					$arr=array(
						'job_id'=>$row['job_id'],
						'target_id'=>$soc,
						'message'=>$message,
						'posted_id'=>$posted_id,
						'posted_time'=>date('Y-m-d H:i:s'),
						'social_type'=>'twitter'
					);
					//echo '<pre>';print_r($response);die;
					$this->Twitter_tweet_model->add_sync_log($row['job_id'],$arr);
					
					
					//echo "<br><br><br>".$token;
				}
				
			 }
			 $ar=array(
			 	'tw_last_sync_time'=>date('Y-m-d H:i:s')
			 );
			 $token=$this->Twitter_tweet_model->get_update_tw_time($row['job_id'],$ar);
 
		}
		
		
	 }
	
	
}
?>