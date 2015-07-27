<?php

class Wananalyst extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
        $this->load->helper('url');
        $this->load->model('wan_analyst_model');
		session_start();
		if($this->session->userdata('role') != "wananalyst")
		{
			redirect('user','refresh');	
        }
	}


	public function index()
	{
		$this->load->view('includes/header');
    	$this->load->view('wan_analyst/home');
    	$this->load->view('includes/footer');
	}

    public function implementasi()
    {
        $order_id = $this->input->post('order_id');
        $data['update_list'] = $this->wan_analyst_model->getdataupdate($order_id);
        //$data['layanan_list'] = $this->wan_analyst_model->getservid();
        //$data['perusahaan_list'] = $this->wan_analyst_model->getcompid(); 
    	$this->load->view('includes/header');
    	$this->load->view('wan_analyst/implementasi_br',$data);
    	$this->load->view('includes/footer');
    }

    public function balo()
    {
        $o_id = $this->input->post('order_id');
        $data['balo_list'] = $this->wan_analyst_model->getdataupdate($o_id);
        $data['lokasiid'] = $this->wan_analyst_model->getlokasiid($o_id); 
        $this->load->view('includes/header');
        $this->load->view('wan_analyst/balo',$data);
        $this->load->view('includes/footer');
    }

    public function survey()
    {
        $o_id = $this->input->post('order_id');
        $data['lokasiid'] = $this->wan_analyst_model->getlokasiid($o_id); 
        $this->load->view('includes/header');
        $this->load->view('wan_analyst/survey',$data);
        $this->load->view('includes/footer');
    }

    function menu_list_permintaan_imp()
    {
        $data['list_permintaan'] = $this->wan_analyst_model->getdatapermintaan();
        $this->load->view('includes/header');
        $this->load->view('wan_analyst/menu_list_permintaan_imp', $data);
        $this->load->view('includes/footer');
    }

    function menu_list_permintaan_balo()
    {
        $data['list_permintaan'] = $this->wan_analyst_model->getdatapermintaan();
        $this->load->view('includes/header');
        $this->load->view('wan_analyst/menu_list_permintaan_balo', $data);
        $this->load->view('includes/footer');
    }

    function menu_list_permintaan_srv()
    {
        $data['list_permintaan'] = $this->wan_analyst_model->getdatapermintaan();
        $this->load->view('includes/header');
        $this->load->view('wan_analyst/menu_list_permintaan_srv', $data);
        $this->load->view('includes/footer');
    }

    public function insert_data_balo ()
    {
        $site_id = $this->input->post('site_id');
        $baloptm = $this->input->post('baloptm');
        $baloprv = $this->input->post('baloprv');
        $tgltagih = $this->input->post('tgltagih');

        //------------------------------------------------------------------//
        $tahap = $this->input->post('tahap');
        $user = $this->input->post('user');
        $keterangan = $this->input->post('keterangan');
        $order_up_id = $this->wan_analyst_model->getorderupid($site_id);
        $detail_id = $this->wan_analyst_model->getdetailupid($order_up_id);
        $in_tahap = array ('p_process_id' => $tahap ,
                't_detail_network_order_id' => $detail_id ,
                'keterangan' => $keterangan ,
                'closed_by' => $user);
        $work_id = $this->wan_analyst_model->getworkid($in_tahap);
        //------------------------------------------------------------------// 

        $data = array ('no_balo_provider' => $baloprv ,
                'no_balo_pertamina' => $baloptm ,
                'tgl_tagih' => $tgltagih);
        $this->wan_analyst_model->inputdatabalo($data);

        $tipe_dokumen = $this->input->post('tipe_dokumen');
        $caption = $this->input->post('caption');
        $filename = $this->input->post('path');
        $path = "uploads/$filename";
        $this->wan_analyst_model->insert_dokumen($tipe_dokumen, $caption, $path, $work_id);

        redirect ('wananalyst','refresh');      
    }

    public function insertdatasurvey ()
    {
        $site_id = $this->input->post('site_id');
        //------------------------------------------------------------------//
        $tahap = $this->input->post('tahap');
        $user = $this->input->post('user');
        $order_up_id = $this->wan_analyst_model->getorderupid($site_id);
        $detail_id = $this->wan_analyst_model->getdetailupid($order_up_id);
        $keterangan = $this->input->post('keterangan');
        $in_tahap = array ('p_process_id' => $tahap ,
                't_detail_network_order_id' => $detail_id,
                'keterangan' => $keterangan,
                'closed_by' => $user);
        $tahap_id = $this->wan_analyst_model->inputtahap($in_tahap);
        //------------------------------------------------------------------//
        redirect('wananalyst','refresh');
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


        $in_traffic = array ('traffic_mgmt' => $traffic);       
        $cek_lokasi = array ('site_name' => $lokasi);
        $this->wan_analyst_model->updatenwsite($in_traffic,$lokasi);
        $nwsiteid = $this->wan_analyst_model->getnwsiteid($cek_lokasi);


        //------------------------------------------------------------------//
        $tahap = $this->input->post('tahap');
        $user = $this->input->post('user');
        $keterangan = $this->input->post('keterangan');
        $order_up_id = $this->wan_analyst_model->getorderupid($nwsiteid);
        $detail_id = $this->wan_analyst_model->getdetailupid($order_up_id);
        $in_tahap = array ('p_process_id' => $tahap ,
                't_detail_network_order_id' => $detail_id,
                'keterangan' => $keterangan,
                'closed_by' => $user);
        $tahap_id = $this->wan_analyst_model->inputtahap($in_tahap);
        //------------------------------------------------------------------//

        $p_final = array ('t_nw_site_id' => $nwsiteid);
        $in_final = array ( 'ip_wan' => $ipwan ,
        'netmask_wan' => $netmaskwan ,
        'ip_lan' => $iplan ,
        'netmask_lan' => $netmasklan ,
        'ip_loop' => $iploop ,
        'asn' => $asn ,
        'p_lastmile_id' => $lastmile,
        'sla' => $sla ,
        'hostname' => $hostname 
        );
        $data = $this->wan_analyst_model->insertdatafinal($in_final,$p_final);
        redirect('wananalyst','refresh');
    }
}