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
        $data['count_srv'] = $this->wan_analyst_model->getcountsrv();
        $data['count_imp'] = $this->wan_analyst_model->getcountimp();
        $data['count_balo'] = $this->wan_analyst_model->getcountbalo();
    	$this->load->view('wan_analyst/home',$data);
	}

    public function implementasi()
    {
        $order_id = $this->input->post('order_id');
        $service_id = $this->input->post('service_id');
        $data['count_srv'] = $this->wan_analyst_model->getcountsrv();
        $data['count_imp'] = $this->wan_analyst_model->getcountimp();
        $data['count_balo'] = $this->wan_analyst_model->getcountbalo();
        $data['data_permintaan'] = $this->wan_analyst_model->get_data_permintaan($order_id);


        //get data service type id disini kasih variable $srv_id
        
        if ($service_id == 1)
        {
            $data['update_list'] = $this->wan_analyst_model->getdatabaru($order_id);
            $data['lastmile_list'] = $this->wan_analyst_model->getlastmile();
            $this->load->view('wan_analyst/implementasi_br',$data);
        }
        else if ($service_id == 2 || $service_id == 3 || $service_id == 4 || $service_id == 5)
        {
            $data['update_list'] = $this->wan_analyst_model->getdataupdate($order_id);
            $this->load->view('wan_analyst/implementasi_upd',$data);
        }
        else if ($service_id == 6)
        {
            $data['update_list'] = $this->wan_analyst_model->getdataupdate($order_id);
            $this->load->view('wan_analyst/implementasi_rl',$data);
        }
        else if ($service_id== 7)
        {
            $data['update_list'] = $this->wan_analyst_model->getdataupdate($order_id);
            $this->load->view('wan_analyst/implementasi_dm',$data);
        }
        /*
        $this->load->view('wan_analyst/implementasi_br',$data);
        */
    }

    public function balo()
    {
        $o_id = $this->input->post('order_id');
        $data['count_srv'] = $this->wan_analyst_model->getcountsrv();
        $data['count_imp'] = $this->wan_analyst_model->getcountimp();
        $data['count_balo'] = $this->wan_analyst_model->getcountbalo();
        $data['balo_list'] = $this->wan_analyst_model->getdataupdate($o_id);
        $data['lokasiid'] = $this->wan_analyst_model->getlokasiid($o_id); 
        $this->load->view('wan_analyst/balo',$data);
    }

    public function survey()
    {
        $o_id = $this->input->post('order_id');
        $data['count_srv'] = $this->wan_analyst_model->getcountsrv();
        $data['count_imp'] = $this->wan_analyst_model->getcountimp();
        $data['count_balo'] = $this->wan_analyst_model->getcountbalo();
        $data['lokasiid'] = $this->wan_analyst_model->getlokasiid($o_id); 
        $this->load->view('wan_analyst/survey',$data);
    }

    function menu_list_permintaan_imp()
    {
        $data['list_permintaan'] = $this->wan_analyst_model->getdatapermintaanimp();
        $data['count_srv'] = $this->wan_analyst_model->getcountsrv();
        $data['count_imp'] = $this->wan_analyst_model->getcountimp();
        $data['count_balo'] = $this->wan_analyst_model->getcountbalo();
        $this->load->view('wan_analyst/menu_list_permintaan_imp', $data);
    }

    function menu_list_permintaan_balo()
    {
        $data['list_permintaan'] = $this->wan_analyst_model->getdatapermintaanbalo();
        $data['count_srv'] = $this->wan_analyst_model->getcountsrv();
        $data['count_imp'] = $this->wan_analyst_model->getcountimp();
        $data['count_balo'] = $this->wan_analyst_model->getcountbalo();
        $this->load->view('wan_analyst/menu_list_permintaan_balo', $data);
    }

    function menu_list_permintaan_srv()
    {
        $data['list_permintaan'] = $this->wan_analyst_model->getdatapermintaansrv();
        $data['count_srv'] = $this->wan_analyst_model->getcountsrv();
        $data['count_imp'] = $this->wan_analyst_model->getcountimp();
        $data['count_balo'] = $this->wan_analyst_model->getcountbalo();
        $this->load->view('wan_analyst/menu_list_permintaan_srv', $data);
    }

    public function insert_data_balo ()
    {
        if (!empty($_POST['submit']))
        {
            $site_id = $this->input->post('site_id');
            $baloptm = $this->input->post('baloptm');
            $baloprv = $this->input->post('baloprv');
            $tgltagih = $this->input->post('tgltagih');

            //--------------------------------------------------------------------//
            $tahap = $this->input->post('tahap');
            $user = $this->input->post('user');
            $keterangan = $this->input->post('keterangan');
            $detail_id = $this->wan_analyst_model->getunrecupid($site_id);
            $in_detail_id = array ('keterangan' => $keterangan,
                    'closed_by' => $user);
            $this->wan_analyst_model->updateprocessbalo($in_detail_id,$detail_id);

            $work_id = $this->wan_analyst_model->getworkid($detail_id,$tahap);

            $in_unrec = array ('p_process_id' => $tahap);
            $this->wan_analyst_model->inputunrec($in_unrec, $site_id);

            $get_next = array ('p_process_id' => $tahap);
            $getnext = $this->wan_analyst_model->getnext($tahap, $detail_id);

            $in_next = array ('p_process_id' => $getnext ,
                't_detail_network_order_id' => $detail_id);
            $this->wan_analyst_model->nexttahap($in_next);

            $up_unrec = array ('p_process_id' => $getnext);
            $this->wan_analyst_model->updateunrec($up_unrec, $detail_id);
            //------------------------------------------------------------------//

            $data = array ('no_balo_provider' => $baloprv ,
                    'no_balo_pertamina' => $baloptm ,
                    'tgl_tagih' => $tgltagih);
            $this->wan_analyst_model->inputdatabalo($data, $detail_id);

            $tipe_dokumen = $this->input->post('tipe_dokumen');
            $caption = $this->input->post('caption');
            $filename = $this->input->post('path');
            $path = "uploads/$filename";
            $this->wan_analyst_model->insert_dokumen($tipe_dokumen, $caption, $path, $work_id);

            redirect ('wananalyst','refresh');
        }

        else if (!empty($_POST['reject'])) {
            $site_id = $this->input->post('site_id');
            $tahap = $this->input->post('tahap');
            $detail_id = $this->wan_analyst_model->getunrecupid($site_id);
            $prev_id = $this->wan_analyst_model->getprevid($detail_id);

            $this->wan_analyst_model->rejectunrec($detail_id, $prev_id);
            $this->wan_analyst_model->dropprocess($detail_id, $tahap);
            $this->wan_analyst_model->rejectdate($detail_id, $prev_id);

            redirect('wananalyst','refresh');
        }      
    }

    public function insertdatasurvey ()
    {
        if (!empty($_POST['submit'])) {
            $site_id = $this->input->post('site_id');
            //--------------------------------------------------------------------//
            $tahap = $this->input->post('tahap');
            $user = $this->input->post('user');
            $keterangan = $this->input->post('keterangan');
            $detail_id = $this->wan_analyst_model->getunrecupid($site_id);
            $in_detail_id = array ('keterangan' => $keterangan,
                    'closed_by' => $user);
            $this->wan_analyst_model->updateprocesssrv($in_detail_id,$detail_id);

            $work_id = $this->wan_analyst_model->getworkid($detail_id,$tahap);

            $in_unrec = array ('p_process_id' => $tahap);
            $this->wan_analyst_model->inputunrec($in_unrec, $site_id);

            $get_next = array ('p_process_id' => $tahap);
            $getnext = $this->wan_analyst_model->getnext($tahap, $detail_id);

            $in_next = array ('p_process_id' => $getnext ,
                't_detail_network_order_id' => $detail_id);
            $this->wan_analyst_model->nexttahap($in_next);

            $up_unrec = array ('p_process_id' => $getnext);
            $this->wan_analyst_model->updateunrec($up_unrec, $detail_id);
            //------------------------------------------------------------------//
            redirect('wananalyst','refresh');
        }

        else if (!empty($_POST['reject'])) {
            $site_id = $this->input->post('site_id');
            $tahap = $this->input->post('tahap');
            $detail_id = $this->wan_analyst_model->getunrecupid($site_id);
            $prev_id = $this->wan_analyst_model->getprevid($detail_id);

            $this->wan_analyst_model->rejectunrec($detail_id, $prev_id);
            $this->wan_analyst_model->dropprocess($detail_id, $tahap);
            $this->wan_analyst_model->rejectdate($detail_id, $prev_id);

            redirect('wananalyst','refresh');
        }
    }

    public function insertdatainstalasi ()
    {
        if (!empty($_POST['submit']))   {
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

            $lmid = $this->wan_analyst_model->getlastmileid($lastmile);
            $in_traffic = array ('traffic_mgmt' => $traffic);       
            $cek_lokasi = array ('site_name' => $lokasi);
            $this->wan_analyst_model->updatenwsite($in_traffic,$lokasi);
            $site_id = $this->wan_analyst_model->getnwsiteid($cek_lokasi);


            //--------------------------------------------------------------------//
            $tahap = $this->input->post('tahap');
            $user = $this->input->post('user');
            $keterangan = $this->input->post('keterangan');
            $detail_id = $this->wan_analyst_model->getunrecupid($site_id);
            $in_detail_id = array ('keterangan' => $keterangan,
                    'closed_by' => $user);
            $this->wan_analyst_model->updateprocessimp($in_detail_id,$detail_id);

            $work_id = $this->wan_analyst_model->getworkid($detail_id, $tahap);

            $in_unrec = array ('p_process_id' => $tahap);
            $this->wan_analyst_model->inputunrec($in_unrec, $site_id);

            $get_next = array ('p_process_id' => $tahap);
            $getnext = $this->wan_analyst_model->getnext($tahap, $detail_id);

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
            'p_lastmile_id' => $lmid,
            'sla' => $sla ,
            'hostname' => $hostname 
            );
            $data = $this->wan_analyst_model->insertdatafinal($in_final,$p_final);
            redirect('wananalyst','refresh');
        }

        else if (!empty($_POST['reject'])) {
            $lokasi = $this->input->post('lokasi');
            $cek_lokasi = array ('site_name' => $lokasi);
            $site_id = $this->wan_analyst_model->getnwsiteid($cek_lokasi);
            $tahap = $this->input->post('tahap');
            $detail_id = $this->wan_analyst_model->getunrecupid($site_id);
            $prev_id = $this->wan_analyst_model->getprevid($detail_id);

            $this->wan_analyst_model->rejectunrec($detail_id, $prev_id);
            $this->wan_analyst_model->dropprocess($detail_id, $tahap);
            $this->wan_analyst_model->rejectdate($detail_id, $prev_id);

            redirect('wananalyst','refresh');
        }
    }

    public function updatedatainstalasi()
    {
        if (!empty($_POST['reject']))   {
            $lokasi = $this->input->post('lokasi');
            $cek_lokasi = array ('site_name' => $lokasi);
            $site_id = $this->wan_analyst_model->getnwsiteid($cek_lokasi);

            $traffic = $this->input->post('traffic');
            $in_traffic = array ('traffic_mgmt' => $traffic);

            //--------------------------------------------------------------------//
            $tahap = $this->input->post('tahap');
            $user = $this->input->post('user');
            $keterangan = $this->input->post('keterangan');
            $detail_id = $this->wan_analyst_model->getunrecupid($site_id);
            $in_detail_id = array ('keterangan' => $keterangan,
                    'closed_by' => $user);

            $this->wan_analyst_model->updateprocessimp($in_detail_id,$detail_id);

            $work_id = $this->wan_analyst_model->getworkid($detail_id, $tahap);

            $in_unrec = array ('p_process_id' => $tahap);
            $this->wan_analyst_model->inputunrec($in_unrec, $site_id);

            $get_next = array ('p_process_id' => $tahap);
            $getnext = $this->wan_analyst_model->getnext($tahap, $detail_id);

            $in_next = array ('p_process_id' => $getnext ,
                't_detail_network_order_id' => $detail_id);
            $this->wan_analyst_model->nexttahap($in_next);

            $up_unrec = array ('p_process_id' => $getnext);
            $this->wan_analyst_model->updateunrec($up_unrec, $detail_id);
            //------------------------------------------------------------------//

            $copynetwork = $this->wan_analyst_model->getdataupinstalasi($site_id);
            $this->wan_analyst_model->updateorder($copynetwork, $detail_id);
            $this->wan_analyst_model->updatesite($in_traffic,$site_id);
            redirect('wananalyst','refresh');
        }

        else if (!empty($_POST['reject'])) {
            $site_id = $this->input->post('site_id');
            $tahap = $this->input->post('tahap');
            $detail_id = $this->wan_analyst_model->getunrecupid($site_id);
            $prev_id = $this->wan_analyst_model->getprevid($detail_id);

            $this->wan_analyst_model->rejectunrec($detail_id, $prev_id);
            $this->wan_analyst_model->dropprocess($detail_id, $tahap);
            $this->wan_analyst_model->rejectdate($detail_id, $prev_id);

            redirect('wananalyst','refresh');
        }
    }

    public function dismantle ()
    {
        if (!empty($_POST['reject']))   {
            $lokasi = $this->input->post('lokasi');
            $cek_lokasi = array ('site_name' => $lokasi);
            $site_id = $this->wan_analyst_model->getnwsiteid($cek_lokasi);

            //--------------------------------------------------------------------//
            $tahap = $this->input->post('tahap');
            $user = $this->input->post('user');
            $keterangan = $this->input->post('keterangan');
            $detail_id = $this->wan_analyst_model->getunrecupid($site_id);
            $in_detail_id = array ('keterangan' => $keterangan,
                    'closed_by' => $user);

            $this->wan_analyst_model->updateprocessimp($in_detail_id,$detail_id);

            $work_id = $this->wan_analyst_model->getworkid($detail_id, $tahap);

            $in_unrec = array ('p_process_id' => $tahap);
            $this->wan_analyst_model->inputunrec($in_unrec, $site_id);

            $get_next = array ('p_process_id' => $tahap);
            $getnext = $this->wan_analyst_model->getnext($tahap, $detail_id);

            $in_next = array ('p_process_id' => $getnext ,
                't_detail_network_order_id' => $detail_id);
            $this->wan_analyst_model->nexttahap($in_next);

            $up_unrec = array ('p_process_id' => $getnext);
            $this->wan_analyst_model->updateunrec($up_unrec, $detail_id);
            //------------------------------------------------------------------//
            redirect('wananalyst','refresh');
        }

        else if (!empty($_POST['reject'])) {
            $site_id = $this->input->post('site_id');
            $tahap = $this->input->post('tahap');
            $detail_id = $this->wan_analyst_model->getunrecupid($site_id);
            $prev_id = $this->wan_analyst_model->getprevid($detail_id);

            $this->wan_analyst_model->rejectunrec($detail_id, $prev_id);
            $this->wan_analyst_model->dropprocess($detail_id, $tahap);
            $this->wan_analyst_model->rejectdate($detail_id, $prev_id);

            redirect('wananalyst','refresh');
        }
    }
}