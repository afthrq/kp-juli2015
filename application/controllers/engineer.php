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
    	$this->load->view('includes/header');
    	$this->load->view('engineer/instalasi');
    	$this->load->view('includes/footer');
    }

    public function balo()
    {
        $this->load->view('includes/header');
        $this->load->view('engineer/balo');
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

    public function insertdatainstalasi (){
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

        $in_lastmile = array ('name' => $lastmile);
        $this->engineer_model->inputlastmile($in_lastmile); 
        //ambil id dari inputan lastmile
        $lmid = $this->engineer_model->getlastmileid($lastmile);

        $in_traffic = array ('traffic_mgmt' => $traffic);
        $this->engineer_model->updatenwsite($in_traffic);
        $nwsiteid = $this->engineer_model->getnwsiteid($traffic);

        $in_final = array('t_nw_site_id' => $nwsiteid ,
        'ip_wan' => $ipwan ,
        'netmask_wan' => $netmaskwan ,
        'ip_lan' => $iplan ,
        'netmask_lan' => $netmasklan ,
        'ip_loop' => $iploop ,
        'asn' => $asn ,
        'p_lastmile_id' => $lmid ,
        'sla' => $sla ,
        'hostname' => $hostname 
        );
        $data = $this->engineer_model->insertdatafinal($in_final);
        redirect('engineer','refresh');
    }
}