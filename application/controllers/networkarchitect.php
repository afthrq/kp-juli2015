<?php

class Networkarchitect extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		session_start();
		$this->load->model('pm_model');
        $this->load->model('verifikator_model');
		if($this->session->userdata('role') != "networkarchitect")
		{
			redirect('user','refresh');	
        }
	}

	function index()
	{
		$this->load->view('includes/header');
    	$this->load->view('network_architect/home');
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

        $keterangan = $this->input->post('keterangan');
        $order_up_id = $this->verifikator_model->getorderupid($site_id);
        $detail_id = $this->verifikator_model->getdetailupid($order_up_id);
        $in_detail_id = array ('p_process_id' => $tahap ,
                't_detail_network_order_id' => $detail_id,
                'keterangan' => $keterangan,
                'closed_by' => $user);
        $work_id = $this->verifikator_model->getworkid($in_detail_id);

        $this->verifikator_model->insert_detail_order($no_form, $tanggal_permintaan, $detail_id,$user);
        $this->verifikator_model->insert_dokumen($tipe_dokumen, $caption, $path, $work_id);
        redirect('networkarchitect','refresh');
    }

    function submit_online_billing()
    {
        $site_id = $this->input->post('site_id');
        //------------------------------------------------------------------//
        $tahap = $this->input->post('tahap');
        $user = $this->input->post('user');
        $order_id = $this->pm_model->getorderupid($site_id);
        $detail_id = $this->pm_model->getdetailupid($order_id);
        $keterangan = $this->input->post('keterangan');
        $in_tahap = array ('p_process_id' => $tahap ,
                't_detail_network_order_id' => $detail_id,
                'keterangan' => $keterangan,
                'closed_by' => $user);
        $tahap_id = $this->pm_model->inputtahap($in_tahap);
        //------------------------------------------------------------------//


        $input = $this->pm_model->getdataorder($site_id);
        $arrayorder = json_decode(json_encode($input),true);
        $nwid = $this->pm_model->copydata($arrayorder);

        $link = $this->pm_model->getarraylink($order_id);
        $router = $this->pm_model->getarrayrouter($order_id);
        $module = $this->pm_model->getarraymodule($order_id);

        $arraylink = array ('t_network_id' => $nwid ,
                    'p_nw_service_id' => $link);
        $arrayrouter = array ('t_network_id' => $nwid ,
                    'p_nw_service_id' => $router);

        $this->pm_model->copyservice($arraylink, $arrayrouter);

        if($module)
        { 
            $arraymodule = array ('t_network_id' => $nwid ,
                        'p_nw_service_id' => $module);

            $this->pm_model->copymodule($arraymodule);
        } 


        redirect('networkarchitect','refresh');
    }

    function submit_koordinasi_provider()
    {
        $site_id = $this->input->post('site_id');
        $tiket_provider = $this->input->post('tiket_provider');
        $pic_provider = $this->input->post('pic_provider');
        $tipe_dokumen = $this->input->post('tipe_dokumen');
        $caption = $this->input->post('caption');
        $filename = $this->input->post('path');

        $path = "uploads/$filename";

        //------------------------------------------------------------------//
        $tahap = $this->input->post('tahap');
        $user = $this->input->post('user');
        $keterangan = $this->input->post('keterangan');
        $order_up_id = $this->pm_model->getorderupid($site_id);
        $detail_id = $this->pm_model->getdetailupid($order_up_id);
        $in_detail_id = array ('p_process_id' => $tahap ,
                't_detail_network_order_id' => $detail_id,
                'keterangan' => $keterangan,
                'closed_by' => $user);
        $work_id = $this->pm_model->getworkid($in_detail_id);
        //------------------------------------------------------------------//

        $this->pm_model->insert_koordinasi_provider($tiket_provider, $pic_provider, $detail_id);
        $this->pm_model->insert_dokumen($tipe_dokumen, $caption, $path, $work_id);
        redirect('networkarchitect','refresh');
    }

    function menu_list_permintaan_kp()
    {
        $data['list_permintaan'] = $this->pm_model->getdatapermintaan();
        $this->load->view('includes/header');
        $this->load->view('network_architect/menu_list_permintaan_kp', $data);
        $this->load->view('includes/footer');
    }

    function menu_list_permintaan_ob()
    {
        $data['list_permintaan'] = $this->pm_model->getdatapermintaan();
        $this->load->view('includes/header');
        $this->load->view('network_architect/menu_list_permintaan_ob', $data);
        $this->load->view('includes/footer');
    }

    function menu_list_permintaan_vp()
    {
        $data['list_permintaan'] = $this->pm_model->getdatapermintaan();
        $this->load->view('includes/header');
        $this->load->view('network_architect/menu_list_permintaan_vp', $data);
        $this->load->view('includes/footer');
    }

    function verifikasi_permintaan()
    {
        $o_id = $this->input->post('order_id');
        $data['lokasiid'] = $this->verifikator_model->getlokasiid($o_id);
        $data['data_permintaan'] = $this->verifikator_model->get_data_permintaan($o_id);  
        $this->load->view('includes/header');
        $this->load->view('network_architect/verifikasi_permintaan', $data);
        $this->load->view('includes/footer');
    }   

    function koordinasi_provider()
    {
        $o_id = $this->input->post('order_id');
        $data['lokasiid'] = $this->pm_model->getlokasiid($o_id);
        $this->load->view('includes/header');
        $this->load->view('network_architect/koordinasi_provider',$data);
        $this->load->view('includes/footer');
    }

    function online_billing()
    {
        $o_id = $this->input->post('order_id');
        $data['lokasiid'] = $this->pm_model->getlokasiid($o_id);
    	$this->load->view('includes/header');
    	$this->load->view('network_architect/online_billing',$data);
    	$this->load->view('includes/footer');
    }

}