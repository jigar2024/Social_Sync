
<?php


class Front_page extends CI_Controller
{
	function __construct()
	  {
	  	parent :: __construct();
		$this->load->model('Front_Page_model');
	  }
	 
	
	function index()
	{
		$this->load->view('front_page/index');
	}
	function about()
	{
		$this->load->view('front_page/about');
	}
	function contact()
	{
		
		$data=array();
		$this->load->library('form_validation');
		
		
	  	if($this->input->post('submit'))
		 {
			
		 	$this->form_validation->set_rules('first_name','First Name','required|alpha');
			$this->form_validation->set_rules('last_name','Last Name','required|alpha');
			$this->form_validation->set_rules('email','Email','required|valid_email');
			$this->form_validation->set_rules('message','Message','required');		
			
			if($this->form_validation->run() == FALSE)
			 {
				$data['first_name']=set_value('first_name');
				$data['last_name']=set_value('last_name');
				$data['email']=set_value('email');
				$data['message']=set_value('message');
			 }
			else
			 {	
			 	$first_name=$this->input->post('first_name');
				$last_name=$this->input->post('last_name');
				$email=$this->input->post('email');
				$message=$this->input->post('message');
				
				$arr=array(
				
					'first_name'=>$first_name,
					'last_name'=>$last_name,
					'email'=>$email,
					'message'=>$message
				);
				$this->Front_Page_model->add_contact($arr);
				redirect('front_page/index');
				
			 }
		 }

		
		$this->load->view('front_page/contact',$data);
	}
	function feedback()
	{
		$data=array();
		$this->load->library('form_validation');
		
		
	  	if($this->input->post('submit'))
		 {
		 	$this->form_validation->set_rules('name','Name','required|alpha');
			$this->form_validation->set_rules('email','Email','required|valid_email');
			$this->form_validation->set_rules('review','Review','required');		
			
			if($this->form_validation->run() == FALSE)
			 {
				$data['name']=set_value('name');
				$data['email']=set_value('email');
				$data['review']=set_value('review');
			 }
			else
			 {	
			 	$name=$this->input->post('name');
				$email=$this->input->post('email');
				$review=$this->input->post('review');
				$rating=$this->input->post('rating');
				$faq=$this->input->post('faq');
				$arr=array(
				
					'name'=>$name,
					'email'=>$email,
					'review'=>$review,
					'rating'=>$rating,
					'faq'=>$faq
				);
				$this->Front_Page_model->add_feedback($arr);
				redirect('front_page/index');
				
			 }
		 }
		
		$this->load->view('front_page/feedback',$data);
	}
	
	
}


?>