<?php

class Social_Post extends CI_Controller
 {
 	 function __construct()
	  {
	  	parent :: __construct();
		
		if($this->session->userdata('normaluser')=='')
		 {
		 	redirect('user/Login');
		 }
		 
		
		$this->load->model('user/Dashboard_model');
		$this->load->model('user/Social_Post_model');
		$this->load->model('user/Login_model');
	  }	 
	 
	 function index()
	 {
		$ses_id=$this->session->userdata('normaluser');	
		$data['userdata']=$this->Dashboard_model->getrec($ses_id);
		$data['acc_type']=$this->Social_Post_model->get_social_type($ses_id);
		$targ=$this->Social_Post_model->get_social_type($ses_id);
		
		$arr=array();
		
		$content=array();
		
		$ps_arr=array();
		
		if($this->input->post('send'))
		{

			$fb_target_id='';
			$gp_target_id='';
			$tw_target_id='';
			$tm_target_id='';
			$pi_target_id='';
			$li_target_id='';

			$is_fb_sync=0;
			$is_gp_sync=0;
			$is_tw_sync=0;
			$is_tm_sync=0;
			$is_pi_sync=0;
			$is_li_sync=0;
			
		 	$job_title=$this->input->post('job_title');
			
			$rr=$this->input->post('account_name[]');
			//print_r($rr);die;
			
			$new = array();
					
			foreach($rr as $cc)
			{
			
				$parts = explode('_',$cc);
				$arr[] = $parts[0];
				$new[]=$parts[1];				
			}
			
		 	$target_ids=implode(',',$new);
			
			//echo "<pre>";print_r($new);die;
			
			foreach($new as $new_row)
			 {
			 	foreach($targ as $targ_row)
				{
					if($new_row==$targ_row['social_id']&&$targ_row['social_type']=='facebook')
					{
						$fb_target_id=$new_row;
					}
					if($new_row==$targ_row['social_id']&&$targ_row['social_type']=='google')
					{
						$gp_target_id=$new_row;
					}
					if($new_row==$targ_row['social_id']&&$targ_row['social_type']=='twitter')
					{
						$tw_target_id=$new_row;
					}	
					if($new_row==$targ_row['url']&&$targ_row['social_type']=='tumblr')
					{
						$tm_target_id=$new_row;
					}
					if($new_row==$targ_row['social_id']&&$targ_row['social_type']=='pinterest')
					{
						$pi_target_id=$new_row;
					}
					if($new_row==$targ_row['social_id']&&$targ_row['social_type']=='linkedin')
					{
						$li_target_id=$new_row;
					}
				}
			 }
			
			$sync_interval=$this->input->post('interval');
			$sync_frequency=$this->input->post('frequency');
			
			
			
			if(in_array('facebook',$arr))
			 {
			 	$is_fb_sync=1;
			 }
			if(in_array('twitter',$arr))
			 {
			 	$is_tw_sync=1;
			 }
			if(in_array('linkedin',$arr))
			 {
			 	$is_li_sync=1;
			 }
			if(in_array('google',$arr))
			 {
			 	$is_gp_sync=1;
			 }
			if(in_array('tumblr',$arr))
			 {
			 	$is_tm_sync=1;
			 }
			if(in_array('pinterest',$arr))
			 {
			 	$is_pi_sync=1;
			 }
			
			$fb_last_sync_time=date('Y-m-d H:i:s');
			$gp_last_sync_time=date('Y-m-d H:i:s');
			$tw_last_sync_time=date('Y-m-d H:i:s');
			$tm_last_sync_time=date('Y-m-d H:i:s');
			$pi_last_sync_time=date('Y-m-d H:i:s');
			$li_last_sync_time=date('Y-m-d H:i:s');
			
			$job_status=1;
			
			$creation_time=date('Y-m-d H:i:s');
		
			
			$content=array(
					'job_title'=>$job_title,
					'user_id'=>$this->session->userdata('normaluser'),
					'target_ids'=>$target_ids,
					'fb_target_id'=>$fb_target_id,
					'gp_target_id'=>$gp_target_id,
					'tw_target_id'=>$tw_target_id,
					'tm_target_id'=>$tm_target_id,
					'pi_target_id'=>$pi_target_id,
					'li_target_id'=>$li_target_id,
					'sync_interval'=>$sync_interval,
					'sync_frequency'=>$sync_frequency,
					'is_fb_sync'=>$is_fb_sync,
					'is_gp_sync'=>$is_gp_sync,
					'is_tw_sync'=>$is_tw_sync,
					'is_tm_sync'=>$is_tm_sync,
					'is_pi_sync'=>$is_pi_sync,
					'is_li_sync'=>$is_li_sync,
					'fb_last_sync_time'=>$fb_last_sync_time,
					'gp_last_sync_time'=>$fb_last_sync_time,
					'tw_last_sync_time'=>$fb_last_sync_time,
					'tm_last_sync_time'=>$fb_last_sync_time,
					'pi_last_sync_time'=>$fb_last_sync_time,
					'li_last_sync_time'=>$fb_last_sync_time,
					'job_status'=>$job_status,
					'creation_time'=>$creation_time						
			);
			
			$jobid=$this->Social_Post_model->add_jobs($content);		
		
		
			$post_desc=$this->input->post('add_post');
			
			$config['upload_path']='./assets/user/post_image/';
			$config['allowed_types']='png|gif|jpg|jpeg';
			$this->load->library('upload',$config);
			if($this->upload->do_upload('post_image'))
			{
				$content['post_image']=$this->upload->data('file_name');	
			}
			else
			{
				echo $this->upload->display_errors();
			}
			$fb_status=0;
			$gp_status=0;
			$tw_status=0;
			$tm_status=0;
			$li_status=0;
			$pi_status=0;			
			$sync_time=date('Y-m-d H:i:s');
			
			$ps_arr=array(
			
					'job_id'=>$jobid,
					'post_desc'=>$post_desc,
					'post_image'=>$content['post_image'],
					'fb_status'=>$fb_status,
					'gp_status'=>$gp_status,
					'tw_status'=>$tw_status,
					'tm_status'=>$tm_status,
					'li_status'=>$li_status,
					'pi_status'=>$pi_status,
					'sync_time'=>$sync_time
			);
			
			$this->Social_Post_model->post_add($ps_arr);
			
		}	
		$this->load->view('user/social_post',$data);
	 }
	
	function view_job_list()
	{
		
		$ses_id=$this->session->userdata('normaluser');	
		$data['userdata']=$this->Dashboard_model->getrec($ses_id);
		
		$this->load->library('pagination');
		$per_page=3;
		$start=0;
		$start=$this->uri->segment(4);
		
		$config['uri_segment']=4;
		$config['per_page']=$per_page;
		$config['total_rows']=$this->Social_Post_model->row_count($ses_id);
		$config['base_url']=site_url('user/Social_Post/view_job_list');
		
		$config['full_tag_open']='<div class="pagination">';
		$config['full_tag_close']='</div>';
		$config['cur_tag_open']='<a class="active">';
		$config['full_tag_open']='</a>';
		
		$this->pagination->initialize($config);
	
		$data['jobdata']=$this->Social_Post_model->get_job_list($ses_id,$per_page,$start);
		$data['getdata']=$this->Social_Post_model->get_target_id($ses_id);
		
		
		
		$this->load->view('user/social_job_list',$data);
	} 
	 
	function show_post($job_id='')
	{	
		$ses_id=$this->session->userdata('normaluser');	
		$data['userdata']=$this->Dashboard_model->getrec($ses_id);
		$data['postdata']=$this->Social_Post_model->get_post_list($job_id);
		$data['check_for_social']=$this->Social_Post_model->check_for_social($ses_id);
		$this->load->view('user/social_post_list',$data);
	}

	function add_post_page()
	{
		$ses_id=$this->session->userdata('normaluser');	
		$data['userdata']=$this->Dashboard_model->getrec($ses_id);
		
		$post_row=$this->Social_Post_model->post_page($ses_id);
		
		if($post_row==0)
		{
			redirect('user/Dashboard/index/modal');
		}
		else
		{
			redirect('user/Social_Post/index');
		}
	}
	
	
  }	


?>