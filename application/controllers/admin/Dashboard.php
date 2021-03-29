<?php

class Dashboard extends CI_Controller
 {
 	 function __construct()
	  {
	  	parent :: __construct();
		
		if($this->session->userdata('userdata')=='')
		 {
		 	redirect('admin/Login');
		 }
		
		$this->load->model('admin/Dashboard_model');
	  }
	 function index()
	 {
		$this->load->view('admin/dashboard');
	 }
	 function adminprofile()
	 {
	 	$data=array();
	 		
			$up_data=array();
			$this->load->library('form_validation');
			
			
	  	 	$ses_id=$this->session->userdata('userdata');
			$data['userdata']=$this->Dashboard_model->getrec($ses_id);
			
			$up_data['name']=$data['userdata']['name'];
			$up_data['image']=$data['userdata']['image'];
			
			$up_data['userdata']=$data['userdata'];
		
			if($this->input->post('submit'))
		 	{
		 		$this->form_validation->set_rules('name','Name','required|alpha');
			
				$name=$this->input->post('name');
				$gender=$this->input->post('gender');
								 
				if($this->form_validation->run() == FALSE)
				 {	
					$up_data['name']=set_value('name');
					$up_data['image']=set_value('image');
				 }
				else
				 {
					if($_FILES['photo']['name']=='' && $data['userdata']['image']=='')
					 {
						$arr['file_err']="Please Select The Image";
					 }
					else
					 {
						$arr = array(
							'name'=>$name
						);	
						if(!empty($_FILES['photo']['name']))
						 {
						 
							 $config['upload_path']='./assets/admin/image/';
							 $config['allowed_types']='png|gif|jpg|jpeg';
							 $this->load->library('upload',$config);
							
							
							 if($this->upload->do_upload('photo'))
							  {
								$arr['image']=$this->upload->data('file_name');
								
								unlink('./assets/admin/image/'.$data['userdata']['image']);
									
							  }
							 else
							  {
								echo $this->upload->display_errors();
							  }
						 }
						
						$this->Dashboard_model->update_profile($ses_id,$arr);
						redirect('admin/Dashboard/index');
					 }
				 }	 
			 }
			 	if($this->input->post('cancel'))
			 	{
					redirect('admin/Dashboard/index');
				 } 
	
	 		$this->load->view('admin/profileuser',$up_data);
	 }
 }	


?>