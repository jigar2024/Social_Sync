<?php

class Login extends CI_Controller
 {
 	 function __construct()
	  {
	  	parent :: __construct();
		
		if($this->session->userdata('userdata')!='')
		 {
		 	redirect('admin/Dashboard');
		 }
		
		
		$this->load->model('admin/Login_model');
	  }
	 
	 function index()
	 {
	 	$logerr=array();
	 	if($this->input->post())
		 {
		 
			$qr=$this->Login_model->login();
			
			$num=$qr->num_rows();
			
			if($num==1)
			 {
			 	$arr=$qr->row_array();
			 	$id=$arr['id'];
			 	$this->session->set_userdata('userdata',$id);
			 	redirect('admin/Dashboard');
			 }
			else
			 {
			 	$logerr['invalid']="invalid username or password";
			 	$this->load->view('admin/login',$logerr);
			 }
		 }
		$this->load->view('admin/login');
	 }
	 
	
 }	


?>