<?php

class City extends CI_Controller
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
		$this->load->model('admin/City_model');
	  }
	 
	 function index()
	  {
			 	
	  }
	  
	  
	 function add_city()
	  {
	  	
		$arr['state_data']=$this->City_model->get_state(); 
	  
	  	$data=array();
		$this->load->library('form_validation');
		
		
	  	if($this->input->post())
		 {
		 	$this->form_validation->set_rules('state_id','State_id','required|numeric');
			$this->form_validation->set_rules('city_name','City_Name','required|alpha');
			
			if($this->form_validation->run() == FALSE)
			 {
				$data['state_id']=set_value('state_id');
				$data['city_name']=set_value('city_name');			 	
			 }
			else
			 {
			 		$this->City_model->add_city();
					redirect('admin/City/add_city'); 
		 	 }
		 }
	  	$this->load->view('admin/add_city',$arr);
	  }
	  
	  
	  
	 function view_city()
	  {
	  	$this->load->library('pagination');
		$per_page=9;
		$start=0;
		$start=$this->uri->segment(4);
		
		$config['uri_segment']=4;
		$config['per_page']=$per_page;
		$config['total_rows']=$this->City_model->row_count();
		$config['base_url']=site_url('admin/City/view_city');
		
		
		$config['full_tag_open']='<div class="pagination">';
		$config['full_tag_close']='</div>';
		$config['cur_tag_open']='<a class="active">';
		$config['full_tag_open']='</a>';
		
		
		$this->pagination->initialize($config);
	  
	  
	  	$arr['state_data']=$this->City_model->get_state();
	  	$arr['data']=$this->City_model->select_rec($per_page,$start);
		 
		 
		$this->load->view('admin/view_city',$arr);
			
	  }
	  
	 function delete_city($id='')
	  {
	  	$this->City_model->del_state($id);
	  }
	  
	
	
	
	function update_city($city_id='')
	  {
	  	$arr=array();
	  	$arr['update']=$this->City_model->update_city($city_id);
		$arr['state_data']=$this->City_model->get_state();  
		
		$ss=$arr['update'];
		$arr['city_name']=$ss['city_name'];
		$arr['state_name']=$ss['state_name'];
		
		//echo "<pre>";
		//print_r($arr);die;
		
		$this->load->library('form_validation');
		
		
		if($this->input->post('submit'))
		 {
		 		$data=array();
				
				//print_r($this->input->post());die;
				
				$data['city_name']=$this->input->post('city_name');
		 
		 		//print_r($data);die;
				
				
				$this->form_validation->set_rules('state_id','State_Name','required');
				$this->form_validation->set_rules('city_name','City_Name','required|alpha');
			
			
				if($this->form_validation->run() == FALSE)
				 {
				 	$data['state_name']=set_value('state_id');
					$data['city_name']=set_value('city_name');			 	
			 	 
				 }
				else
			  	 {

			 		$this->City_model->update($city_id,$data);
					redirect('admin/City/add_city');
				 
		 	     }
		 }
		
		
		$this->load->view('admin/add_city',$arr);
	  }
	
	
	  
	  
	  
	  
	  
	 function logout()
	  {
	  	$this->session->sess_destroy();
		redirect('admin/Login');
	  }
	  
	 function get_state()
	  {
	  	$id=$this->input->post('id');
	  	$data['ss']=$this->City_model->get_state_select($id);
	  
	  	$this->load->view('admin/select_opt_rec_state',$data);
	  
	  }
	 
	 function re_view_city()
	 {
	 	$data['ss']=$this->City_model->get_again_state_select();
	  
	  	$this->load->view('admin/select_opt_rec_state_all',$data);
	 }
	 
	 
	  
	  
	  
 }	


?>