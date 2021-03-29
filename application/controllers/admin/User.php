 <?php

class User extends CI_Controller
 {
 	 function __construct()
	  {
	  	parent :: __construct();
		
		if($this->session->userdata('userdata')=='')
		 {
		 	redirect('admin/Login');
		 }
		
		$this->load->model('admin/User_model');
		$this->load->model('admin/Dashboard_model');
	  }
	 
	 function index()
	  {
			 	
	  }
	  
	  
	 function add_user()
	  {
	  	$data=array();
		$this->load->library('form_validation');
		
		
	  	if($this->input->post())
		 {
		 	$this->form_validation->set_rules('name','Name','required|alpha');
			$this->form_validation->set_rules('email','Email','required|valid_email');
			$this->form_validation->set_rules('gender','Gender','required');
			$this->form_validation->set_rules('country','Country','required');
			$this->form_validation->set_rules('password','Password','required|min_length[8]|max_length[12]');
			$this->form_validation->set_rules('status','Status','required');
			
			if($this->form_validation->run() == FALSE)
			 {
			 	$data['name']=set_value('name');
				$data['email']=set_value('email');
				$data['gender']=set_value('gender');
			 	$data['country']=set_value('country');
				$data['password']=set_value('password');
			 
			 }
			else
			 {
			 	
				if($_FILES['photo']['name']=='')
				 {
				 	$data['file_err']="Please Select The Image";
				 }
				else
				 {
				 	
			 		//print_r($_FILES);die;
			 		$this->User_model->add_user();
					redirect('admin/User/add_user');
				 }
		 	 }
		 }
		 
		
		$data['country']=$this->User_model->get_country();
		 
	  	$this->load->view('admin/add_user',$data);
	  }
	  
	  
	  
	 function view_user()
	  {
	  
	  
	  	$this->load->library('pagination');
		$per_page=4;
		$start=0;
		$start=$this->uri->segment(4);
		
		$config['uri_segment']=4;
		$config['per_page']=$per_page;
		$config['total_rows']=$this->User_model->row_count();
		$config['base_url']=site_url('admin/User/view_user');
		
		
		$config['full_tag_open']='<div class="pagination">';
		$config['full_tag_close']='</div>';
		$config['cur_tag_open']='<a class="active">';
		$config['full_tag_open']='</a>';
		
		
		
		
		$this->pagination->initialize($config);
	  
	  
	  
	  
	  
	  	$arr['data']=$this->User_model->select_rec($per_page,$start);
		 
		 
		$this->load->view('admin/view_user',$arr);
			
	  }
	  
	 function delete_user($id='')
	  {
	  	$this->User_model->del_user($id);
	  }


	  
	 function update_user()
	  {
	  		$id=$this->uri->segment(4);
	 		
			 $status=$this->uri->segment(5);
			
	  		$this->User_model->up_user($id,$status);
	  }

	 function logout()
	  {
	  	$this->session->sess_destroy();
		redirect('user/Login');
	  }
 }	


?>