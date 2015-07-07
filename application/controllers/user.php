<?php

class User extends CI_Controller 
{

	function index()
	{
		if($this->session->userdata('is_logged_in'))
		{
			$user = $this->session->userdata('role');
			redirect($user);
        }
        else
        {
        	$this->load->view('login');	
        }
	}

    function __encrip_password($password) 
    {
        return md5($password);
    }	

	function validate_credentials()
	{	

		$this->load->model('Users_model');

		$user_name = $this->input->post('user_name');
		$password = $this->__encrip_password($this->input->post('password'));

		$is_valid = $this->Users_model->validate($user_name, $password);
		$rolecheck = $this->Users_model->role_check($user_name);

		if($is_valid)
		{
			if ($rolecheck == "inputor") 
			{	
				$data = array(
				'user_name' => $user_name,
				'is_logged_in' => TRUE,
				'role' => $rolecheck
				);
				$this->session->set_userdata($data);
				redirect('inputor');
			}
			elseif ($rolecheck == "pm") 
			{	
				$data = array(
				'user_name' => $user_name,
				'is_logged_in' => TRUE,
				'role' => $rolecheck
				);
				$this->session->set_userdata($data);
				redirect('pm');
			}
			
		}
		else // incorrect username or password
		{
			$data['message_error'] = TRUE;
			$this->load->view('login', $data);	
		}
	}	

	    	
	function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}

}