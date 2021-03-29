<?php

class State_model extends CI_Model
 {
 	 function get_country()
	  {
		 $qry=$this->db->get('country');
		 $cc=$qry->result_array();
		 return $cc;
	  }
	  
	 function add_state()
	  {
	  	 $country_code=$this->input->post('country_code');
		 $state_name=$this->input->post('state_name');
		 
		 $arr=array('country_code'=>$country_code,'state_name'=>$state_name);
		 
			
		$this->db->insert('state',$arr);
		
	  }
	  
	 function del_state($state_id='')
	  {
	  	$this->db->where('state_id',$state_id);
		$this->db->delete('state');
		redirect('admin/State/view_state');
	  } 
	  
	  
	  
	 function update_state($state_id='')
	  {
	  	$this->db->join('country','state.country_code=country.country_code');
	  	$this->db->where('state.state_id',$state_id);
		
		
		$qr=$this->db->get('state');
		//print_r($this->db->last_query());die;
		$up_data=$qr->row_array();
	  	
		return $up_data;
	  
	  }
	  
	 function update($state_id='',$data)
	  {
	  	$this->db->where('state_id',$state_id);
		$this->db->update('state',$data);

	  }
	  
	  
	  
	  
	 
	
	
	function get_country_select($id='')
	 {
	  
	  	$this->db->join('country','country.country_code=state.country_code');
	  	$this->db->where('country.country_code',$id);
		$qry=$this->db->get('state');

		return $qry->result_array();
	 }
	 
	function get_again_country_select()
	 {
		 $this->db->join('country','state.country_code=country.country_code');
	  	 $qry=$this->db->get('state');
		 
		 return $qry->result_array();
	 }
	 
	function row_count()
	 {
	 	$qry=$this->db->get('state');
		$num=$qry->num_rows();
		return $num;
	 }
	 
	function select_rec($per_page='',$start='')
	  {
	  	 
	  	 $this->db->join('country','state.country_code=country.country_code');
		 $this->db->limit($per_page,$start);
		 $qry=$this->db->get('state');
		 
		 return $qry->result_array();
	  }	 
 }	
?>