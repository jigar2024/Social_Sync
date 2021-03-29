<?php
class Tumblr_post extends CI_Controller
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
		$this->load->model('social_accounts/Tumblr_post_model');
	  }	 
	 
	 function index()
	 {
		 //$response = $this->tumblr->request('POST', 'http://api.twitter.com/1.1/statuses/update.json', array('include_entities' => 'true', 'status' => 'I want cookies'));die;
    
		//$ses_id=$this->session->userdata('normaluser');	
		//$data['userdata']=$this->Dashboard_model->getrec($ses_id);
		//echo "<pre>";print_r($data);die;
		
		$qr=$this->Tumblr_post_model->get_all_tm_rec();
		
		foreach($qr as $row)
		{
			$posts=$this->Tumblr_post_model->get_all_post_tm($row['job_id'],$row['sync_frequency']);
			//echo "<pre>";print_r($ss);die;
			$target_tm_id=explode(',',$row['tm_target_id']);
			//echo "<pre>";print_r($target_fb_id);
			//
			foreach($posts as $post){
			
				//$post_arr = array('message'=>$post['post_desc'],'picture'=>'https://411.ca/business-solutions-hero-lg.4fabe677c7d9c8304ce0.jpg','link'=>'http://creativewebinfotech.com');
				
				foreach($target_tm_id as $soc)
				{	
					
					$token=$this->Tumblr_post_model->get_tm_token($soc);
					//$post_arr['access_token'] = $token;
					//echo '<pre>';print_r($post_arr);die;
					/*$result = $this->facebook->request(
						'post',
						$soc.'/feed',
						$post_arr,$token
					);
					
					if(@$result['id'])
					 {
					 	$message='success';
						$posted_id=$result['id'];
						
						$this->Tumblr_post_model->update_tm_status($post['post_id']);
					 }
					else
					 {
					 	$message=$result['message'];
						$posted_id='';
					 }
					
					$arr=array(
						'job_id'=>$row['job_id'],
						'target_id'=>$soc,
						'message'=>$message,
						'posted_id'=>$posted_id,
						'posted_time'=>date('Y-m-d H:i:s'),
						'social_type'=>'tumblr'
					);
					$this->Tumblr_post_model->add_sync_log($row['job_id'],$arr);
					echo '<pre>';print_r($result);*/
					echo "<br><br><br>".$token;
				}
				
			 }
			/* $ar=array(
			 	'tm_last_sync_time'=>date('Y-m-d H:i:s')
			 );
			 $token=$this->Tumblr_post_model->get_update_tm_time($row['job_id'],$ar);*/
 
		}
		
		
	 }
	
	
}
?>