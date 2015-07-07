<?php

class Inputor extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		session_start();
		$this->load->model('inputor_model');
		if($this->session->userdata('role') != "inputor")
		{
			redirect('user','refresh');	
        }
	}

	function index()
	{
		$this->load->view('includes/header');
    	$this->load->view('inputor/home');
    	$this->load->view('includes/footer');
	}

    function form_permintaan()
    {
    	$this->load->view('includes/header');
    	$this->load->view('inputor/form_permintaan');
    	$this->load->view('includes/footer');
    }

    function forms()
    {
    	$this->load->view('includes/header');
    	$this->load->view('admin/forms');
    	$this->load->view('includes/footer');
    }

}