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

    function submit_online_billing()
    {
        $site_id = $this->input->post('site_id');

        $input = $this->pm_model->getdataorder($site_id);
        $array = json_decode(json_encode($input),true);
        $this->pm_model->copydata($array);
        redirect('pm','refresh');
    }

    function submit_koordinasi_provider()
    {
        $site_id = $this->input->post('site_id');
        $tiket_provider = $this->input->post('tiket_provider');
        $pic_provider = $this->input->post('pic_provider');

        //------------------------------------------------------------------//
        $tahap = $this->input->post('tahap');
        $user = $this->input->post('user');
        $order_up_id = $this->pm_model->getorderupid($site_id);
        $detail_id = $this->pm_model->getdetailupid($order_up_id);
        $in_tahap = array ('p_process_id' => $tahap ,
                't_detail_network_order_id' => $detail_id,
                'closed_by' => $user);
        $tahap_id = $this->pm_model->inputtahap($in_tahap);
        //------------------------------------------------------------------//

        $detail_id = $this->pm_model->getdetailupid($order_up_id);

        $this->pm_model->insert_koordinasi_provider($tiket_provider, $pic_provider, $detail_id);
        redirect('pm','refresh');
    }

    function menu_list_permintaan()
    {
        $data['list_permintaan'] = $this->pm_model->getdatapermintaan();
        $this->load->view('includes/header');
        $this->load->view('pm/menu_list_permintaan', $data);
        $this->load->view('includes/footer');
    }

    function menu_list_permintaan_ob()
    {
        $data['list_permintaan'] = $this->pm_model->getdatapermintaan();
        $this->load->view('includes/header');
        $this->load->view('pm/menu_list_permintaan_ob', $data);
        $this->load->view('includes/footer');
    }

    function koordinasi_provider()
    {
        $o_id = $this->input->post('order_id');
        $data['lokasiid'] = $this->pm_model->getlokasiid($o_id);
        $this->load->view('includes/header');
        $this->load->view('pm/koordinasi_provider',$data);
        $this->load->view('includes/footer');
    }

    function online_billing()
    {
        $o_id = $this->input->post('order_id');
        $data['lokasiid'] = $this->pm_model->getlokasiid($o_id);
    	$this->load->view('includes/header');
    	$this->load->view('pm/online_billing',$data);
    	$this->load->view('includes/footer');
    }

}