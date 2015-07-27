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
        //get data service type id disini kasih variable $srv_id
        /****************
        if ($srv_id == 1)
        {
            $this->load->view('includes/header');
            $this->load->view('wan_analyst/implementasi_br',$data);
            $this->load->view('includes/footer');
        }
        else if ($srv_id == 2 || $srv_id == 3 || $srv_id == 4 || $srv_id == 5)
        {
            $this->load->view('includes/header');
            $this->load->view('wan_analyst/implementasi_upd',$data);
            $this->load->view('includes/footer');
        }
        else if ($srv_id == 6)
        {
            $this->load->view('includes/header');
            $this->load->view('wan_analyst/implementasi_rl',$data);
            $this->load->view('includes/footer');
        }
        else if ($srv_id == 7)
        {
            $this->load->view('includes/header');
            $this->load->view('wan_analyst/implementasi_dm',$data);
            $this->load->view('includes/footer');
        }
        ****************/

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
        $data['list_permintaan'] = $this->wan_analyst_model->getdatapermintaanimp();
        $this->load->view('includes/header');
        $this->load->view('wan_analyst/menu_list_permintaan_imp', $data);
        $this->load->view('includes/footer');
    }

    function menu_list_permintaan_balo()
    {
        $data['list_permintaan'] = $this->wan_analyst_model->getdatapermintaanbalo();
        $this->load->view('includes/header');
        $this->load->view('wan_analyst/menu_list_permintaan_balo', $data);
        $this->load->view('includes/footer');
    }

    function menu_list_permintaan_srv()
    {
        $data['list_permintaan'] = $this->wan_analyst_model->getdatapermintaansrv();
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

        //--------------------------------------------------------------------//
        $tahap = $this->input->post('tahap');
        $user = $this->input->post('user');
        $keterangan = $this->input->post('keterangan');
        $order_up_id = $this->wan_analyst_model->getorderupid($site_id);
        $detail_id = $this->wan_analyst_model->getdetailupid($order_up_id);
        $in_detail_id = array ('keterangan' => $keterangan,
                'closed_by' => $user);
        $this->wan_analyst_model->updateprocessbalo($in_detail_id,$detail_id);

        $work_id = $this->wan_analyst_model->getworkid($detail_id);

        $in_unrec = array ('p_process_id' => $tahap);
        $this->wan_analyst_model->inputunrec($in_unrec, $detail_id);
        //--------------------------------------------------------------------//

        //-----------------------------------------------------------------//
        $get_next = array ('p_process_id' => $tahap);
        $getnext = $this->wan_analyst_model->getnext($tahap, $get_next);

        $in_next = array ('p_process_id' => $getnext ,
            't_detail_network_order_id' => $detail_id);
        $this->wan_analyst_model->nexttahap($in_next);

        $up_unrec = array ('p_process_id' => $getnext);
        $this->wan_analyst_model->updateunrec($up_unrec, $detail_id);
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
        //--------------------------------------------------------------------//
        $tahap = $this->input->post('tahap');
        $user = $this->input->post('user');
        $keterangan = $this->input->post('keterangan');
        $order_up_id = $this->wan_analyst_model->getorderupid($site_id);
        $detail_id = $this->wan_analyst_model->getdetailupid($order_up_id);
        $in_detail_id = array ('keterangan' => $keterangan,
                'closed_by' => $user);
        $this->wan_analyst_model->updateprocesssrv($in_detail_id,$detail_id);

        $work_id = $this->wan_analyst_model->getworkid($detail_id);

        $in_unrec = array ('p_process_id' => $tahap);
        $this->wan_analyst_model->inputunrec($in_unrec, $detail_id);
        //--------------------------------------------------------------------//

        //-----------------------------------------------------------------//
        $get_next = array ('p_process_id' => $tahap);
        $getnext = $this->wan_analyst_model->getnext($tahap, $get_next);

        $in_next = array ('p_process_id' => $getnext ,
            't_detail_network_order_id' => $detail_id);
        $this->wan_analyst_model->nexttahap($in_next);

        $up_unrec = array ('p_process_id' => $getnext);
        $this->wan_analyst_model->updateunrec($up_unrec, $detail_id);
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
        $site_id = $this->wan_analyst_model->getnwsiteid($cek_lokasi);


        //--------------------------------------------------------------------//
        $tahap = $this->input->post('tahap');
        $user = $this->input->post('user');
        $keterangan = $this->input->post('keterangan');
        $order_up_id = $this->wan_analyst_model->getorderupid($site_id);
        $detail_id = $this->wan_analyst_model->getdetailupid($order_up_id);
        $in_detail_id = array ('keterangan' => $keterangan,
                'closed_by' => $user);
        $this->wan_analyst_model->updateprocessimp($in_detail_id,$detail_id);

        $work_id = $this->wan_analyst_model->getworkid($detail_id);

        $in_unrec = array ('p_process_id' => $tahap);
        $this->wan_analyst_model->inputunrec($in_unrec, $detail_id);
        //--------------------------------------------------------------------//

        //-----------------------------------------------------------------//
        $get_next = array ('p_process_id' => $tahap);
        $getnext = $this->wan_analyst_model->getnext($tahap, $get_next);

        $in_next = array ('p_process_id' => $getnext ,
            't_detail_network_order_id' => $detail_id);
        $this->wan_analyst_model->nexttahap($in_next);

        $up_unrec = array ('p_process_id' => $getnext);
        $this->wan_analyst_model->updateunrec($up_unrec, $detail_id);
        //------------------------------------------------------------------//

        $p_final = array ('t_nw_site_id' => $site_id);
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