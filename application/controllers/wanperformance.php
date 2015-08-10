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
        $data['count_mon'] = $this->wan_performance_model->getcountmon();
        $this->load->model('inputor_model');
        $data['list_permintaan'] = $this->inputor_model->getdatapermintaan();
    	$this->load->view('wan_performance_analyst/home',$data);
	}

    function menu_list_permintaan()
    {
        $data['count_mon'] = $this->wan_performance_model->getcountmon();
        $data['list_permintaan'] = $this->wan_performance_model->getdatapermintaan();        
        $this->load->view('wan_performance_analyst/menu_list_permintaan', $data);
    }

    function monitoring()
    {        
        $o_id = $this->input->post('order_id');        

        $data['count_mon'] = $this->wan_performance_model->getcountmon();
        $data['breadcrumbs'] = $this->wan_performance_model->getbreadcrumbs($o_id);
        $data['count_uat'] = $this->wan_performance_model->getcountmon();
        $data['monitoring_list'] = $this->wan_performance_model->getdatamonitoring();
        $data['lokasiid'] = $this->wan_performance_model->getlokasiid($o_id);
        $data['data_permintaan'] = $this->wan_performance_model->get_data_permintaan($o_id);
        $data['list_keterangan'] = $this->wan_performance_model->getproses($o_id);
        $data['reject'] = $this->wan_performance_model->get_ket_reject($o_id);
        $this->load->view('wan_performance_analyst/monitoring', $data);
    }

    public function insert_monitoring ()
    {  
        $lokasi = $this->input->post('lokasi');
        $cek_lokasi = array ('site_name' => $lokasi);
        $site_id = $this->wan_performance_model->getsiteid($cek_lokasi);
        $order_id = $this->wan_performance_model->getorderid($site_id);
        if(isset($_POST['submit']))
        {
            if(isset($_POST['monitoring']))
            {
                $id=$_POST['monitoring'];
                for($i=0;$i<count($id);$i++)
                {  
                   $monid = $this->wan_performance_model->getidmon($id[$i]);

                   $input = array ('mon_id' => $monid ,
                            't_network_order_id' => $order_id);
                   $this->wan_performance_model->insertmon($input);
                }
            }
        }
        $lokasi = $this->input->post('lokasi');

        $cek_lokasi = array ('site_name' => $lokasi);
        $site_id = $this->wan_performance_model->getsiteid($cek_lokasi);
        //--------------------------------------------------------------------//
        $tahap = $this->input->post('tahap');
        $user = $this->input->post('user');
        $keterangan = $this->input->post('keterangan');
        $detail_id = $this->wan_performance_model->getunrecupid($site_id);
        $in_detail_id = array ('keterangan' => $keterangan,
                'closed_by' => $user);
        $this->wan_performance_model->updateprocessmon($in_detail_id,$detail_id);

        $work_id = $this->wan_performance_model->getworkid($detail_id);

        $in_unrec = array ('p_process_id' => $tahap);
        $this->wan_performance_model->inputunrec($in_unrec, $site_id);

        $get_next = array ('p_process_id' => $tahap);
        $getnext = $this->wan_performance_model->getnext($tahap, $detail_id);

        $in_next = array ('p_process_id' => $getnext ,
            't_detail_network_order_id' => $detail_id);
        $this->wan_performance_model->nexttahap($in_next);

        $up_unrec = array ('p_process_id' => $getnext);
        $this->wan_performance_model->updateunrec($up_unrec, $detail_id);
        //------------------------------------------------------------------//
        $tipe_dokumen = $this->input->post('tipe_dokumen');
        $caption = $this->input->post('caption');
        $filename = $this->input->post('path');
        $path = "uploads/$filename";
        $this->wan_performance_model->insert_dokumen($tipe_dokumen, $caption, $path, $work_id);
        
        echo "<script type='text/javascript'>alert('Data berhasil di submit')</script>";
        redirect('wanperformance','refresh');
    }

    function reject()
    {
        $site_id = $this->input->post('site_id');
        $tahap = $this->input->post('tahap');
        $reject = $this->input->post('ket_reject');
        $detail_id = $this->wan_performance_model->getunrecupid($site_id);
        $prev_id = $this->wan_performance_model->getprevid($detail_id);

        $this->wan_performance_model->rejectunrec($detail_id, $prev_id, $reject);
        $this->wan_performance_model->dropprocess($detail_id, $tahap);
        $this->wan_performance_model->reject($detail_id, $prev_id, $reject);

        redirect('wanperformance','refresh');
    }

    function data_wan()
    {   
        $data['count_mon'] = $this->wan_performance_model->getcountmon(); 
        $o_id = $this->input->post('order_id');
        $this->load->model('inputor_model');  
        $data['data_wan'] = $this->inputor_model->getdataupdate($o_id);
        $data['pic_list'] = $this->inputor_model->getdataupdatepic($o_id);
        $data['router_list'] = $this->inputor_model->getrouter($o_id);
        $data['modul_list'] = $this->inputor_model->getmodul($o_id);
        $this->load->view('wan_performance/data_wan', $data);
    }

}