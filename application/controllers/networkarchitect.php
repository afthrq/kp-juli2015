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
        $data['count_vp'] = $this->verifikator_model->getcountvp();
        $data['count_kp'] = $this->verifikator_model->getcountkp();
        $data['count_ob'] = $this->verifikator_model->getcountob();       
    	$this->load->view('network_architect/home', $data);
	}

    function submit_verifikasi_permintaan()
    {
        if (!empty($_POST['submit']))
        {
            $site_id = $this->input->post('site_id');
            $no_form = $this->input->post('no_form');
            $tanggal_permintaan = $this->input->post('tanggal_permintaan');
            $tipe_dokumen = $this->input->post('tipe_dokumen');
            $caption = $this->input->post('caption');
            $filename = $this->input->post('path');

            $path = "uploads/$filename";
            //--------------------------------------------------------------------//
            $tahap = $this->input->post('tahap');
            $user = $this->input->post('user');
            $keterangan = $this->input->post('keterangan');
            $detail_id = $this->verifikator_model->getunrecupid($site_id);
            $in_detail_id = array ('keterangan' => $keterangan,
                    'closed_by' => $user);
            $this->verifikator_model->updateprocessvp($in_detail_id,$detail_id);

            $work_id = $this->verifikator_model->getworkid($detail_id,$tahap);

            $in_unrec = array ('p_process_id' => $tahap);
            $this->verifikator_model->inputunrec($in_unrec, $site_id);

            $get_next = array ('p_process_id' => $tahap);
            $getnext = $this->verifikator_model->getnext($tahap, $detail_id);

            $in_next = array ('p_process_id' => $getnext ,
                't_detail_network_order_id' => $detail_id);
            $this->verifikator_model->nexttahap($in_next);

            $up_unrec = array ('p_process_id' => $getnext);
            $this->verifikator_model->updateunrec($up_unrec, $detail_id);
            //------------------------------------------------------------------//

            $this->verifikator_model->insert_detail_order($no_form, $tanggal_permintaan, $detail_id, $user);
            $this->verifikator_model->insert_dokumen($tipe_dokumen, $caption, $path, $work_id);
            redirect('networkarchitect','refresh');
        }

        else if (!empty($_POST['reject'])) {
            $site_id = $this->input->post('site_id');
            $tahap = $this->input->post('tahap');
            $detail_id = $this->verifikator_model->getunrecupid($site_id);
            $prev_id = $this->verifikator_model->getprevid($detail_id);

            if($prev_id == 1)
            {
                $this->verifikator_model->dropdetailnw($detail_id);
            }
            $this->verifikator_model->rejectunrec($detail_id, $prev_id);
            $this->verifikator_model->dropprocess($detail_id, $tahap);
            $this->verifikator_model->rejectdate($detail_id, $prev_id);

            redirect('networkarchitect','refresh');
        }
    }

    function submit_online_billing()
    {
        if (!empty($_POST['submit']))   {
            $site_id = $this->input->post('site_id');
            //--------------------------------------------------------------------//
            $tahap = $this->input->post('tahap');
            $user = $this->input->post('user');
            $keterangan = $this->input->post('keterangan');
            $detail_id = $this->verifikator_model->getunrecupid($site_id);
            $in_detail_id = array ('keterangan' => $keterangan,
                    'closed_by' => $user);
            $this->verifikator_model->updateprocessob($in_detail_id,$detail_id);

            $work_id = $this->verifikator_model->getworkid($detail_id, $tahap);

            $in_unrec = array ('p_process_id' => $tahap);
            $this->verifikator_model->inputunrec($in_unrec, $site_id);

            $get_next = array ('p_process_id' => $tahap);
            $getnext = $this->verifikator_model->getnext($tahap, $detail_id);

            $in_next = array ('p_process_id' => $getnext ,
                't_detail_network_order_id' => $detail_id);
            $this->verifikator_model->nexttahap($in_next);

            $up_unrec = array ('p_process_id' => $getnext);
            $this->verifikator_model->updateunrec($up_unrec, $detail_id);
            //------------------------------------------------------------------//

            $service_id = $this->input->post('service_id');
            if($service_id == 1)
            {    
                $input = $this->pm_model->getdataorder($site_id);
                $arrayorder = json_decode(json_encode($input),true);
                $nwid = $this->pm_model->copydata($arrayorder);


                $order_id = $this->pm_model->getorderupid($site_id);
                $countserv = $this->pm_model->getcountserv($order_id);
                $link = $this->pm_model->getarraylink($site_id);
                $router = $this->pm_model->getarrayrouter($site_id);

                $arraylink = array ('t_network_id' => $nwid ,
                            'p_nw_service_id' => $link);
                $arrayrouter = array ('t_network_id' => $nwid ,
                            'p_nw_service_id' => $router);

                $this->pm_model->copyservice($arraylink, $arrayrouter);

                if($countserv > 2)
                {
                    $module = $this->pm_model->getarraymodule($site_id);
                    $arraymodule = array ('t_network_id' => $nwid ,
                    'p_nw_service_id' => $module);
                    $this->pm_model->copymodule($arraymodule);
                }
            }

            else if ($service_id == 2 || $service_id == 3 || $service_id == 4 || $service_id == 5 || $service_id == 6)
            {
                $input = $this->pm_model->getdataorderup($site_id);
                $nwid = $this->pm_model->getnetworkid($site_id);
                $arrayorder = json_decode(json_encode($input),true);

                $this->pm_model->copydataup($arrayorder,$nwid);

                $order_id = $this->pm_model->getorderupid($site_id);
                $link = $this->pm_model->getarraylink($site_id);

                $arraylink = array ('p_nw_service_id' => $link);

                $this->pm_model->copyserviceup($arraylink, $nwid); 
            }

            else if($service_id == 7)
            {     
                $this->pm_model->dismantle($site_id);
            }

            $this->pm_model->dropunrecdata($detail_id);
            redirect('networkarchitect','refresh');
        }

        else if (!empty($_POST['reject'])) {
            $site_id = $this->input->post('site_id');
            $tahap = $this->input->post('tahap');
            $detail_id = $this->verifikator_model->getunrecupid($site_id);
            $prev_id = $this->verifikator_model->getprevid($detail_id);

            $this->verifikator_model->rejectunrec($detail_id, $prev_id);
            $this->verifikator_model->dropprocess($detail_id, $tahap);
            $this->verifikator_model->rejectdate($detail_id, $prev_id);

            redirect('networkarchitect','refresh');
        } 
    }

    function submit_koordinasi_provider()
    {

        if (!empty($_POST['submit'])) 
        {
            $site_id = $this->input->post('site_id');
            $tiket_provider = $this->input->post('tiket_provider');
            $pic_provider = $this->input->post('pic_provider');
            $tipe_dokumen = $this->input->post('tipe_dokumen');
            $caption = $this->input->post('caption');
            $filename = $this->input->post('path');

            $path = "uploads/$filename";

            //--------------------------------------------------------------------//
            $tahap = $this->input->post('tahap');
            $user = $this->input->post('user');
            $keterangan = $this->input->post('keterangan');
            $detail_id = $this->verifikator_model->getunrecupid($site_id);
            $in_detail_id = array ('keterangan' => $keterangan,
                    'closed_by' => $user);
            $this->verifikator_model->updateprocesskp($in_detail_id,$detail_id);

            $work_id = $this->verifikator_model->getworkid($detail_id,$tahap);

            $in_unrec = array ('p_process_id' => $tahap);
            $this->verifikator_model->inputunrec($in_unrec, $site_id);

            $get_next = array ('p_process_id' => $tahap);
            $getnext = $this->verifikator_model->getnext($tahap, $detail_id);

            $in_next = array ('p_process_id' => $getnext ,
                't_detail_network_order_id' => $detail_id);
            $this->verifikator_model->nexttahap($in_next);

            $up_unrec = array ('p_process_id' => $getnext);
            $this->verifikator_model->updateunrec($up_unrec, $detail_id);
            //------------------------------------------------------------------//

            $this->pm_model->insert_koordinasi_provider($tiket_provider, $pic_provider, $detail_id);
            $this->pm_model->insert_dokumen($tipe_dokumen, $caption, $path, $work_id);
            redirect('networkarchitect','refresh');
        }
        
        else if (!empty($_POST['reject'])) {
            $site_id = $this->input->post('site_id');
            $tahap = $this->input->post('tahap');
            $detail_id = $this->verifikator_model->getunrecupid($site_id);
            $prev_id = $this->verifikator_model->getprevid($detail_id);

            $this->verifikator_model->rejectunrec($detail_id, $prev_id);
            $this->verifikator_model->dropprocess($detail_id, $tahap);
            $this->verifikator_model->rejectdate($detail_id, $prev_id);

            redirect('networkarchitect','refresh');
        }
    }

    function menu_list_permintaan_kp()
    {
        $data['count_vp'] = $this->verifikator_model->getcountvp();
        $data['count_kp'] = $this->verifikator_model->getcountkp();
        $data['count_ob'] = $this->verifikator_model->getcountob(); 
        $data['list_permintaan'] = $this->verifikator_model->getdatapermintaankp();
        $this->load->view('network_architect/menu_list_permintaan_kp', $data);
    }

    function menu_list_permintaan_ob()
    {
        $data['count_vp'] = $this->verifikator_model->getcountvp();
        $data['count_kp'] = $this->verifikator_model->getcountkp();
        $data['count_ob'] = $this->verifikator_model->getcountob(); 
        $data['list_permintaan'] = $this->verifikator_model->getdatapermintaanob();
        $this->load->view('network_architect/menu_list_permintaan_ob', $data);
    }

    function menu_list_permintaan_vp()
    {
        $data['count_vp'] = $this->verifikator_model->getcountvp();
        $data['count_kp'] = $this->verifikator_model->getcountkp();
        $data['count_ob'] = $this->verifikator_model->getcountob(); 
        $data['list_permintaan'] = $this->verifikator_model->getdatapermintaanvp();
        $this->load->view('network_architect/menu_list_permintaan_vp', $data);
    }

    function verifikasi_permintaan()
    {

        $o_id = $this->input->post('order_id');
        $doc_id = $this->input->post('doc_id');
        $data['count_vp'] = $this->verifikator_model->getcountvp();
        $data['breadcrumbs'] = $this->verifikator_model->getbreadcrumbs($o_id);
        $data['count_kp'] = $this->verifikator_model->getcountkp();
        $data['count_ob'] = $this->verifikator_model->getcountob(); 
        $data['lokasiid'] = $this->verifikator_model->getlokasiid($o_id);
        $data['data_permintaan'] = $this->verifikator_model->get_data_permintaan($o_id);
        $data['dokumenid'] = $this->verifikator_model->getdocname($doc_id);
        $this->load->view('network_architect/verifikasi_permintaan', $data);
    }   

    function koordinasi_provider()
    {
        $o_id = $this->input->post('order_id');
        $data['breadcrumbs'] = $this->verifikator_model->getbreadcrumbs($o_id);
        $data['count_vp'] = $this->verifikator_model->getcountvp();
        $data['count_kp'] = $this->verifikator_model->getcountkp();
        $data['count_ob'] = $this->verifikator_model->getcountob(); 
        $data['lokasiid'] = $this->verifikator_model->getlokasiid($o_id);
        $this->load->view('network_architect/koordinasi_provider',$data);
    }

    function online_billing()
    {
        $o_id = $this->input->post('order_id');
        $data['breadcrumbs'] = $this->verifikator_model->getbreadcrumbs($o_id);
        $data['count_vp'] = $this->verifikator_model->getcountvp();
        $data['count_kp'] = $this->verifikator_model->getcountkp();
        $data['count_ob'] = $this->verifikator_model->getcountob(); 
        $data['sitenserviceid'] = $this->pm_model->getsitenserviceid($o_id);
    	$this->load->view('network_architect/online_billing',$data);
    }

}