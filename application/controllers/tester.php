<?php

class Tester extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		session_start();
        $this->load->model('tester_model');
		if($this->session->userdata('role') != "tester")
		{
			redirect('user','refresh');	
        }
	}

	function index()
	{
		$this->load->view('includes/header');
    	$this->load->view('tester/home');
    	$this->load->view('includes/footer');
	}

    function submit_upload_tester()
    {   
        $tipe_dokumen = $this->input->post('tipe_dokumen');
        $caption = $this->input->post('caption');
        $filename = $this->input->post('path');
        $path = "uploads/$filename";
        $this->verifikator_model->insert_dokumen($tipe_dokumen, $caption, $path);*/
        //redirect('verifikator','refresh');
    }

    function menu_list_permintaan()
    {
        $data['list_permintaan'] = $this->tester_model->getdatapermintaan();        
        $this->load->view('includes/header');
        $this->load->view('tester/menu_list_permintaan', $data);
        $this->load->view('includes/footer');
    }

    function uat()
    {
        //$order_id = $this->input->post('order_id');
        //$data['data_permintaan'] = $this->verifikator_model->get_data_permintaan($order_id);  
        $this->load->view('includes/header');
        $this->load->view('tester/uat');
        $this->load->view('includes/footer');
    }    

}