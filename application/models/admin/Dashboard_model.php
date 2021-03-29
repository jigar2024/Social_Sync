<?php

class Dashboard_model extends CI_Model
 {
	 function getrec($id='')
	  {
	  	$this->db->where('id',$id);
		$qry=$this->db->get('admin');
		$arr=$qry->row_array();
		//echo $this->db->last_query();die;
		return $arr;
	  }
	 function update_profile($ses_id='',$arr)
	 {	
	 	$this->db->where('id',$ses_id);
		$this->db->update('admin',$arr);
		
	 
	 }
 }	
?>