<?php

class Wanengineer extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		session_start();
        $this->load->model('wan_engineer_model');
		if($this->session->userdata('role') != "wanengineer")
		{
			redirect('user','refresh');	
        }
	}

	function index()
	{
		$this->load->view('includes/header');
    	$this->load->view('wan_engineer/home');
    	$this->load->view('includes/footer');
	}

    function submit_upload_wan_engineer()
    {
        $site_id = $this->input->post('site_id');
        //------------------------------------------------------------------//
        $tahap = $this->input->post('tahap');
        $user = $this->input->post('user');
        $keterangan = $this->input->post('keterangan');
        $order_up_id = $this->wan_engineer_model->getorderupid($site_id);
        $detail_id = $this->wan_engineer_model->getdetailupid($order_up_id);
        $in_tahap = array ('p_process_id' => $tahap ,
                't_detail_network_order_id' => $detail_id ,
                'keterangan' => $keterangan ,
                'closed_by' => $user);
        $work_id = $this->wan_engineer_model->getworkid($in_tahap);
        //------------------------------------------------------------------//

        $tipe_dokumen = $this->input->post('tipe_dokumen');
        $caption = $this->input->post('caption');
        $filename = $this->input->post('path');
        $path = "uploads/$filename";
        $this->wan_engineer_model->insert_dokumen($tipe_dokumen, $caption, $path, $work_id);


        redirect('wanengineer','refresh');
    }

    function menu_list_permintaan()
    {
        $data['list_permintaan'] = $this->wan_engineer_model->getdatapermintaan();        
        $this->load->view('includes/header');
        $this->load->view('wan_engineer/menu_list_permintaan', $data);
        $this->load->view('includes/footer');
    }

    function uat()
    {
        $o_id = $this->input->post('order_id');
        $data['lokasiid'] = $this->wan_engineer_model->getlokasiid($o_id);
        $this->load->view('includes/header');
        $this->load->view('wan_engineer/uat',$data);
        $this->load->view('includes/footer');
    }    

}