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
        $site_id = $this->input->post('site_id');
        $no_form = $this->input->post('no_form');
        $tanggal_permintaan = $this->input->post('tanggal_permintaan');
        $tipe_dokumen = $this->input->post('tipe_dokumen');
        $caption = $this->input->post('caption');
        $filename = $this->input->post('path');
        $path = "uploads/$filename";

        $order_up_id = $this->verifikator_model->getorderupid($site_id);
        $detail_id = $this->verifikator_model->getdetailupid($order_up_id);

        $this->verifikator_model->insert_detail_order($no_form, $tanggal_permintaan, $detail_id);
        $this->verifikator_model->insert_dokumen($tipe_dokumen, $caption, $path);
        redirect('verifikator','refresh');
    }

     function submit_verifikasi_balo()
    {   
        $tipe_dokumen = $this->input->post('tipe_dokumen');
        $caption = $this->input->post('caption');
        $filename = $this->input->post('path');
        $path = "uploads/$filename";
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

    function menu_list_permintaan_vb()
    {
        $data['list_permintaan'] = $this->verifikator_model->getdatapermintaan();        
        $this->load->view('includes/header');
        $this->load->view('verifikator/menu_list_permintaan_vb', $data);
        $this->load->view('includes/footer');
    }

    function verifikasi_permintaan()
    {
        $o_id = $this->input->post('order_id');
        $data['lokasiid'] = $this->verifikator_model->getlokasiid($o_id);
        $data['data_permintaan'] = $this->verifikator_model->get_data_permintaan($o_id);  
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