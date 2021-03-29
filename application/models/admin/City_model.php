<?php

class City_model extends CI_Model
 {
 	 function get_state()
	  {
		 $qry=$this->db->get('state');
		 $cc=$qry->result_array();
		 return $cc;
	  }
	  
	 function add_city()
	  {
	  	 $state_id=$this->input->post('state_id');
		 $city_name=$this->input->post('city_name');
		 
		 $arr=array('state_id'=>$state_id,'city_name'=>$city_name);
		 
			
		$this->db->insert('city',$arr);
		
	  }
	  
	 function del_city($city_id='')
	  {
	  	$this->db->where('city_id',$city_id);
		$this->db->delete('city');
		redirect('admin/City/view_city');
	  } 
	  
	  
	  
	  
	  function update_city($city_id='')
	  {
	  	$this->db->join('state','city.state_id=state.state_id');
	  	$this->db->where('city.city_id',$city_id);
		
		
		$qr=$this->db->get('city');
		//print_r($this->db->last_query());die;
		$up_data=$qr->row_array();
	  	
		return $up_data;
	  
	  }
	  
	  
	  function update($city_id='',$data)
	  {
	  
	  	$this->db->where('city_id',$city_id);
		$this->db->update('city',$data);
		
	  }
	  
	 function get_state_select($id='')
	  {
	  	$this->db->join('state','state.state_id=city.state_id');
	  	$this->db->where('state.state_id',$id);
		$qry=$this->db->get('city');
	  
		return $qry->result_array();
	  }

	
	function get_again_state_select()
	 {
		$this->db->join('state','state.state_id=city.state_id');
	  	$qry=$this->db->get('city');
		 
		return $qry->result_array( );
	 }


	function row_count()
	 {
	 	$qry=$this->db->get('city');
		$num=$qry->num_rows();
		return $num;
	 }
	 
	function select_rec($per_page='',$start='')
	  {
	  	 $this->db->join('state','city.state_id=state.state_id');
	  	  $this->db->limit($per_page,$start);
		 $qry=$this->db->get('city');
		 
		 return $qry->result_array( );
	  }

	 
 }	
 
?>