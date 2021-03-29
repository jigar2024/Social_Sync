<?php

class Twitter_tweet_model extends CI_Model
 {
	 function get_all_tw_rec()
	  {
	  	//$this->db->where('user_id',$ses_id);
		$this->db->where('is_tw_sync',1);
		$this->db->where('job_status',1);
		$qr=$this->db->get('post_jobs');
		$content=$qr->result_array();
		return $content;
		
	  }
	 function get_all_post_tw($job_id='',$frequency=0)
	  {
	  	$this->db->where('job_id',$job_id);
		$this->db->where('tw_status',0);
		$this->db->limit($frequency);
		$qr=$this->db->get('post_master');
		
		$ss=$qr->result_array();
		
		return $ss;
		
	  }
	 function get_tw_token($soc='')
	  {
	  	$this->db->where('social_id',$soc);
		$this->db->where('social_type','twitter');
		$qr=$this->db->get('social_accounts');
		
		$token=$qr->row_array();
		
		return $token;
	  }
	  
	  function get_update_tw_time($id='',$arr=array())
	  {
	  	$this->db->where('job_id',$id);
		$this->db->update('post_jobs',$arr);
	  }
	 function add_sync_log($id='',$arr=array())
	  {
		//echo "<pre>";print_r($arr);die;
		$this->db->insert('sync_log',$arr);
	  }
	 function update_tw_status($post_id='')
	 {
		// echo $post_id;die;
		 $arr=array(
		 	'tw_status'=>1
		 );
		 $this->db->where('post_id',$post_id);
		 $this->db->update('post_master',$arr);
	 }
 }	
?>