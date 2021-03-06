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

    public function update()
    {
        $o_id = $this->input->post('order_id');
        $data['update_list'] = $this->inputor_model->getdataupdate($o_id);
        $data['upserv_list'] = $this->inputor_model->getupdateid();
        $data['lokasiid'] = $this->inputor_model->getlokasiid($o_id); 
        $this->load->view('includes/header');
        $this->load->view('inputor/update_permintaan',$data);
        $this->load->view('includes/footer');
    }

    public function index()
    {
        $this->load->view('includes/header');
        $this->load->view('inputor/home');
        $this->load->view('includes/footer');
    }

    public function form_permintaan()
    {        

        $data['jenis_list'] = $this->inputor_model->getdatajenis();
        $data['layanan_list'] = $this->inputor_model->getservid();
        $data['perusahaan_list'] = $this->inputor_model->getcompid();
        $this->load->view('includes/header');
        $this->load->view('inputor/form_permintaan',$data);
        $this->load->view('includes/footer');

    }

    function menu_list_permintaan()
    {        
        $data['list_permintaan'] = $this->inputor_model->getdatapermintaan();
        $this->load->view('includes/header');
        $this->load->view('inputor/menu_list_permintaan', $data);
        $this->load->view('includes/footer');
    }


    public function buildregion()  
    {  
      echo $company_id = $this->input->post('id',TRUE);  
  
      $districtData['perusahaan_list']=$this->inputor_model->getregionfromcomp($company_id); 
      $output = null;  
      foreach ($districtData['perusahaan_list'] as $row)  
      {    
            $output .= "<option value='".$row->region_name."'>".$row->region_name."</option>"; 
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

    public function buildpaketupdate()  
    {  
      echo $p_service_id_up = $this->input->post('id',TRUE);  
  
      $districtData['upserv_list']=$this->inputor_model->getpaketfromlayanan_up($p_service_id_up);  
      $output = null;  
      foreach ($districtData['upserv_list'] as $row)  
      {    
            $output .= "<option value='".$row->package."'>".$row->package."</option>"; 
      }  
      echo $output;  
    }  

    public function form_input()
    {
        //------------------------------------------------------------------//
        $proses = $this->input->post('proses');
        $in_proses = array ('p_order_type_id' => $proses);
        $serv_type_id = $this->inputor_model->inputproses($in_proses);
        //------------------------------------------------------------------//

        //------------------------------------------------------------------//
        $tahap = $this->input->post('tahap');
        $user = $this->input->post('user');
        $in_tahap = array ('p_process_id' => $tahap ,
                't_detail_network_order_id' => $serv_type_id,
                'closed_by' => $user);
        $tahap_id = $this->inputor_model->inputtahap($in_tahap);
        //------------------------------------------------------------------//

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
        $in_prov = array ('provinsi_name' => $provinsi);
        $in_pic = array ('pic_name' => $pic);

        $this->inputor_model->inputparent($in_prov,$in_pic);

        $provid = $this->inputor_model->getprovinsiid($provinsi);
        $picid = $this->inputor_model->getpicid($pic);
        $jenid = $this->inputor_model->getjenid($jenis);
        $regid = $this->inputor_model->getregid($region);

        $cekpackid = array ('p_service_id' => $layanan ,
                    'package' => $paket);

        $packid = $this->inputor_model->getpackid($cekpackid);

        //setting child table level 2
        $in_site = array ('provinsi_id' => $provid,
                        'p_site_type_id' => $jenid,
                        'p_region_id' => $regid,
                        'site_name' => $lokasi ,
                        'address' => $alamat);

        $this->inputor_model->inputlvl2($in_site);
        $siteid = $this->inputor_model->getsiteid($lokasi);


        //setting child table level 3
        $in_order = array ('t_nw_site_id' => $siteid,
                        't_detail_network_order_id' => $serv_type_id ,
                        'bw' => $bw);

        $orderid =$this->inputor_model->getorderid($in_order);
        
        //setting child table final
        $in_pic_site = array ('t_nw_site_id' => $siteid,
                     't_pic_id' => $picid);

        $in_serv = array ('t_network_order_id' => $orderid ,
                        'p_nw_service_id' => $packid);

        $this->inputor_model->inputfinal($in_serv, $in_pic_site); 
        redirect('inputor','refresh');
    }

    public function form_update()
    {
        //------------------------------------------------------------------//
        $proses = $this->input->post('proses');
        $in_proses = array ('p_order_type_id' => $proses);
        $serv_type_id = $this->inputor_model->inputproses($in_proses);
        //------------------------------------------------------------------//

        $site_id = $this->input->post('site_id');
        $serv_up = $_POST['up_layanan'];
        $pack_up = $this->input->post('update_paket');
        $bw_up = $this->input->post('update_bw');


        $cekpackid = array ('p_service_id' => $serv_up ,
                    'package' => $pack_up);

        $packid = $this->inputor_model->getpackid($cekpackid);

        $getnworderid = array ('t_nw_site_id' => $site_id ,
                    't_detail_network_order_id' => $serv_type_id ,
                     'bw' => $bw_up);

        $order_up_id = $this->inputor_model->getorderupid($getnworderid);

        $update = array ('p_nw_service_id' => $packid ,
                't_network_order_id' => $order_up_id);

        $this->inputor_model->updatefinal($update);
        redirect ('inputor','refresh');
    }

    public function suggestions()
    {
        $id = $this->input->post('id',TRUE);
        $rows = $this->inputor_model->get_alamat($id);
        $json_array = array();
        foreach ($rows as $row)
            $json_array[]=$row->address;
        echo json_encode($json_array);
    }
  
}