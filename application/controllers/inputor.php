<?php

class Inputor extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
        $this->load->helper('url');
        $this->load->model('inputor_model');
		session_start();
		if($this->session->userdata('role') != "inputor")
		{
			redirect('user','refresh');	
        }
	}


	public function index()
	{
		$this->load->view('includes/header');
    	$this->load->view('inputor/home');
    	$this->load->view('includes/footer');
	}

    public function form_permintaan()
    {
        $data['region_list'] = $this->inputor_model->getDataRegion();
        $data['perusahaan_list'] = $this->inputor_model->getDataPerusahaan();
        $data['jenis_list'] = $this->inputor_model->getDataJenis();
        $data['layanan_list'] = $this->inputor_model->getDataLayanan();
        $layanan = $this->input->post('layanan');
        $data['paket_list'] = $this->inputor_model->getDataPaket($layanan);

    	$this->load->view('includes/header');
    	$this->load->view('inputor/form_permintaan',$data);
    	$this->load->view('includes/footer');

    }

    public function update_permintaan()
    {
    	$this->load->view('includes/header');
    	$this->load->view('inputor/update_permintaan');
    	$this->load->view('includes/footer');
    }


}