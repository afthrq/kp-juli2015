<?php

class Inputor extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
        $this->load->helper('url');
        $this->load->model('inputor_model');
		session_start();
		if($this->session->userdata('role') != "inputor")
		{
			redirect('user','refresh');	
        }
	}


	public function index()
	{
		$this->load->view('includes/header');
    	$this->load->view('inputor/home');
    	$this->load->view('includes/footer');
	}

    public function form_permintaan()
    {
        //$data['perusahaan_list'] = $this->inputor_model->getdataperusahaan();
        $data['jenis_list'] = $this->inputor_model->getdatajenis();
        $data['layanan_list'] = $this->inputor_model->getservid();
        //$data['paket_list'] = $this->inputor_model->getdatapaket();
        $data['perusahaan_list'] = $this->inputor_model->getcompid();
    	$this->load->view('includes/header');
    	$this->load->view('inputor/form_permintaan',$data);
    	$this->load->view('includes/footer');

    }

    public function update_permintaan()
    {
    	$this->load->view('includes/header');
    	$this->load->view('inputor/update_permintaan');
    	$this->load->view('includes/footer');
    }

    public function buildregion()  
    {  
      echo $company_id = $this->input->post('id',TRUE);  
  
      $districtData['perusahaan_list']=$this->inputor_model->getregionfromcomp($company_id);  
      $output = null;  
      foreach ($districtData['perusahaan_list'] as $row)  
      {    
            $output .= "<option value='".$row->name."'>".$row->name."</option>"; 
      }  
      echo $output;  
    }  

    public function buildpaket()  
    {  
      echo $p_service_id = $this->input->post('id',TRUE);  
  
      $districtData['layanan_list']=$this->inputor_model->getpaketfromlayanan($p_service_id);  
      $output = null;  
      foreach ($districtData['layanan_list'] as $row)  
      {    
            $output .= "<option value='".$row->package."'>".$row->package."</option>"; 
      }  
      echo $output;  
    }  

    public function form_input()
    {
        $lokasi = $this->input->post('lokasi');
        $jenis = $this->input->post('jenis');
        $perusahaan = $this->input->post('perusahaan');
        $alamat = $this->input->post('alamat');
        $region = $this->input->post('region');
        $provinsi = $this->input->post('prov');
        $pic = $this->input->post('pic');
        $layanan = $this->input->post('layanan');
        $paket = $this->input->post('paket');
        $bw = $this->input->post('bw');

        //setting parent table
        $in_prov = array ('name' => $provinsi);
        $in_pic = array ('name' => $pic);       

        $this->inputor_model->inputparent($in_prov,$in_pic);

        $provid = $this->inputor_model->getprovinsiid($provinsi);
        $perid = $this->inputor_model->getperusahaanid($perusahaan);
        $picid = $this->inputor_model->getpicid($pic);
        $jenid = $this->inputor_model->getjenid($jenis);
        $servid = $this->inputor_model->getserviceid($layanan); 


        //setting child table level 1

        $regid = $this->inputor_model->getregid($region);
        $packid = $this->inputor_model->getpackid($paket,$servid);

        //setting child table level 2
        $in_site = array ('provinsi_id' => $provid,
                        'p_site_type_id' => $jenid,
                        'p_region_id' => $regid,
                        'name' => $lokasi ,
                        'address' => $alamat);

        $this->inputor_model->inputlvl2($in_site);
        $siteid = $this->inputor_model->getsiteid($lokasi);         

        //setting child table final
        $in_order = array ('t_nw_site_id' => $siteid,
            'p_nw_service_id' => $packid,
            'bw' => $bw);

        $this->inputor_model->inputfinal($in_order); 

    }
}