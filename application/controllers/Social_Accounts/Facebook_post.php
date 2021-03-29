<?php
class Facebook_post extends CI_Controller
{
	 function __construct()
	  {
	  	parent :: __construct();
		// Load facebook library
		$this->load->library('facebook');		
		$this->load->model('user/Dashboard_model');
		$this->load->model('user/Social_Post_model');
		$this->load->model('user/Login_model');
		$this->load->model('social_accounts/Facebook_post_model');
	  }	 
	 
	 function index()
	 {
		//$ses_id=$this->session->userdata('normaluser');	
		//$data['userdata']=$this->Dashboard_model->getrec();
		//echo "<pre>";print_r($data);die;
		
		$qr=$this->Facebook_post_model->get_all_fb_rec();
		
		foreach($qr as $row)
		{
			$posts=$this->Facebook_post_model->get_all_post_fb($row['job_id'],$row['sync_frequency']);
			//echo "<pre>";print_r($posts);
			$target_fb_id=explode(',',$row['fb_target_id']);
			//echo "<pre>";print_r($target_fb_id);
			//
			foreach($posts as $post){
			
				$post_arr = array('message'=>$post['post_desc']);
				
				
				foreach($target_fb_id as $soc)
				{	
					
					$token=$this->Facebook_post_model->get_fb_token($soc);
					//$post_arr['access_token'] = $token;
					//echo '<pre>';print_r($post_arr);die;
					$result = $this->facebook->request(
						'post',
						$soc.'/feed',
						$post_arr,$token
					);
					
					if(@$result['id'])
					 {
					 	$message='success';
						$posted_id=$result['id'];
							
						$this->Facebook_post_model->update_fb_status($post['post_id']);
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
						'social_type'=>'facebook'
					);
					$this->Facebook_post_model->add_sync_log($row['job_id'],$arr);
					echo '<pre>';print_r($result);
					//echo "<br>".$token;
					
					
				}
				
			 }
			 $ar=array(
			 	'fb_last_sync_time'=>date('Y-m-d H:i:s')
			 );
			 $token=$this->Facebook_post_model->get_update_fb_time($row['job_id'],$ar);
 
		}
		
		
	 }
	
	
}
?>