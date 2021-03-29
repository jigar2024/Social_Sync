<?php

class Dashboard_model extends CI_Model
 {
	 function getrec($id='')
	  {
	  	$this->db->where('id',$id);
		$qry=$this->db->get('user');
		$arr=$qry->row_array();
		return $arr;
	  }
	  
	 function update_profile($ses_id='')
	 {
		$name=$this->input->post('name');
		$gender=$this->input->post('gender');
	 	$this->db->where('id',$ses_id);
		$this->db->update('user',$arr);

		redirect('admin/Dashboard/index');
	 
	 }
	 
	 function getrec_social($ses_id='',$per_page,$start)
	 {
	  	$this->db->where('user_id',$ses_id);
		$this->db->limit($per_page,$start);
		$qry=$this->db->get('social_accounts');
		$arr=$qry->result_array();
		return $arr;
	  }
	  
	  function remove_acc($social_id='')
	  {
	  	
	  		$this->db->where('social_id',$social_id);
			$this->db->delete('social_accounts');
		 
		redirect('user/Dashboard/acc_list');
	  }
	 	
	   function row_count($ses_id)
	 	{
			$this->db->where('user_id',$ses_id);
	 		$qry=$this->db->get('social_accounts');
			$num=$qry->num_rows();
			return $num;
	    }	
	 
	  function select_rec($per_page='',$start='')
	  {
	  	
	  	
		 $this->db->limit($per_page,$start);
	  	 $qry=$this->db->get('social_accounts');
		 //echo $this->db->last_query();die;
		 return $qry->result_array();
	  }
	 	 
 }	
?>