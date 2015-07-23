<?php

class Engineer extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
        $this->load->helper('url');
        $this->load->model('engineer_model');
		session_start();
		if($this->session->userdata('role') != "engineer")
		{
			redirect('user','refresh');	
        }
	}


	public function index()
	{
		$this->load->view('includes/header');
    	$this->load->view('engineer/home');
    	$this->load->view('includes/footer');
	}

    public function instalasi()
    {
        $order_id = $this->input->post('order_id');
        $data['update_list'] = $this->engineer_model->getdataupdate($order_id);
        //$data['layanan_list'] = $this->engineer_model->getservid();
        //$data['perusahaan_list'] = $this->engineer_model->getcompid(); 
    	$this->load->view('includes/header');
    	$this->load->view('engineer/instalasi',$data);
    	$this->load->view('includes/footer');
    }

    public function balo()
    {
        $order_id = $this->input->post('order_id');
        $data['balo_list'] = $this->engineer_model->getdataupdate($order_id);
        $this->load->view('includes/header');
        $this->load->view('engineer/balo',$data);
        $this->load->view('includes/footer');
    }

    function menu_list_permintaan()
    {
        $data['list_permintaan'] = $this->engineer_model->getdatapermintaan();
        $this->load->view('includes/header');
        $this->load->view('engineer/menu_list_permintaan', $data);
        $this->load->view('includes/footer');
    }

    function menu_list_permintaan_balo()
    {
        $data['list_permintaan'] = $this->engineer_model->getdatapermintaan();
        $this->load->view('includes/header');
        $this->load->view('engineer/menu_list_permintaan_balo', $data);
        $this->load->view('includes/footer');
    }

    public function insert_data_balo (){
        $lokasi = $this->input->post('lokasi');
        $mon_cacti = $this->input->post('cacti');
        $mon_npmd = $this->input->post('npmd');
        $mon_sms = $this->input->post('sms');
        $mon_logbook = $this->input->post('logbook');

        $cek_lokasi = array ('site_name' => $lokasi);
        $siteid = $this->engineer_model->getsiteid($cek_lokasi);
        //------------------------------------------------------------------//
        $tahap = $this->input->post('tahap');
        $user = $this->input->post('user');
        $order_up_id = $this->engineer_model->getorderupid($siteid);
        $detail_id = $this->engineer_model->getdetailupid($order_up_id);
        $in_tahap = array ('p_process_id' => $tahap ,
                't_detail_network_order_id' => $detail_id,
                'closed_by' => $user);
        $tahap_id = $this->engineer_model->inputtahap($in_tahap);
        //------------------------------------------------------------------//


        $data = array(
        'mon_cacti' => $mon_cacti ,
        'mon_npmd' => $mon_npmd ,
        'mon_sms' => $mon_sms ,
        'mon_log' => $mon_logbook
        );
        $data = $this->engineer_model->insert_data_balo($data,$siteid);
        redirect('engineer','refresh');
    }

    public function insertdatainstalasi ()
    {


        $lokasi = $this->input->post('lokasi');
        $ipwan = $this->input->post('ipwan');
        $netmaskwan = $this->input->post('netmaskwan');
        $iplan = $this->input->post('iplan');
        $netmasklan = $this->input->post('netmasklan');
        $iploop = $this->input->post('iploop');
        $asn = $this->input->post('asn');
        $lastmile = $this->input->post('lastmile');
        $traffic = $this->input->post('traffic');
        $sla = $this->input->post('sla');
        $hostname = $this->input->post('hostname'); 

        //contoh karena belum ada data dalam tabel lastmile
        $in_lastmile = array ('name' => $lastmile);
        $this->engineer_model->inputlastmile($in_lastmile); 

        //ambil id dari inputan lastmile
        $lmid = $this->engineer_model->getlastmileid($lastmile);

        $in_traffic = array ('traffic_mgmt' => $traffic);
        $cek_lokasi = array ('site_name' => $lokasi);
        $this->engineer_model->updatenwsite($in_traffic,$lokasi);
        $nwsiteid = $this->engineer_model->getnwsiteid($in_traffic,$cek_lokasi);

        //------------------------------------------------------------------//
        $tahap = $this->input->post('tahap');
        $user = $this->input->post('user');
        $order_up_id = $this->engineer_model->getorderupid($nwsiteid);
        $detail_id = $this->engineer_model->getdetailupid($order_up_id);
        $in_tahap = array ('p_process_id' => $tahap ,
                't_detail_network_order_id' => $detail_id,
                'closed_by' => $user);
        $tahap_id = $this->engineer_model->inputtahap($in_tahap);
        //------------------------------------------------------------------//

        $p_final = array ('t_nw_site_id' => $nwsiteid);
        $in_final = array ( 'ip_wan' => $ipwan ,
        'netmask_wan' => $netmaskwan ,
        'ip_lan' => $iplan ,
        'netmask_lan' => $netmasklan ,
        'ip_loop' => $iploop ,
        'asn' => $asn ,
        'p_lastmile_id' => $lmid ,
        'sla' => $sla ,
        'hostname' => $hostname 
        );
        $data = $this->engineer_model->insertdatafinal($in_final,$p_final);
        redirect('engineer','refresh');
    }
}