
<?php

class Social_Post extends CI_Controller
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
		$this->load->model('admin/Social_Post_model');
	  }	 
	 
	 function index()
	 {
		
	 }
	 
	 function view_social_account()
	 {
		 
		$this->load->library('pagination');
		$per_page=4;
		$start=0;
		$start=$this->uri->segment(4);
		
		$config['uri_segment']=4;
		$config['per_page']=$per_page;
		$config['total_rows']=$this->Social_Post_model->row_count();
		
		$config['base_url']=site_url('admin/Social_Post/view_social_account');
		
		
		$config['full_tag_open']='<div class="pagination">';
		$config['full_tag_close']='</div>';
		$config['cur_tag_open']='<a class="active">';
		$config['full_tag_open']='</a>';
		
		$this->pagination->initialize($config);
	 
		 $data['soc_data']=$this->Social_Post_model->get_social_data($per_page,$start);
		 $this->load->view('admin/view_social_account',$data);
	 }
	 
	 function delete_social_account($account_id='')
	 {
		$this->Social_Post_model->del_soc_acc($account_id);
	 }
	
	function view_job_list()
	{
		
		
		$this->load->library('pagination');
		$per_page=3;
		$start=0;
		$start=$this->uri->segment(4);
		
		$config['uri_segment']=4;
		$config['per_page']=$per_page;
		$config['total_rows']=$this->Social_Post_model->job_row_count();
		$config['base_url']=site_url('admin/Social_Post/view_job_list');
		
		$config['full_tag_open']='<div class="pagination">';
		$config['full_tag_close']='</div>';
		$config['cur_tag_open']='<a class="active">';
		$config['full_tag_open']='</a>';
		
		$this->pagination->initialize($config);
	
		$data['jobdata']=$this->Social_Post_model->get_job_list($per_page,$start);
		$data['getdata']=$this->Social_Post_model->get_target_id();
		
		
		$this->load->view('admin/social_job_list',$data);
	} 
	 
	function show_post($job_id='')
	{	
		//echo "heloow";die;
		$items=$this->input->post('item');
		$total_items=count($this->input->post('item'));
		for($item = 0;$item<$total_items;$item++)
		{
			$data = array(
				'log_id' =>$items[$item],
				'sync_order' => $item+1
			);
			
		   $this->db->where('log_id', $data['log_id']);
		   $this->db->update('post_master', array('sync_order'=> $data['sync_order']));
		   echo $this->db->last_query();die;
		}
	
		$data['postdata']=$this->Social_Post_model->get_post_list($job_id);	
		$this->load->view('admin/social_post_list',$data);
	}
	
	function delete_sync_log($log_id='')
	{
		$this->Social_Post_model->del_sync_log($log_id);
	}
	function sync_log_report($job_id='')
	{
		
		$this->load->library('pagination');
		$per_page=4;
		$start=0;
		$start=$this->uri->segment(5);
		
		$config['uri_segment']=5;
		$config['per_page']=$per_page;
		$config['total_rows']=$this->Social_Post_model->sync_log_row_count($job_id);
		
		$config['base_url']=site_url('admin/Social_Post/sync_log_report/'.$job_id);
		
		$config['full_tag_open']='<div class="pagination">';
		$config['full_tag_close']='</div>';
		$config['cur_tag_open']='<a class="active">';
		$config['full_tag_open']='</a>';
		
		$this->pagination->initialize($config);
		
		$data['soc_sync']=$this->Social_Post_model->get_sync_log($job_id,$per_page,$start);
		

		$this->load->view('admin/view_sync_log',$data);
	}
	
	function update_sync_log_order()
	 {
		$id=$this->input->post('post_id');
		$log=$this->input->post('sync_log');
		
		$this->Social_Post_model->update_sync_log_order($id,$log);
	 }
}	

?>
