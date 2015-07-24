<?php

class Wan_performance_analyst extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		session_start();
        $this->load->model('wan_performance_model');
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

    function menu_list_permintaan()
    {
        $data['list_permintaan'] = $this->wan_performance_model->getdatapermintaan();        
        $this->load->view('includes/header');
        $this->load->view('wan_performance_analyst/menu_list_permintaan', $data);
        $this->load->view('includes/footer');
    }

    function monitoring()
    {        
        $o_id = $this->input->post('order_id');
        $data['lokasiid'] = $this->wan_performance_model->get_id($o_id);
        $this->load->view('includes/header');
        $this->load->view('wan_performance_analyst/monitoring', $data);
        $this->load->view('includes/footer');
    }

     public function insert_data_balo ()
     {
        $lokasi = $this->input->post('lokasi');
        $mon_cacti = $this->input->post('cacti');
        $mon_npmd = $this->input->post('npmd');
        $mon_sms = $this->input->post('sms');
        $mon_logbook = $this->input->post('logbook');

        $cek_lokasi = array ('site_name' => $lokasi);
        $siteid = $this->wan_performance_model->getsiteid($cek_lokasi);
        //------------------------------------------------------------------//
        $tahap = $this->input->post('tahap');
        $user = $this->input->post('user');
        $order_up_id = $this->wan_performance_model->getorderupid($siteid);
        $detail_id = $this->wan_performance_model->getdetailupid($order_up_id);
        $in_tahap = array ('p_process_id' => $tahap ,
                't_detail_network_order_id' => $detail_id,
                'closed_by' => $user);
        $tahap_id = $this->wan_performance_model->inputtahap($in_tahap);
        //------------------------------------------------------------------//


        $data = array(
        'mon_cacti' => $mon_cacti ,
        'mon_npmd' => $mon_npmd ,
        'mon_sms' => $mon_sms ,
        'mon_log' => $mon_logbook
        );
        $data = $this->wan_performance_model->insert_data_balo($data,$siteid);
        redirect('engineer','refresh');
    }

    

    

}