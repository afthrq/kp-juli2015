<?php

class Wan_performance_analyst extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		session_start();
        $this->load->model('verifikator_model');
		if($this->session->userdata('role') != "wanperformance")
		{
			redirect('user','refresh');	
        }
	}

	function index()
	{
		$this->load->view('includes/header');
    	$this->load->view('wan_performance_analyst/home');
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
        $tahap = $this->input->post('tahap');
        $user = $this->input->post('user');
        $path = "uploads/$filename";

        $order_up_id = $this->verifikator_model->getorderupid($site_id);
        $detail_id = $this->verifikator_model->getdetailupid($order_up_id);
        $in_detail_id = array ('t_detail_network_order_id' => $detail_id,
                        'p_process_id' => $tahap,
                        'closed_by' => $user);
        $work_id = $this->verifikator_model->getworkid($in_detail_id);

        $this->verifikator_model->insert_detail_order($no_form, $tanggal_permintaan, $detail_id,$user);
        $this->verifikator_model->insert_dokumen($tipe_dokumen, $caption, $path, $work_id);
        redirect('verifikator','refresh');
    }

     function submit_verifikasi_balo()
    {
        $site_id = $this->input->post('site_id');   
        $tipe_dokumen = $this->input->post('tipe_dokumen');
        $caption = $this->input->post('caption');
        $filename = $this->input->post('path');
        $tahap = $this->input->post('tahap');
        $user = $this->input->post('user');
        $path = "uploads/$filename";

        $order_up_id = $this->verifikator_model->getorderupid($site_id);
        $detail_id = $this->verifikator_model->getdetailupid($order_up_id);
        $in_detail_id = array ('t_detail_network_order_id' => $detail_id,
                        'p_process_id' => $tahap,
                        'closed_by' => $user);
        $work_id = $this->verifikator_model->getworkid($in_detail_id);

        $this->verifikator_model->insert_dokumen($tipe_dokumen, $caption, $path, $work_id);
        redirect('verifikator','refresh');
    }

    function menu_list_permintaan()
    {
        $data['list_permintaan'] = $this->verifikator_model->getdatapermintaan();        
        $this->load->view('includes/header');
        $this->load->view('wan_performance_analyst/menu_list_permintaan', $data);
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

    function monitoring()
    {        
        $o_id = $this->input->post('order_id');
        $data['lokasiid'] = $this->verifikator_model->getlokasiid($o_id);
    	$this->load->view('includes/header');
    	$this->load->view('wan_performance_analyst/monitoring', $data);
    	$this->load->view('includes/footer');
    }

}