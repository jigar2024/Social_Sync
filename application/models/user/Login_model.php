<?php

class Login_model extends CI_Model
 {
	 function login()
	  {
		 $email=$this->input->post('email');
		 $password=$this->input->post('password');
			
		 $this->db->where('email',$email);
		 $this->db->where('password',$password);
		 
		 $qr=$this->db->get('user');
		 
		 
		 return $qr;
			
	  }
	  
	 function add_social_data($userdata=array())
	  {
	  	$social_id=$userdata['social_id'];
		
		$qry=$this->db->get_where('social_accounts',array('social_id'=>$social_id));
		//echo $this->db->last_query();die;
		if($qry->num_rows()==1)
		 {
		 
		 	$res = $qry->row_array();
		 	$this->db->where('account_id',$res['account_id']);
			$this->db->update('social_accounts',$userdata);
		 }
		else
		 {
		 	$this->db->insert('social_accounts',$userdata);
		 }
		 redirect('user/Social_Post/index');
	  }
	  
	 function add_social_data_tumblr($userdata=array())
	  {
	  	$url=$userdata['url'];
		
		$qry=$this->db->get_where('social_accounts',array('url'=>$url));
		//echo $this->db->last_query();die;
		if($qry->num_rows()==1)
		 {
		 
		 	$res = $qry->row_array();
		 	$this->db->where('account_id',$res['account_id']);
			$this->db->update('social_accounts',$userdata);
		 }
		else
		 {
		 	$this->db->insert('social_accounts',$userdata);
		 }
		 redirect('user/Social_Post/index');
	  }
	  function add_fb_likes_data($data_page=array())
	  {
		  $this->db->where('page_id',$data_page['page_id']);
		  $this->db->where('page_type','likes_page');
		  $qry=$this->db->get('social_pages');
		  
			  if($qry->num_rows()!=0)
			   {
				   
				 $this->db->where('page_id',$data_page['page_id']);
				 $this->db->where('page_type','likes_page');
				 $this->db->update('social_pages',$data_page);
			   }
			  else
			   {
				  $this->db->insert('social_pages',$data_page);
			   }
	  
	  }
	  
	  function add_fb_accounts_data($data_accounts=array())
	  {
		  $this->db->where('page_id',$data_accounts['page_id']);
		  $this->db->where('page_type',$data_accounts['page_type']);
		  $qry=$this->db->get('social_pages');
		  
		  
		 // echo "<pre>";print_r($qry->num_rows());die;
			  if($qry->num_rows()!=0)
			   {
				 // echo "sadsdas";die;
				 $this->db->where('page_id',$data_accounts['page_id']);
				 $this->db->where('page_type','own_page');
				 $this->db->update('social_pages',$data_accounts);
			   }
			  else
			   {
				  $this->db->insert('social_pages',$data_accounts);
			   }
	  }
	   function add_fb_groups_data($data_groups=array())
	  {
		$this->db->where('page_id',$data_groups['page_id']);
		  $this->db->where('page_type','own_group');
		  $qry=$this->db->get('social_pages');
		  
			  if($qry->num_rows()!=0)
			   {
				 $this->db->where('page_id',$data_groups['page_id']);
				 $this->db->update('social_pages',$data_groups);
			   }
			  else
			   {
				  $this->db->insert('social_pages',$data_groups);
			   }
	  }
 }	
?>