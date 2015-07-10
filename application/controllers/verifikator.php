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

    function submit_verifikasi_permintaan()
    {   
        $no_form = $this->input->post('no_form');
        $tanggal_permintaan = $this->input->post('tanggal_permintaan');
        $tipe_dokumen = $this->input->post('tipe_dokumen');
        $caption = $this->input->post('caption');
        $filename = $this->input->post('path');
        $path = "uploads/$filename";
        $this->verifikator_model->insert_detail_order($no_form, $tanggal_permintaan);
        $this->verifikator_model->insert_dokumen($tipe_dokumen, $caption, $path);
        //redirect('verifikator','refresh');
    }

    function menu_list_permintaan()
    {
        $data['list_permintaan'] = $this->verifikator_model->getdatapermintaan();        
        $this->load->view('includes/header');
        $this->load->view('verifikator/menu_list_permintaan', $data);
        $this->load->view('includes/footer');
    }

    function set_order_id()
    {   

    }

    function verifikasi_permintaan()
    {
        $order_id = $this->input->post('order_id');
        $data['data_permintaan'] = $this->verifikator_model->get_data_permintaan($order_id);  
        //$this->set_order_id();

       // $data['order_id'] = $o_id;
        $this->load->view('includes/header');
        $this->load->view('verifikator/verifikasi_permintaan', $data);
        $this->load->view('includes/footer');
    }    

    function verifikasi_balo()
    {
    	$this->load->view('includes/header');
    	$this->load->view('verifikator/verifikasi_balo');
    	$this->load->view('includes/footer');
    }

}