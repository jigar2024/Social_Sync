<?php

class Login_model extends CI_Model
 {
	 function login()
	  {
		 $email=$this->input->post('email');
		 $password=$this->input->post('password');
			
		 $this->db->where('email',$email);
		 $this->db->where('password',$password);
		 
		 $qr=$this->db->get('admin');
		 
		 
		 return $qr;
			
	  }
 }	
?>