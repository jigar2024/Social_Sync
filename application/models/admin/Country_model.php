<?php

class Country_model extends CI_Model
 {
	 function add_country()
	  {
	  	 $country_code=$this->input->post('country_code');
		 $country_name=$this->input->post('country_name');
		 
		 $arr=array('country_code'=>$country_code,'country_name'=>$country_name);
		 
			
		$this->db->insert('country',$arr);
		
	  }
	  
	 function del_country($country_code='')
	  {
	  	$this->db->where('country_code',$country_code);
		$this->db->delete('country');
		redirect('admin/Country/view_country');
	  } 
	  
	  
	 function update_country($country_code='')
	  {
	  	$this->db->where('country_code',$country_code);

		$qr=$this->db->get('country');
		$up_data=$qr->row_array();
	  	
		return $up_data;
	  
	  }
	 function update($country_code,$data)
	  {
	  	$this->db->where('country_code',$country_code);
		$this->db->update('country',$data);
		
	  }
	  
	  
	 function row_count()
	 {
	 	$qry=$this->db->get('country');
		$num=$qry->num_rows();
		return $num;
	 }
	  
	 function select_rec($per_page='',$start='')
	  {
	  	 $this->db->limit($per_page,$start);
	  	 $qry=$this->db->get('country');
		 
		 return $qry->result_array();
	  }
	 
 }	
?>