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
        $data['region_list'] = $this->inputor_model->getdataregion();
        $data['perusahaan_list'] = $this->inputor_model->getdataperusahaan();
        $data['jenis_list'] = $this->inputor_model->getdatajenis();
        $data['layanan_list'] = $this->inputor_model->getdatalayanan();
        $layanan = $this->input->post('layanan');
        $data['paket_list'] = $this->inputor_model->getdatapaket($layanan);

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

    public function form_input()
    {
        $lokasi = $this->input->post('lokasi');
        $jenis = $this->input->post('jenis');
        $perusahaan = $this->input->post('perusahaan');
        $alamat = $this->input->post('alamat');
        $region = $this->input->post('region');
        $provinsi = $this->input->post('prov');
        $pic = $this->input->post('pic');
        $layanan = $this->input->post('layanan');
        $paket = $this->input->post('paket');
        $bw = $this->input->post('bw');

        $site = array ('name' => $lokasi ,
                    'address' => $alamat);
        $service = array ('name' => $layanan ,
                        'package' => $paket);
        $reg = array ('name' => $region);
        $perusahaan = array ('name' => $perusahaan);
        $prov = array ('name' => $provinsi);
        $pic = array ('name' => $pic);
        $bandwidth = array ('bw' => $bw);

        $this->inputor_model->inputform($site,$service,$reg,$perusahaan,$prov,$pic,$bandwidth);
    }
}