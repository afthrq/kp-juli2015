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

    function insert_to_db()
    {
        $this->load->model('site_model');
        $this->site_model->insert_to_db();
        $this->load->view('success');//loading success view
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

    function update_permintaan()
    {
    	$this->load->view('includes/header');
    	$this->load->view('inputor/update_permintaan');
    	$this->load->view('includes/footer');
    }

}