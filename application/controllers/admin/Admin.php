<?php

class Admin extends CI_Controller
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
	  }
	 
	 function index()
	  {
			 	
	  }
	  
	  
	 function add_admin()
	  {
	  	$data=array();
		$this->load->library('form_validation');
		
		
	  	if($this->input->post())
		 {
		 	$this->form_validation->set_rules('name','Name','required|alpha');
			$this->form_validation->set_rules('email','Email','required|valid_email');
			$this->form_validation->set_rules('password','Password','required|min_length[8]|max_length[12]');
			$this->form_validation->set_rules('photo','Photo','required');
			
			
			if($this->form_validation->run() == FALSE)
			 {
			 
			 	
			 	
			 }
			else
			 {
			 	
				if($_FILES['photo']['name']=='')
				 {
				 	$arr['file_err']="Please Select The Image";
				 }
				else
				 {
			 		//print_r($_FILES);die;
			 		$this->Admin_model->add_admin();
					redirect('admin/Admin/add_admin');
				 }
		 	 }
		 }
	  	$this->load->view('admin/add_admin');
	  }
	  
	  
	  
	 function view_admin()
	  {
	  	$this->load->library('pagination');
		$per_page=4;
		$start=0;
		$start=$this->uri->segment(4);
		
		$config['uri_segment']=4;
		$config['per_page']=$per_page;
		$config['total_rows']=$this->Admin_model->row_count();
		$config['base_url']=site_url('admin/Admin/view_admin');
		
		
		$config['full_tag_open']='<div class="pagination">';
		$config['full_tag_close']='</div>';
		$config['cur_tag_open']='<a class="active">';
		$config['full_tag_open']='</a>';
		
		
		
		
		$this->pagination->initialize($config);
		
		
	  	$arr['data']=$this->Admin_model->select_rec($per_page,$start);
		 
		 
		$this->load->view('admin/view_admin',$arr);
			
	  }
	  
	 function delete_admin($id='')
	  {
	  	$this->Admin_model->del_admin($id);
	  }
	  
	  
	  
	 function update_admin($id='')
	  {
	  	$data=array();
	  	$this->load->library('form_validation');
	  	
		$up_data=$this->Admin_model->update_admin($id);
		
		$data['name']=$up_data['name'];
		$data['email']=$up_data['email'];
		$data['password']=$up_data['password'];
		$data['image']=$up_data['image'];
		
		
		if($this->input->post('submit'))
		 {
		 	$this->form_validation->set_rules('name','Name','required|alpha');
			$this->form_validation->set_rules('email','Email','required|valid_email');
			$this->form_validation->set_rules('password','Password','required|min_length[8]|max_length[12]');
		 
		 
		 	$name=$this->input->post('name');
			$email=$this->input->post('email');
			$password=$this->input->post('password');
		 
		 	if($this->form_validation->run() == FALSE)
			 {	
			 	$data['name']=set_value('name');
				$data['email']=set_value('email');
				$data['password']=set_value('password');
				$data['image']=set_value('image');
			 }
			else
			 {
			 	if($_FILES['photo']['name']=='' && $up_data['image']=='')
				 {
				 	$arr['file_err']="Please Select The Image";
				 }
				else
				 {
			 		$arr = array(
					
						'name'=>$name,
						'email'=>$email,
						'password'=>$password
					);
					
					if(!empty($_FILES['photo']['name']))
					 {
					 
					 	 $config['upload_path']='./assets/admin/image/';
						 $config['allowed_types']='png|gif|jpg|jpeg';
						 $this->load->library('upload',$config);
						
						
						 if($this->upload->do_upload('photo'))
						  {
							$arr['image']=$this->upload->data('file_name');
							
							unlink('./assets/admin/image/'.$data['image']);
								
						  }
						 else
						  {
							echo $this->upload->display_errors();
						  }
					 }
					
			 		$this->Admin_model->up_admin($id,$arr);
					redirect('admin/Admin/add_admin');
				 }
			 }
		 
		 }
		
		
		$this->load->view('admin/add_admin',$data);
		
	  }



	 function logout()
	  {
	  	$this->session->sess_destroy();
		redirect('admin/Login');
	  }
 }	


?>