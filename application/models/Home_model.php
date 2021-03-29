<?php

class Home_model extends CI_Model
 {
	 function insertdata()
	 {
	 	$name=$this->input->post('name');
		$mobile=$this->input->post('mobile');
		$email=$this->input->post('email');
		$password=$this->input->post('password');
		
		$arr=array('name'=>$name,'mobile'=>$mobile,'email'=>$email,'password'=>$password);
		
		$this->db->insert('reg',$arr);
	 }
	 
	function viewdata($per_page=3,$start=0)
	 {
	 	$this->db->limit($per_page,$start);
		$qry =$this->db->get('reg');
		$arr=$qry->result_array();
		
		return $arr;
	 }
	 
	function row_count()
	 {
	 	$qry=$this->db->get('reg');
		$num=$qry->num_rows();
		return $num;
	 }
	
	
	function delete_data($id='')
	 {
	 	$this->db->where('id',$id);
		$this->db->delete('reg');
		redirect('Home/view_data');
	 }
	function select($id='')
	 {
	 	$this->db->where('id',$id);
		$qry=$this->db->get('reg');
	 	$arr=$qry->row_array();
		return $arr;
	 }
	function update_data($id='')
	 {
	 	$name=$this->input->post('name');
		$mobile=$this->input->post('mobile');
		$email=$this->input->post('email');
		$password=$this->input->post('password');
		
		$arr=array('name'=>$name,'mobile'=>$mobile,'email'=>$email,'password'=>$password);
		
		
		$this->db->where('id',$id);
		$this->db->update('reg',$arr);
		
		redirect('Home/view_data');
		
	 }
 }	
?>