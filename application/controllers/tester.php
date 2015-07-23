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
        $site_id = $this->input->post('site_id');
        //------------------------------------------------------------------//
        $tahap = $this->input->post('tahap');
        $user = $this->input->post('user');
        $order_up_id = $this->tester_model->getorderupid($site_id);
        $detail_id = $this->tester_model->getdetailupid($order_up_id);
        $in_tahap = array ('p_process_id' => $tahap ,
                't_detail_network_order_id' => $detail_id,
                'closed_by' => $user);
        $work_id = $this->tester_model->getworkid($in_tahap);
        //------------------------------------------------------------------//

        $tipe_dokumen = $this->input->post('tipe_dokumen');
        $caption = $this->input->post('caption');
        $filename = $this->input->post('path');
        $path = "uploads/$filename";
        $this->tester_model->insert_dokumen($tipe_dokumen, $caption, $path, $work_id);


        redirect('tester','refresh');
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
        $o_id = $this->input->post('order_id');
        $data['lokasiid'] = $this->tester_model->getlokasiid($o_id);
        $this->load->view('includes/header');
        $this->load->view('tester/uat',$data);
        $this->load->view('includes/footer');
    }    

}