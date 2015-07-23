<?php

class Admin extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		session_start();
		$this->load->model('users_model');
		if($this->session->userdata('level') != "admin")
		{
			redirect('user','refresh');	
        }
	}

	function index()
	{
		$this->load->view('includes/header');
    	$this->load->view('admin/home');
    	$this->load->view('includes/footer');
	}

    function table()
    {
    	$this->load->view('includes/header');
    	$this->load->view('admin/table');
    	$this->load->view('includes/footer');
    }

    function forms()
    {
    	$this->load->view('includes/header');
    	$this->load->view('admin/forms');
    	$this->load->view('includes/footer');
    }

}