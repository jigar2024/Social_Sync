<?php

class User_model extends CI_Model
 {
	 function add_user()
	  {
	  	 $name=$this->input->post('name');
		 $email=$this->input->post('email');
		 $gender=$this->input->post('gender');
		 $country=$this->input->post('country');
		 $password=$this->input->post('password');
		 $status=$this->input->post('status');
		 		 
		 
		 $arr=array('name'=>$name,'email'=>$email,'gender'=>$gender,'country'=>$country,'password'=>$password,'status'=>$status);
		 
		 
		 
		 $config['upload_path']='./assets/user/image/';
		 $config['allowed_types']='png|gif|jpg|jpeg';
	 	 $this->load->library('upload',$config);
		
		
		 if($this->upload->do_upload('photo'))
		  {
		  	$arr['image']=$this->upload->data('file_name');	
		  }
		 else
		  {
		 	echo $this->upload->display_errors();
		  }
			
		$this->db->insert('user',$arr);
	  }
	 
	 
	 function get_country()
	  {
	  
	  	$qry=$this->db->get('country');
	  	$data=$qry->result_array();
	  
	  	return $data;
	  }
	 
	  
	 function del_user($id='')
	  {
	  	$this->db->where('id',$id);	

		$qr=$this->db->get('user');
		$data=$qr->row_array();
		
		unlink('./assets/user/image/'.$data['image']);
		
		$this->db->where('id',$id);
		$this->db->delete('user');
		redirect('admin/User/view_user');
	  } 
	  
	  
	 function up_user($id='',$status='')
	 {
		$arr=array('status'=>$status);
	 	$this->db->where('id',$id);
		$this->db->update('user',$arr);
		echo $this->db->last_query();
		redirect('admin/User/view_user');
	 
	 }
	 
	 
	 function row_count()
	 {
	 	$qry=$this->db->get('user');
		$num=$qry->num_rows();
		return $num;
	 }
	 
	 function select_rec($per_page='',$start='')
	  {
	  	 $this->db->limit($per_page,$start);
	  	 $qry=$this->db->get('user');
		 
		 return $qry->result_array();
	  } 
	  
	  
	function check_email($email)
	 {
	 	$qry=$this->db->get('user');
		 
		return $qry->result_array();
	 }
	 
	function update_pass($user_mail='',$pass='')
	 {
	 	$arr=array('password'=>$pass);
	 	$this->db->where('email',$user_mail);
		$this->db->update('user',$arr);
	 }
	 function update_profile($ses_id='',$arr)
	 {	
	 	$this->db->where('id',$ses_id);
		$this->db->update('user',$arr);
		
	 
	 }
	function check_email_valid($email='')
	 {
		$this->db->where('email',$email);
	 	$qry=$this->db->get('user');
		 
		return $qry->result_array();
	 }
 }	
?>