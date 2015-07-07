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


	public function index()
	{
		$this->load->view('includes/header',$data);
    	$this->load->view('inputor/home',$data);
    	$this->load->view('includes/footer',$data);
	}

    public function form_permintaan()
    {

    	$this->load->view('includes/header');
    	$this->load->view('inputor/form_permintaan');
    	$this->load->view('includes/footer');

    }

    public function update_permintaan()
    {
    	$this->load->view('includes/header');
    	$this->load->view('inputor/update_permintaan');
    	$this->load->view('includes/footer');
    }

    public function showDataRegion()
    {
        $data['user_list'] = $this->inputor_model->getDataRegion();
        $this->load->view('form_permintaan',$data);

    }
}