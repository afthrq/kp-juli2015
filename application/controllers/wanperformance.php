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
        $data['lokasiid'] = $this->wan_performance_model->get_id($o_id);
        $this->load->view('wan_performance_analyst/monitoring', $data);
    }

     public function insert_monitoring ()
     {
        if (!empty($_POST['submit']))   {
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


            $data = array(
            'mon_cacti' => $mon_cacti ,
            'mon_npmd' => $mon_npmd ,
            'mon_sp' => $mon_sp ,
            );
            $data = $this->wan_performance_model->insert_data_balo($data,$site_id);
            redirect('wanperformance','refresh');
        }

        else if (!empty($_POST['reject'])) {
            $lokasi = $this->input->post('lokasi');
            $cek_lokasi = array ('site_name' => $lokasi);
            $site_id = $this->wan_performance_model->getsiteid($cek_lokasi);
            $tahap = $this->input->post('tahap');
            $detail_id = $this->wan_performance_model->getunrecupid($site_id);
            $prev_id = $this->wan_performance_model->getprevid($detail_id);

            $this->wan_performance_model->rejectunrec($detail_id, $prev_id);
            $this->wan_performance_model->dropprocess($detail_id, $tahap);
            $this->wan_performance_model->rejectdate($detail_id, $prev_id);

            redirect('wanperformance','refresh');
        } 
    }

    

    

}