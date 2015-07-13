<?php

class Pm extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		session_start();
		$this->load->model('pm_model');
		if($this->session->userdata('role') != "pm")
		{
			redirect('user','refresh');	
        }
	}

	function index()
	{
		$this->load->view('includes/header');
    	$this->load->view('pm/home');
    	$this->load->view('includes/footer');
	}

    function submit_koordinasi_provider()
    {
        $tiket_provider = $this->input->post('tiket_provider');
        $pic_provider = $this->input->post('pic_provider');
        $this->pm_model->insert_koordinasi_provider($tiket_provider, $pic_provider);
        redirect('pm','refresh');
    }

    function menu_list_permintaan()
    {
        $data['list_permintaan'] = $this->pm_model->getdatapermintaan();
        $this->load->view('includes/header');
        $this->load->view('pm/menu_list_permintaan', $data);
        $this->load->view('includes/footer');
    }

    function menu_list_permintaan_ob()
    {
        $data['list_permintaan'] = $this->pm_model->getdatapermintaan();
        $this->load->view('includes/header');
        $this->load->view('pm/menu_list_permintaan_ob', $data);
        $this->load->view('includes/footer');
    }

    function koordinasi_provider()
    {
        $order_id = $this->input->post('order_id');
        $this->load->view('includes/header');
        $this->load->view('pm/koordinasi_provider');
        $this->load->view('includes/footer');
    }

    function online_billing()
    {
    	$this->load->view('includes/header');
    	$this->load->view('pm/online_billing');
    	$this->load->view('includes/footer');
    }

}