<?php 

function send_email_helper($email='',$random='')
{
		//echo 'heloow';die;
			$data=array();
				$ci=&get_instance();
				$ci->load->library('email');
				if($_SERVER['HTTP_HOST'] == 'localhost'){
					$config['protocol']='smtp';
					$config['smtp_host']='ssl://smtp.gmail.com';
					$config['smtp_user']='soialsync97@gmail.com';
					$config['smtp_pass']='socialsync123123';
					$config['smtp_port']=465;
				}
				$config['newline']="\r\n";
				$ci->email->initialize($config);
				$ci->email->from('socialsync97@gmail.com');
				$ci->email->to($email);
				$ci->email->subject('Forgot Password Code');
				$ci->email->message($random);
			 
				if($ci->email->send())
				 {
					$ci->session->set_userdata('otp',$random);
					$ci->session->set_userdata('email',$email);
					redirect('user/User/check_otp');
				 }
				else
				 {
					//show_error($this->email->print_debugger());
					$data['try_again']="Something Went Wrong Please Try Again.!";
				 }
				 
				//$ci->load->view('user/forgotpassword',$data);
				return $data;
}

?>