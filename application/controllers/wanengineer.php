<?php

class Wanengineer extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		session_start();
        $this->load->model('wan_engineer_model');
		if($this->session->userdata('role') != "wanengineer")
		{
			redirect('user','refresh');	
        }
	}

	function index()
	{
        $data['count_uat'] = $this->wan_engineer_model->getcountuat();
    	$this->load->view('wan_engineer/home',$data);
	}

    function submit_upload_wan_engineer()
    {
        $site_id = $this->input->post('site_id');
        //--------------------------------------------------------------------//
        $tahap = $this->input->post('tahap');
        $user = $this->input->post('user');
        $keterangan = $this->input->post('keterangan');
        $detail_id = $this->wan_engineer_model->getunrecupid($site_id);
        $in_detail_id = array ('keterangan' => $keterangan,
                'closed_by' => $user);

        $this->wan_engineer_model->updateprocessuat($in_detail_id,$detail_id);

        $work_id = $this->wan_engineer_model->getworkid($detail_id, $tahap);

        $in_unrec = array ('p_process_id' => $tahap);
        $this->wan_engineer_model->inputunrec($in_unrec, $site_id);

        $get_next = array ('p_process_id' => $tahap);
        $getnext = $this->wan_engineer_model->getnext($tahap, $detail_id);

        $in_next = array ('p_process_id' => $getnext ,
            't_detail_network_order_id' => $detail_id);
        $this->wan_engineer_model->nexttahap($in_next);

        $up_unrec = array ('p_process_id' => $getnext);
        $this->wan_engineer_model->updateunrec($up_unrec, $detail_id);
        //------------------------------------------------------------------//

        $tipe_dokumen = $this->input->post('tipe_dokumen');
        $caption = $this->input->post('caption');
        $filename = $this->input->post('path');
        $path = "uploads/$filename";
        $this->wan_engineer_model->insert_dokumen($tipe_dokumen, $caption, $path, $work_id);

        redirect('wanengineer','refresh');
    }

    function menu_list_permintaan()
    {
        $data['count_uat'] = $this->wan_engineer_model->getcountuat();
        $data['list_permintaan'] = $this->wan_engineer_model->getdatapermintaan();        
        $this->load->view('wan_engineer/menu_list_permintaan', $data);
    }

    function uat()
    {
        $o_id = $this->input->post('order_id');
        $data['breadcrumbs'] = $this->wan_engineer_model->getbreadcrumbs($o_id);
        $data['count_uat'] = $this->wan_engineer_model->getcountuat();
        $data['lokasiid'] = $this->wan_engineer_model->getlokasiid($o_id);
        $data['data_permintaan'] = $this->wan_engineer_model->get_data_permintaan($o_id);
        $data['list_keterangan'] = $this->wan_engineer_model->getproses($o_id);
        $this->load->view('wan_engineer/uat',$data);
    }    

    function reject()
    {
        $site_id = $this->input->post('site_id');
        $tahap = $this->input->post('tahap');
        $detail_id = $this->verifikator_model->getunrecupid($site_id);
        $prev_id = $this->verifikator_model->getprevid($detail_id);

        $this->verifikator_model->rejectunrec($detail_id, $prev_id);
        $this->verifikator_model->dropprocess($detail_id, $tahap);
        $this->verifikator_model->rejectdate($detail_id, $prev_id);

        redirect('wanengineer','refresh');
    }

}