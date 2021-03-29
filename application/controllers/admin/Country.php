<?php

class Country extends CI_Controller
 {
 	 function __construct()
	  {
	  	parent :: __construct();
		
		if($this->session->userdata('userdata')=='')
		 {
		 	redirect('admin/Login');
		 }
		
		$this->load->model('admin/Admin_model');
		$this->load->model('admin/Dashboard_model');
		$this->load->model('admin/Country_model');
	  }
	 
	 function index()
	  {
			 	
	  }
	  
	  
	 function add_country()
	  {
	  	$data=array();
		$this->load->library('form_validation');
		
		
	  	if($this->input->post())
		 {
		 	$this->form_validation->set_rules('country_code','Country_Code','required|numeric');
			$this->form_validation->set_rules('country_name','Country_Name','required|alpha');
			
			if($this->form_validation->run() == FALSE)
			 {
				$data['country_code']=set_value('country_code');
				$data['country_name']=set_value('country_name');			 	
			 }
			else
			 {
			 		$this->Country_model->add_country();
					redirect('admin/Country/add_country');
				 
		 	 }
		 }
	  	$this->load->view('admin/add_country');
	  }
	  
	  
	  
	 function view_country()
	  {
	  	$this->load->library('pagination');
		$per_page=9;
		$start=0;
		$start=$this->uri->segment(4);
		
		$config['uri_segment']=4;
		$config['per_page']=$per_page;
		$config['total_rows']=$this->Country_model->row_count();
		$config['base_url']=site_url('admin/Country/view_country');
		
		
		$config['full_tag_open']='<div class="pagination">';
		$config['full_tag_close']='</div>';
		$config['cur_tag_open']='<a class="active">';
		$config['full_tag_open']='</a>';
		
		
		
		
		$this->pagination->initialize($config);
		
	  	$arr['data']=$this->Country_model->select_rec($per_page,$start);
		 
		 
		$this->load->view('admin/view_country',$arr);
			
	  }
	  
	 function delete_country($country_code='')
	  {
	  	$this->Country_model->del_country($country_code);
	  }
	  
	 function update_country($country_code='')
	  {
	  	$arr=array();
	  	$up_data=$this->Country_model->update_country($country_code);
		
		
		$arr['country_code']=$up_data['country_code'];
		$arr['country_name']=$up_data['country_name'];
		
		$this->load->library('form_validation');
		
		if($this->input->post('submit'))
		 {
		 		$data=array();
				$data['country_code']=$this->input->post('country_code');
				$data['country_name']=$this->input->post('country_name');
		 
		 		$this->form_validation->set_rules('country_code','Country_Code','required|numeric');
				$this->form_validation->set_rules('country_name','Country_Name','required|alpha');
			
				if($this->form_validation->run() == FALSE)
				 {
					$data['country_code']=set_value('country_code');
					$data['country_name']=set_value('country_name');			 	
			 	 }
				else
			  	 {
			 		$this->Country_model->update($country_code,$data);
					redirect('admin/Country/add_country');
				 
		 	     }
		 }
		
		
		$this->load->view('admin/add_country',$arr);
		
	  }
	  
	  
	  
	 function logout()
	  {
	  	$this->session->sess_destroy();
		redirect('admin/Login');
	  }
 }	


?>