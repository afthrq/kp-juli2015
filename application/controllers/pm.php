<?php

class Pm extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		session_start();
		$this->load->model('pm_model');
		//if($this->session->userdata('role') != "pm")
		//{
		//	redirect('user','refresh');	
        //}
	}

    function insert_to_db()
    {
        //$this->site_model->insert_to_db();
        //$this->load->view('success');//loading success view
    }

	function index()
	{
		$this->load->view('includes/header');
    	$this->load->view('pm/home');
    	$this->load->view('includes/footer');
	}

    function koordinasi_provider()
    {
        $tiket_provider = $this->input->post('tiket_provider');
        $pic_provider = $this->input->post('pic_provider');
        $this->pm_model->insert_koordinasi_provider($tiket_provider, $pic_provider);
    	$this->load->view('includes/header');
    	$this->load->view('pm/koordinasi_provider');
    	$this->load->view('includes/footer');
    }

    function online_billing()
    {
    	$this->load->view('includes/header');
    	$this->load->view('inputor/online_billing');
    	$this->load->view('includes/footer');
    }

}