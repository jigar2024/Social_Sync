<?php

class Social_Post_model extends CI_Model
 { 
	 function get_social_type($ses_id='')
	 {
	  	$this->db->where('user_id',$ses_id);
		$qry=$this->db->get('social_accounts');
		$arr=$qry->result_array();
		return $arr;
	  }
	 	 
	function add_jobs($content=array())
	{
		$this->db->insert('post_jobs',$content);
		$id=$this->db->insert_id();
		return $id;
	}
	
	function post_add($ps_arr=array())
	{
		$this->db->insert('post_master',$ps_arr);
	}
	
	function get_job_list($ses_id='',$per_page,$start)
	 {
	  	$this->db->where('user_id',$ses_id);
		$this->db->limit($per_page,$start);
		$qry=$this->db->get('post_jobs');
		$arr=$qry->result_array();
		return $arr;
	  }
	  
	  function get_post_list($job_id='')
	 {
	  	$this->db->where('job_id',$job_id);
		$qry=$this->db->get('post_master');
		$arr=$qry->row_array();
		return $arr;
	  }
	  function post_page($ses_id='')
	  {
	  	$this->db->where('user_id',$ses_id);
		$qry=$this->db->get('social_accounts');
		$arr=$qry->num_rows();
		return $arr;
	  }
	  function get_target_id($ses_id='')
	  {
	  	$this->db->where('user_id',$ses_id);
		$qry=$this->db->get('social_accounts');
		$arr=$qry->result_array();
		return $arr;
	  }
	  
	 function row_count($ses_id)
	 	{
			$this->db->where('user_id',$ses_id);
	 		$qry=$this->db->get('post_jobs');
			$num=$qry->num_rows();
			return $num;
	    }
	function check_for_social($ses_id='')
	 {
		$this->db->where('user_id',$ses_id);
	 	$qry=$this->db->get('social_accounts');
		
		return $qry->result_array();
	 }
 }	
?>