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
        //$data['list_lokasi'] = $this->pm_model->getdatalokasi();
        $data['list_jenis'] = $this->pm_model->getdatajenis();
        print_r($data['list_jenis']);
        die();
        //$data['list_layanan'] = $this->pm_model->getdatalayanan();
       // $data['list_paket'] = $this->pm_model->getdatapaket();
        //$data['list_bandwidth'] = $this->pm_model->getdatabandwidth();
        /*$data['list_permintaan'] = array ('name' => $data['list_lokasi'],
                            'type_name' => $data['list_jenis']);
*/
        $this->load->view('includes/header');
        $this->load->view('pm/menu_list_permintaan', $data);
        $this->load->view('includes/footer');
    }

    function koordinasi_provider()
    {
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