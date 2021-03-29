<?php

class State extends CI_Controller
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
		$this->load->model('admin/State_model');
	  }
	 
	 function index()
	  {
			 	
	  }
	  
	  
	 function add_state()
	  {
	  
		$arr['country_data']=$this->State_model->get_country();  
	  	
		
		
	  	$data=array();
		$this->load->library('form_validation');
		
		
		
	  	if($this->input->post())
		 {
		 	$this->form_validation->set_rules('country_code','Country_Code','required|numeric');
			$this->form_validation->set_rules('state_name','State_Name','required|alpha');
			
			if($this->form_validation->run() == FALSE)
			 {
				$data['country_code']=set_value('country_code');
				$data['state_name']=set_value('state_name');		 	
			 }
			else
			 {
			 		$this->State_model->add_state();
					redirect('admin/State/add_state');
				 
		 	 }
		 }
	  	$this->load->view('admin/add_state',$arr);
	  }
	  
	  
	  
	 function view_state()
	  {
	  	$this->load->library('pagination');
		$per_page=9;
		$start=0;
		$start=$this->uri->segment(4);
		
		$config['uri_segment']=4;
		$config['per_page']=$per_page;
		$config['total_rows']=$this->State_model->row_count();
		$config['base_url']=site_url('admin/State/view_state');
		
		
		$config['full_tag_open']='<div class="pagination">';
		$config['full_tag_close']='</div>';
		$config['cur_tag_open']='<a class="active">';
		$config['full_tag_open']='</a>';
		
		
		$this->pagination->initialize($config);
	  
	  
	  	$arr['country_data']=$this->State_model->get_country();
			
		$arr['data']=$this->State_model->select_rec($per_page,$start);
		//echo '<pre>';print_r($arr);die;
		 
		 
		$this->load->view('admin/view_state',$arr);
			
	  }
	  
	 function delete_state($id='')
	  {
	  	$this->State_model->del_state($id);
	  }
	  
	  
	  
	 function update_state($state_id='')
	  {
		$arr=array();
	  	$arr['update']=$this->State_model->update_state($state_id);
		$arr['country_data']=$this->State_model->get_country();  
		
		$ss=$arr['update'];
		$arr['state_name']=$ss['state_name'];
		$arr['country_name']=$ss['country_name'];
		
		
		$this->load->library('form_validation');
		
		if($this->input->post('submit'))
		 {
		 		$data=array();
				
				$data['state_name']=$this->input->post('state_name');
		 
		 		//print_r($data);die;
				
				
				$this->form_validation->set_rules('country_code','Country_Name','required');
				$this->form_validation->set_rules('state_name','State_Name','required|alpha');
			
				if($this->form_validation->run() == FALSE)
				 {
					$data['country_name']=set_value('country_code');
					$data['state_name']=set_value('state_name');			 	
			 	 
				 }
				else
			  	 {

			 		$this->State_model->update($state_id,$data);
					redirect('admin/State/add_state');
				 
		 	     }
		 }
		
		
		$this->load->view('admin/add_state',$arr);
	  }
	  
	  
	  
	  
	 function get_country()
	  {
	  	$id=$this->input->post('id');
		
		
	  	$data['ss']=$this->State_model->get_country_select($id);
	  
	  	$this->load->view('admin/select_opt_rec_country',$data);
	  
	  }
	  
	function re_view_state()
	 {
	 	$data['ss']=$this->State_model->get_again_country_select();
	  
	  	$this->load->view('admin/select_opt_rec_country_all',$data);
	 }

	  
	 function logout()
	  {
	  	$this->session->sess_destroy();
		redirect('admin/Login');
	  }
 }	


?>