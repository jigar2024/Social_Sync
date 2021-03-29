<?php

class Linkedin_post_model extends CI_Model
 {
	 function get_all_li_rec()
	  {
	  	//$this->db->where('user_id',$ses_id);
		$this->db->where('is_li_sync',1);
		$this->db->where('job_status',1);
		$qr=$this->db->get('post_jobs');
		$content=$qr->result_array();
		return $content;
		
	  }
	 function get_all_post_li($job_id='',$frequency=0)
	  {
	  	$this->db->where('job_id',$job_id);
		$this->db->where('li_status',0);
		$this->db->limit($frequency);
		$qr=$this->db->get('post_master');
		
		$ss=$qr->result_array();
		
		return $ss;
		
	  }
	 function get_li_token($soc='')
	  {
	  	$this->db->where('social_id',$soc);
		$this->db->where('social_type','linkedin');
		$qr=$this->db->get('social_accounts');
		
		$token=$qr->row_array();
		
		return $token['token'];
	  }
	  
	  function get_update_li_time($id='',$arr=array())
	  {
	  	$this->db->where('job_id',$id);
		$this->db->update('post_jobs',$arr);
	  }
	 function add_sync_log($id='',$arr=array())
	  {
	  	$this->db->where('job_id',$id);
		$this->db->insert('sync_log',$arr);
	  }
	 function update_li_status($post_id='')
	 {
		// echo $post_id;die;
		 $arr=array(
		 	'li_status'=>1
		 );
		 $this->db->where('post_id',$post_id);
		 $this->db->update('post_master',$arr);
	 }
 }	
?>