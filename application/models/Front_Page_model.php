<?php

class Front_Page_model extends CI_Model
 {
	 function add_feedback($arr=array())
	 {
		$this->db->insert('feedback',$arr);
	 }
	 
	  function add_contact($arr=array())
	 {
		
		$this->db->insert('contact',$arr);
	 }
	 

 }	
?>