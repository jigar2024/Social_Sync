<?php

class Social_Post_model extends CI_Model
 { 
	 function get_social_data($per_page,$start)
	 {
		$this->db->limit($per_page,$start);
		$qry=$this->db->get('social_accounts');
		$arr=$qry->result_array();
		return $arr;
	  }
	
	function get_job_list($per_page,$start)
	 {
	  	
		$this->db->limit($per_page,$start);
		$qry=$this->db->get('post_jobs');
		$arr=$qry->result_array();
		return $arr;
	  }
	 
	  function job_row_count()
	  {
	 		$qry=$this->db->get('post_jobs');
			$num=$qry->num_rows();
			return $num;
	  }
	 
	 
	  
	  function get_post_list($job_id='')
	 {
	  	$this->db->where('job_id',$job_id);
		$qry=$this->db->get('post_master');
		$arr=$qry->result_array();
		return $arr;
	  }
	  
	  	  function get_target_id()
	  {
		$qry=$this->db->get('social_accounts');
		$arr=$qry->result_array();
		return $arr;
	  }
	  
	  function row_count()
	  {
	 		$qry=$this->db->get('social_accounts');
			$num=$qry->num_rows();
			return $num;
	  }
	  function del_soc_acc($account_id='')
	  {
			$this->db->where('account_id',$account_id);
			$this->db->delete('social_accounts');	
			redirect('admin/Social_Post/view_social_account');
	  }
	  

	  
	  
	  function sync_log_row_count($job_id='')
	  {
		  	
		  	$this->db->where('job_id',$job_id);
	 		$qry=$this->db->get('sync_log');
			$num=$qry->num_rows();
		
			return $num;
	  }	
	  
	  function del_sync_log($log_id='')
	  {
			$this->db->where('log_id',$log_id);
			$this->db->delete('sync_log');	
			redirect('admin/Social_Post/show_sync_log');
	  }
	  
	  function show_log_report($per_page='',$start='',$job_id='')
	  {
		 $this->db->limit($per_page,$start);
		
		 
		 $qr=$this->db->get('sync_log');
		
		 $res=$qr->result_array(); 
		 
	  }
	   function get_sync_log($job_id='',$per_page='',$start='')
	 {

		$this->db->limit($per_page,$start);
		$this->db->where('job_id',$job_id);
		$qry=$this->db->get('sync_log');
		$arr=$qry->result_array();
		
		return $arr;
	  }
	  
	 function update_sync_log_order($id='',$log='')
	  {
		  $arr=array(
		  	'sync_order'=>$log
		  );
		  $this->db->where('post_id',$id);
		  $this->db->update('post_master',$arr);
	  }
 }	
?>