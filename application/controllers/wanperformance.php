<?php

class Wanperformance extends CI_Controller 
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

     public function insert_monitoring ()
     {
        $lokasi = $this->input->post('lokasi');
        $mon_cacti = $this->input->post('cacti');
        $mon_npmd = $this->input->post('npmd');
        $mon_sp = $this->input->post('smokeping');

        $cek_lokasi = array ('site_name' => $lokasi);
        $site_id = $this->wan_performance_model->getsiteid($cek_lokasi);
       //--------------------------------------------------------------------//
        $tahap = $this->input->post('tahap');
        $user = $this->input->post('user');
        $keterangan = $this->input->post('keterangan');
        $order_up_id = $this->wan_performance_model->getorderupid($site_id);
        $detail_id = $this->wan_performance_model->getdetailupid($order_up_id);
        $in_detail_id = array ('keterangan' => $keterangan,
                'closed_by' => $user);
        $this->wan_performance_model->updateprocessuat($in_detail_id,$detail_id);

        $work_id = $this->wan_performance_model->getworkid($detail_id);

        $in_unrec = array ('p_process_id' => $tahap);
        $this->wan_performance_model->inputunrec($in_unrec, $detail_id);
        //--------------------------------------------------------------------//

        //-----------------------------------------------------------------//
        $get_next = array ('p_process_id' => $tahap);
        $getnext = $this->wan_performance_model->getnext($tahap, $get_next);

        $in_next = array ('p_process_id' => $getnext ,
            't_detail_network_order_id' => $detail_id);
        $this->wan_performance_model->nexttahap($in_next);

        $up_unrec = array ('p_process_id' => $getnext);
        $this->wan_performance_model->updateunrec($up_unrec, $detail_id);
        //------------------------------------------------------------------//


        $data = array(
        'mon_cacti' => $mon_cacti ,
        'mon_npmd' => $mon_npmd ,
        'mon_sp' => $mon_sp ,
        );
        $data = $this->wan_performance_model->insert_data_balo($data,$site_id);
        redirect('wanperformance','refresh');
    }

    

    

}