 <?php
class User extends CI_Controller
 {
 	 function __construct()
	  {
	  	parent :: __construct();
		
		
		
		$this->load->helper('send_email');
		$this->load->model('user/User_model');
		$this->load->model('user/Dashboard_model');
	  }
	 
	 function index()
	  {
			 	
	  }
	  
	  
	 function add_user()
	  {
	  	$data=array();
		$this->load->library('form_validation');
		
		
	  	if($this->input->post('submit'))
		 {
		 	$this->form_validation->set_rules('name','Name','required|alpha');
			$this->form_validation->set_rules('email','Email','required|valid_email');
			$this->form_validation->set_rules('gender','Gender','required');
			$this->form_validation->set_rules('country','Country','required');
			$this->form_validation->set_rules('password','Password','required|min_length[8]|max_length[12]');
			$this->form_validation->set_rules('status','Status','required');
			
			$data['check_email']="";
			$email=$this->input->post('email');
			$flag=0;
			$get_email=$this->User_model->check_email($email);
			
			foreach($get_email as $mail)
			 {
			 	 if($email==$mail['email'])
				  {
				  	$flag=1;
				  }
			 }
			
			if($this->form_validation->run() == FALSE)
			 {
				$data['name']=set_value('name');
			 }
			else
			 {	
			 	if($flag==1)
				 {
					$data['check_email']="This Email Is Already Used Please Enter Another One";
				 }
				else
				 {
					if($_FILES['photo']['name']=='')
					 {
						$data['file_err']="Please Select The Image";
					 }
					else
					 {
						$this->User_model->add_user();
						redirect('user/Login/index');
0					 }
				 }
			 }
		 }
		if($this->input->post('cancel'))
		 {
			redirect('user/Login/index');
		 } 
		
		$data['country']=$this->User_model->get_country();
		 
	  	$this->load->view('user/add_user',$data);
	  }
	 
	 
	  
	function forgot()
	 {
	 	$data=array();
		$this->load->library('form_validation');
		
	 	if($this->input->post('submit'))
		 {
		 	$this->form_validation->set_rules('email','Email','required|valid_email');
		 	
			
			if($this->form_validation->run() == FALSE)
			 {
				$data['email']=set_value('email');
			 }
			else
			 {
				
				$email=$this->input->post('email');
			
				$random=rand(100000,999999);
				
				$get_row=$this->User_model->check_email_valid($email);
				
				//echo "<pre>";print_r($get_row);die;
				
				if(!empty($get_row))
				{
					
					$data['try_again']=send_email_helper($email,$random);
				}
				else
				{
					//echo "asasa";die;
					$data['invalid_email']="Entered Email Is Not Regestered";
				} 
			 }
		 }
		if($this->input->post('cancel'))
		 {
			redirect('user/Login/index');
		 }
		 
		 
	 	$this->load->view('user/forgotpassword',$data);
	 }	  
	 
	 function check_otp()
	  {
	  	$invalid_arr=array();
		
		$this->load->library('form_validation');
	  	
		if($this->input->post('submit'))
		 {
		 	$this->form_validation->set_rules('otp','OTP','required|numeric|exact_length[6]');
			
			if($this->form_validation->run() == FALSE)
			 {
				$invalid_arr['otp']=set_value('otp');
			 }
			else
			 {
			 	$txtotp=$this->input->post('otp');
				$chkotp=$this->session->userdata('otp');
				
				if($txtotp==$chkotp)
				 {
					$this->session->unset_userdata('otp');
					redirect('user/User/changepass');
				 }
				else
				 {
					$invalid_arr['invalid']="Invalid OTP";
				 }
			 }
		 }
		 if($this->input->post('cancel'))
		 {
		 	$this->session->unset_userdata('otp');
			redirect('user/Login/index');
		 }
		 
		 $this->load->view('user/otp',$invalid_arr);
	  }
	 function changepass()
	  {
	  	$data=array();
		
		$this->load->library('form_validation');
		
	  	if($this->input->post('submit'))
		 {
		 	$this->form_validation->set_rules('password','Password','required|min_length[8]|max_length[12]');
			$this->form_validation->set_rules('confirm_password','Confirm Password','required|min_length[8]|max_length[12]|matches[password]');
			
			if($this->form_validation->run() == FALSE)
			 {
				$data['password']=set_value('password');
				$data['confirm_password']=set_value('confirm_password');
			 }
			else
			 {
			 	$pass=$this->input->post('confirm_password');
			 	$user_mail=$this->session->userdata('email');
			 	$this->User_model->update_pass($user_mail,$pass);
				
				redirect('user/Login/index');
			 }
		 }
		if($this->input->post('cancel'))
		 {
		 	redirect('user/Login/index');
		 }
	  	$this->load->view('user/changepass',$data);
	  }
	  	
	
		 function profileuser($id='')
		 {
			$up_data=array();
	  		
			$this->load->library('form_validation');
	  	 	
			$ses_id=$this->session->userdata('normaluser');
			$data['userdata']=$this->Dashboard_model->getrec($ses_id);
			
			$up_data['name']=$data['userdata']['name'];
			$up_data['gender']=$data['userdata']['gender'];
			$up_data['image']=$data['userdata']['image'];
			
			$up_data['userdata']=$data['userdata'];
		
			if($this->input->post('submit'))
		 	{
		 		$this->form_validation->set_rules('name','Name','required|alpha');
				$this->form_validation->set_rules('gender','Gender','required');
			
				$name=$this->input->post('name');
				$gender=$this->input->post('gender');
								 
				if($this->form_validation->run() == FALSE)
				 {	
					$up_data['name']=set_value('name');
					$up_data['gender']=set_value('gender');
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
						
							'name'=>$name,
							'gender'=>$gender
						);	
						if(!empty($_FILES['photo']['name']))
						 {
						 
							 $config['upload_path']='./assets/user/image/';
							 $config['allowed_types']='png|gif|jpg|jpeg';
							 $this->load->library('upload',$config);
							
							
							 if($this->upload->do_upload('photo'))
							  {
								$arr['image']=$this->upload->data('file_name');
								
								unlink('./assets/user/image/'.$data['userdata']['image']);
									
							  }
							 else
							  {
								echo $this->upload->display_errors();
							  }
						 }
						
						$this->User_model->update_profile($ses_id,$arr);
						redirect('user/Dashboard/index');
					 }
				 }	 
			 }
			 	if($this->input->post('cancel'))
			 	{
					redirect('user/Dashboard/index');
				 } 
	
			$this->load->view('user/profileuser',$up_data);
	 }	
		  
	 function logout()
	  {
	  	$this->session->sess_destroy();
		redirect('Front_page/index');
	  }
 }	


?>