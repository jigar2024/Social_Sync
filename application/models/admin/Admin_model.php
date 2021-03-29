<?php

class Admin_model extends CI_Model
 {
	 function add_admin()
	  {
	  	 $name=$this->input->post('name');
		 $email=$this->input->post('email');
		 $password=$this->input->post('password');
			
		 $arr=array('name'=>$name,'email'=>$email,'password'=>$password);
		 
		 
		 $config['upload_path']='./assets/admin/image/';
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
			
		$this->db->insert('admin',$arr);
		
	  }
	 function del_admin($id='')
	  {
	  	$this->db->where('id',$id);

		$qr=$this->db->get('admin');
		$data=$qr->row_array();
		
		unlink('./assets/admin/image/'.$data['image']);
		
		$this->db->where('id',$id);
		$this->db->delete('admin');
		redirect('admin/Admin/view_admin');
	  } 
	  
	
	
	
	  
	 function update_admin($id='')
	  {
	  	$this->db->where('id',$id);

		$qr=$this->db->get('admin');
		$up_data=$qr->row_array();
	  	
		return $up_data;
	  
	  }
	  
	function up_admin($id='',$arr)
	 {
	 
	 	$this->db->where('id',$id);
		$this->db->update('admin',$arr);
	 
	 }
	
	
	 function row_count()
	 {
	 	$qry=$this->db->get('admin');
		$num=$qry->num_rows();
		return $num;
	 }
	  
	 function select_rec($per_page='',$start='')
	  {
	  	 $this->db->limit($per_page,$start);
	  	 $qry=$this->db->get('admin');
		 
		 return $qry->result_array();
	  }
	 
 }	
?>