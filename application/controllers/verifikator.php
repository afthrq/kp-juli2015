<?php

class Verifikator extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		session_start();
		$this->load->model('pm_model');
        $this->load->model('verifikator_model');
		if($this->session->userdata('role') != "verifikator")
		{
			redirect('user','refresh');	
        }
	}

	function index()
	{
		$this->load->view('includes/header');
    	$this->load->view('verifikator/home');
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

        $data['list_permintaan'] = $this->pm_model->get_list_permintaan();
        $this->load->view('includes/header');
        $this->load->view('verifikator/menu_list_permintaan', $data);
        $this->load->view('includes/footer');
    }

    function verifikasi_permintaan()
    {
        $this->load->view('includes/header');
        $this->load->view('verifikator/verifikasi_permintaan');
        $this->load->view('includes/footer');
    }

    function verifikasi_balo()
    {
    	$this->load->view('includes/header');
    	$this->load->view('verifikator/verifikasi_balo');
    	$this->load->view('includes/footer');
    }

}