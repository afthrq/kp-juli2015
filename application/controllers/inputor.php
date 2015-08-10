<?php

class Inputor extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
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
        $data['pic_list'] = $this->inputor_model->getdataupdatepic($o_id);
        $data['provider_list'] = $this->inputor_model->getdataprovider();
        $data['upserv_list'] = $this->inputor_model->getupdateid();
        $data['lokasiid'] = $this->inputor_model->getlokasiid($o_id); 
        $data['reject'] = $this->inputor_model->get_ket_reject($o_id);
        $this->load->view('inputor/update_permintaan',$data);
    }

    public function relokasi()
    {
        $o_id = $this->input->post('order_id');
        $data['update_list'] = $this->inputor_model->getdataupdate($o_id);
        $data['pic_list'] = $this->inputor_model->getdataupdatepic($o_id);
        $data['perusahaan_list'] = $this->inputor_model->getcompid();
        $data['upserv_list'] = $this->inputor_model->getupdateid();
        $data['lokasiid'] = $this->inputor_model->getlokasiid($o_id); 
        $data['reject'] = $this->inputor_model->get_ket_reject($o_id);
        $data['jenis_list'] = $this->inputor_model->getdatajenis();
        $data['provinsi_list'] = $this->inputor_model->getdataprovinsi();
        $this->load->view('inputor/relokasi',$data);
    }

    public function dismantle()
    {
        $o_id = $this->input->post('order_id');
        $data['update_list'] = $this->inputor_model->getdataupdate($o_id);
        $data['pic_list'] = $this->inputor_model->getdataupdatepic($o_id);
        $data['upserv_list'] = $this->inputor_model->getupdateid();
        $data['router_list'] = $this->inputor_model->getrouter($o_id);
        $data['modul_list'] = $this->inputor_model->getmodul($o_id);
        $data['lokasiid'] = $this->inputor_model->getlokasiid($o_id); 
        $data['reject'] = $this->inputor_model->get_ket_reject($o_id);
        $this->load->view('inputor/dismantle',$data);
    }

    public function index()
    {
        $data['list_permintaan'] = $this->inputor_model->getdatapermintaan();
        $this->load->view('inputor/home', $data);
    }

    function data_wan()
    {        
        $data['list_permintaan'] = $this->inputor_model->getdatapermintaan();
        $this->load->view('inputor/data_wan', $data);
    }

    public function form_permintaan()
    {        
        $data['jenis_list'] = $this->inputor_model->getdatajenis();
        $data['provider_list'] = $this->inputor_model->getdataprovider();
        $data['provinsi_list'] = $this->inputor_model->getdataprovinsi();
        $data['layanan_list'] = $this->inputor_model->getservid();
        $data['perusahaan_list'] = $this->inputor_model->getcompid();
        $this->load->view('inputor/form_permintaan',$data);
    }

    public function permintaan_reject()
    {        
        $o_id = $this->input->post('order_id');
        $data['reject_list'] = $this->inputor_model->getdatareject($o_id);
        $data['provider_list'] = $this->inputor_model->getdataprovider();
        $data['provinsi_list'] = $this->inputor_model->getdataprovinsi();
        $data['jenis_list'] = $this->inputor_model->getdatajenis();
        $data['upserv_list'] = $this->inputor_model->getrejectid();
        $data['ket_reject'] = $this->inputor_model->getketreject($o_id);
        $data['perusahaan_list'] = $this->inputor_model->getcompid($o_id);
        $data['lokasiid'] = $this->inputor_model->getlokasiid($o_id); 
        $this->load->view('inputor/permintaan_reject',$data);
    }

    function menu_list_permintaan_br()
    {        
        $data['list_permintaan'] = $this->inputor_model->getdatapermintaanbr();
        $this->load->view('inputor/menu_list_permintaan_br', $data);
    }

    function menu_list_permintaan()
    {           
        $data['list_permintaan'] = $this->inputor_model->getdatapermintaan();
        $this->load->view('inputor/menu_list_permintaan', $data);
    }

     function menu_list_permintaan_rl()
    {        
        $data['list_permintaan'] = $this->inputor_model->getdatapermintaan();
        $this->load->view('inputor/menu_list_permintaan_rl', $data);
    }

    function menu_list_permintaan_dm()
    {        
        $data['list_permintaan'] = $this->inputor_model->getdatapermintaan();
        $this->load->view('inputor/menu_list_permintaan_dm', $data);
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
        $value = stripcslashes($this->input->post('pTableData',TRUE));
        $value2 = stripcslashes($this->input->post('pTableData2',TRUE));
        $value = json_decode($value,TRUE);
        $value2 = json_decode($value2,TRUE);

        $lokasi = $value[0]['Lokasi'];
        $countlokasi = $this->inputor_model->getcountlokasi($lokasi);
        if($countlokasi == 0)
        {
            //------------------------------------------------------------------//
            $proses = $value[0]['Proses'];

            //------------------------------------------------------------------//

            //------------------------------------------------------------------//
            $tahap = $value[0]['Tahap'];
            $user = $value[0]['User'];
            $keterangan = $value[0]['Keterangan'];

            //-------------------------------------------------------------------//

            $jenis = $value[0]['Jenis'];
            $perusahaan = $value[0]['Perusahaan'];
            $alamat = $value[0]['Alamat'];
            $region = $value[0]['Region'];
            $provider = $value[0]['Provider'];
            $provinsi = $value[0]['Provinsi'];
            $layanan = $value[0]['Layanan'];
            $paket = $value[0]['Paket'];
            $bw = $value[0]['Bw'];
            $router = $value[0]['Router'];
            $latitude = $value[0]['Latitude'];
            $longitude = $value[0]['Longitude'];

            //setting parent table
 
            $provider_id = $this->inputor_model->getproviderid($provider);
            $provid = $this->inputor_model->getprovinsiid($provinsi);
            $jenid = $this->inputor_model->getjenid($jenis);
            $regid = $this->inputor_model->getregid($region,$perusahaan);

            $cekpackid = array ('p_service_id' => $layanan ,
                        'package' => $paket);

            $packid = $this->inputor_model->getpackid($cekpackid);

            //setting child table level 2
            $in_site = array ('provinsi_id' => $provid,
                            'p_site_type_id' => $jenid,
                            'p_region_id' => $regid,
                            'site_name' => $lokasi ,
                            'latitude' => $latitude ,
                            'longitude' => $longitude ,
                            'address' => $alamat);

            $this->inputor_model->inputlvl2($in_site);
            $siteid = $this->inputor_model->getsiteid($lokasi);
            

            //-----------------------------------------------------------------//
            $in_proses = array ('p_order_type_id' => $proses);
            $serv_type_id = $this->inputor_model->inputproses($in_proses);

            $in_tahap = array ('p_process_id' => $tahap ,
                    't_detail_network_order_id' => $serv_type_id,
                    'keterangan' => $keterangan,
                    'closed_by' => $user);

            $this->inputor_model->inputtahap($in_tahap);
            $in_unrec = array ('p_process_id' => $tahap ,
                    't_detail_network_order_id' => $serv_type_id ,
                    't_nw_site_id' => $siteid);
            $this->inputor_model->inputunrec($in_unrec);
            //-----------------------------------------------------------------//

            //-----------------------------------------------------------------//
            $get_next = array ('p_process_id' => $tahap ,
                        'p_order_type_id' => $proses);
            $getnext = $this->inputor_model->getnext($tahap, $proses, $get_next);

            $in_next = array ('p_process_id' => $getnext ,
                't_detail_network_order_id' => $serv_type_id);
            $this->inputor_model->nexttahap($in_next);

            $up_unrec = array ('p_process_id' => $getnext);
            $this->inputor_model->updateunrec($up_unrec, $serv_type_id);
            //------------------------------------------------------------------//

            //setting child table level 3
            $in_order = array ('t_nw_site_id' => $siteid,
                            't_detail_network_order_id' => $serv_type_id ,
                            'provider_id' => $provider_id ,
                            'bw' => $bw);

            $orderid =$this->inputor_model->getorderid($in_order);
            
            //setting child table final
            $in_serv = array ('t_network_order_id' => $orderid ,
                            'p_nw_service_id' => $packid ,
                            'jumlah' => 1);

            $in_router = array ('t_network_order_id' => $orderid ,
                            'p_nw_service_id' => $router ,
                            'jumlah' => 1);

            $this->inputor_model->inputfinal($in_serv, $in_router);
            for($i=1;$i<count($value2);$i++)
            {
                $pic= $value2[$i]['PIC'];
                $phone1 = $value2[$i]['Phone1'];
                $phone2 = $value2[$i]['Phone2'];
                $in_pic = array ('pic_name' => $pic ,
                            'phone' => $phone1 ,
                            'phone2' => $phone2);
                $this->inputor_model->inputparent($in_pic);
                $picid = $this->inputor_model->getpicid($pic);

                $in_pic_site = array ('t_nw_site_id' => $siteid,
                            't_pic_id' => $picid);

                $this->inputor_model->inputpic($in_pic_site);
            }

            for($i=1;$i<count($value);$i++)
            {
                $modul_id = $this->inputor_model->getidmod($value[$i]['Modul']);
                $jumlahmodul = $value[$i]['Jumlah'];

                $in_modul = array ('t_network_order_id' => $orderid ,
                                'p_nw_service_id' => $modul_id ,
                                'jumlah' => $jumlahmodul);

                $this->inputor_model->inputmodul($in_modul);       
            }
            redirect('inputor','refresh');
        }

        else if ($countlokasi !==0)
        {
            echo "<script>
            alert('Lokasi telah dibuat sebelumnya');
            </script>";
            redirect ('inputor/form_permintaan','refresh');
        }
    
    }

    public function form_reject()
    {        
        $lokasi = $this->input->post('site_id');
        $provider = $this->input->post('provider');
        $provider_id = $this->inputor_model->getproviderid($provider);

        //t_detail_network_order_id------------------------------------------//
        $serv_type_id = $this->inputor_model->getdetailid($lokasi);
        $this->inputor_model->updateproses($serv_type_id, $provider_id);

        //update t_process--------------------------------------------------//
        $tahap = $this->input->post('tahap');
        $user = $this->input->post('user');
        $keterangan = $this->input->post('keterangan');
        $in_tahap = array ('keterangan' => $keterangan,
                'closed_by' => $user);
        $this->inputor_model->updatetahap($in_tahap, $serv_type_id, $tahap);

        //parsing data------------------------------------------------------//
        $jenis = ($value[$i]['Jenis']);
        $perusahaan = $_POST['perusahaan'];
        $alamat = $this->input->post('alamat');
        $region = $this->input->post('region');
        $provinsi = $this->input->post('prov');
        $pic = $this->input->post('pic');
        $layanan = $_POST['up_layanan'];
        $paket = $this->input->post('update_paket');
        $bw = $this->input->post('bw');
        $router = $this->input->post('router');
        $modul = $this->input->post('modul');

        $latitude = $this->input->post('latitude');
        $longitude = $this->input->post('longitude');

        //drop earlier pic--------------------------------------------------//
        $this->inputor_model->droppic($lokasi);

        //setting parent table----------------------------------------------//
        $in_pic = array ('pic_name' => $pic);

        $this->inputor_model->inputparent($in_pic);

 
        $provid = $this->inputor_model->getprovinsiid($provinsi);
        $picid = $this->inputor_model->getpicid($pic);
        $jenid = $this->inputor_model->getjenid($jenis);
        $regid = $this->inputor_model->getregid($region,$perusahaan);

        $cekpackid = array ('p_service_id' => $layanan ,
                    'package' => $paket);

        $packid = $this->inputor_model->getpackid($cekpackid);

        //setting child table level 2--------------------------------------//
        $in_site = array ('provinsi_id' => $provid,
                        'p_site_type_id' => $jenid,
                        'p_region_id' => $regid,
                        'latitude' => $latitude ,
                        'longitude' => $longitude ,
                        'address' => $alamat);

        $this->inputor_model->updatelvl2($in_site, $lokasi);


        //get next step-----------------------------------------------------//
        $proses = $this->inputor_model->getprosesid($serv_type_id);
        $get_next = array ('p_process_id' => $tahap ,
                    'p_order_type_id' => $proses);
        $getnext = $this->inputor_model->getnext($tahap, $proses, $get_next);

        $in_next = array ('p_process_id' => $getnext ,
            't_detail_network_order_id' => $serv_type_id);
        $this->inputor_model->nexttahap($in_next);

        $up_unrec = array ('p_process_id' => $getnext);
        $this->inputor_model->updateunrec($up_unrec, $serv_type_id);


        //setting child table level 3----------------------------------------//
        $in_order = array ('t_nw_site_id' => $lokasi,
                        'bw' => $bw);

        $this->inputor_model->updateorder($in_order, $serv_type_id);
        $orderid= $this->inputor_model->getorderidrej($serv_type_id);
        
        //setting child table final------------------------------------------//
        $in_pic_site = array ('t_nw_site_id' => $lokasi,
                        't_pic_id' => $picid);

        $in_serv = array ('t_network_order_id' => $orderid ,
                        'p_nw_service_id' => $packid ,
                        'jumlah' => 1);

        $in_router = array ('t_network_order_id' => $orderid ,
                        'p_nw_service_id' => $router ,
                        'jumlah' => 1);
        $this->inputor_model->droppic($lokasi);
        $this->inputor_model->refreshservice($orderid);
        $this->inputor_model->inputfinal($in_serv, $in_pic_site, $in_router);


        if($modul)
        { 
            $in_modul = array ('t_network_order_id' => $orderid ,
                    'p_nw_service_id' => $modul ,
                    'jumlah' => 1);

            $this->inputor_model->inputmodul($in_modul);
        } 
        echo "<script type='text/javascript'>alert('Data berhasil di submit')</script>";
        redirect('inputor','refresh');
    }  

    public function form_update()
    {
        //------------------------------------------------------------------//
        $proses = $this->input->post('proses');
        $in_proses = array ('p_order_type_id' => $proses);
        $serv_type_id = $this->inputor_model->inputproses($in_proses);
        //------------------------------------------------------------------//

        //------------------------------------------------------------------//
        $tahap = $this->input->post('tahap');

        $user = $this->input->post('user');
        $keterangan = $this->input->post('keterangan');
        $in_tahap = array ('p_process_id' => $tahap ,
                't_detail_network_order_id' => $serv_type_id,
                'keterangan' => $keterangan,
                'closed_by' => $user);
        $this->inputor_model->inputtahap($in_tahap);
        //----------------------------------------------------------------//

        $site_id = $this->input->post('site_id');
        $serv_up = $_POST['up_layanan'];
        $pack_up = $this->input->post('update_paket');
        $bw_up = $this->input->post('update_bw');
        $provider = $this->input->post('provider');
        //-----------------------------------------------------------------//
        $in_unrec = array ('p_process_id' => $tahap ,
                't_detail_network_order_id' => $serv_type_id ,
                't_nw_site_id' => $site_id);
        $this->inputor_model->inputunrec($in_unrec);

        $get_next = array ('p_process_id' => $tahap ,
                    'p_order_type_id' => $proses);
        $getnext = $this->inputor_model->getnext($tahap, $proses, $get_next);

        $in_next = array ('p_process_id' => $getnext ,
            't_detail_network_order_id' => $serv_type_id);
        $this->inputor_model->nexttahap($in_next);

        $up_unrec = array ('p_process_id' => $getnext);
        $this->inputor_model->updateunrec($up_unrec, $serv_type_id);
        //------------------------------------------------------------------//

        $cekpackid = array ('p_service_id' => $serv_up ,
                    'package' => $pack_up);

        $packid = $this->inputor_model->getpackid($cekpackid);

        $getnworderid = array ('t_nw_site_id' => $site_id ,
                    't_detail_network_order_id' => $serv_type_id ,
                    'provider' => $provider ,
                     'bw' => $bw_up);

        $order_up_id = $this->inputor_model->getorderupid($getnworderid);

        $update = array ('p_nw_service_id' => $packid ,
                't_network_order_id' => $order_up_id);

        $this->inputor_model->updatefinal($update);

        echo "<script type='text/javascript'>alert('Data berhasil di submit')</script>";
        redirect ('inputor','refresh');
    }

   function form_dismantle()
   {
        $site_id = $this->input->post('site_id');
        $layanan = $this->input->post('layanan');
        $paket = $this->input->post('paket');

        $id_layanan = $this->inputor_model->getidlayanan($layanan);
        //------------------------------------------------------------------//
        $proses = $this->input->post('proses');

        $in_proses = array ('p_order_type_id' => $proses);
        $serv_type_id = $this->inputor_model->inputproses($in_proses);
        //------------------------------------------------------------------//

        //------------------------------------------------------------------//
        $tahap = $this->input->post('tahap');

        $user = $this->input->post('user');
        $keterangan = $this->input->post('keterangan');
        $in_tahap = array ('p_process_id' => $tahap ,
                't_detail_network_order_id' => $serv_type_id,
                'keterangan' => $keterangan,
                'closed_by' => $user);
        $this->inputor_model->inputtahap($in_tahap);

        $in_unrec = array ('p_process_id' => $tahap ,
                't_detail_network_order_id' => $serv_type_id ,
                't_nw_site_id' => $site_id);
        $this->inputor_model->inputunrec($in_unrec);

        $get_next = array ('p_process_id' => $tahap ,
                    'p_order_type_id' => $proses);
        $getnext = $this->inputor_model->getnext($tahap, $proses, $get_next);

        $in_next = array ('p_process_id' => $getnext ,
            't_detail_network_order_id' => $serv_type_id);
        $this->inputor_model->nexttahap($in_next);

        $up_unrec = array ('p_process_id' => $getnext);
        $this->inputor_model->updateunrec($up_unrec, $serv_type_id);
        //------------------------------------------------------------------//

        $getnworderid = array ('t_nw_site_id' => $site_id ,
                    't_detail_network_order_id' => $serv_type_id);

        $cekpackid = array ('p_service_id' => $id_layanan ,
                    'package' => $paket);

        $packid = $this->inputor_model->getpackid($cekpackid);

        $order_up_id = $this->inputor_model->getorderupid($getnworderid);

        $update = array ('p_nw_service_id' => $packid ,
                't_network_order_id' => $order_up_id);

        $this->inputor_model->updatefinal($update);

        echo "<script type='text/javascript'>alert('Data berhasil di submit')</script>";
        redirect('inputor','refresh');
    }

    function form_relokasi()
    {
        $lokasi = $this->input->post('lokasi');
        //------------------------------------------------------------------//
        $proses = $this->input->post('proses');
        $in_proses = array ('p_order_type_id' => $proses);
        $serv_type_id = $this->inputor_model->inputproses($in_proses);
        //------------------------------------------------------------------//

        //------------------------------------------------------------------//
        $tahap = $this->input->post('tahap');
        $user = $this->input->post('user');
        $keterangan = $this->input->post('keterangan');


        $in_tahap = array ('p_process_id' => $tahap ,
                't_detail_network_order_id' => $serv_type_id,
                'keterangan' => $keterangan,
                'closed_by' => $user);
        $this->inputor_model->inputtahap($in_tahap);

        //-------------------------------------------------------------------//

        $jenis = $this->input->post('jenis');
        $perusahaan = $_POST['perusahaan'];
        $alamat = $this->input->post('alamat');
        $region = $this->input->post('region');
        $provider = $this->input->post('provider');
        $provinsi = $this->input->post('prov');
        $pic = $this->input->post('pic');
        $layanan = $this->input->post('layanan');
        $paket = $this->input->post('paket');
        $bw = $this->input->post('bw');
        $router = $this->input->post('router');
        $modul = $this->input->post('modul');
        $latitude = $this->input->post('latitude');
        $longitude = $this->input->post('longitude');
        $nojar = $this->input->post('nojar');

        //setting parent table
        $in_pic = array ('pic_name' => $pic);
        $this->inputor_model->inputparent($in_pic);

        $id_layanan = $this->inputor_model->getidlayanan($layanan);
        $provider_id = $this->inputor_model->getproviderid($provider);
        $provid = $this->inputor_model->getprovinsiid($provinsi);
        $picid = $this->inputor_model->getpicid($pic);
        $jenid = $this->inputor_model->getjenid($jenis);
        $regid = $this->inputor_model->getregid($region,$perusahaan);

        $cekpackid = array ('p_service_id' => $id_layanan ,
                    'package' => $paket);

        $packid = $this->inputor_model->getpackid($cekpackid);

        //setting child table level 2
        $in_site = array ('provinsi_id' => $provid,
                        'p_site_type_id' => $jenid,
                        'p_region_id' => $regid,
                        'site_name' => $lokasi ,
                        'latitude' => $latitude ,
                        'longitude' => $longitude ,
                        'address' => $alamat);

        $this->inputor_model->inputlvl2($in_site);
        $siteid = $this->inputor_model->getsiteid($lokasi);

        //-----------------------------------------------------------------//
        $in_unrec = array ('p_process_id' => $tahap ,
                't_detail_network_order_id' => $serv_type_id ,
                't_nw_site_id' => $siteid);
        $this->inputor_model->inputunrec($in_unrec);
        //-----------------------------------------------------------------//

        //-----------------------------------------------------------------//
        $get_next = array ('p_process_id' => $tahap ,
                    'p_order_type_id' => $proses);
        $getnext = $this->inputor_model->getnext($tahap, $proses, $get_next);

        $in_next = array ('p_process_id' => $getnext ,
            't_detail_network_order_id' => $serv_type_id);
        $this->inputor_model->nexttahap($in_next);

        $up_unrec = array ('p_process_id' => $getnext);
        $this->inputor_model->updateunrec($up_unrec, $serv_type_id);
        //------------------------------------------------------------------//

        //setting child table level 3
        $in_order = array ('t_nw_site_id' => $siteid,
                        't_detail_network_order_id' => $serv_type_id ,
                        'provider_id' => $provider_id ,
                        'no_jar' => $nojar ,
                        'bw' => $bw);

        $orderid =$this->inputor_model->getorderid($in_order);
        
        //setting child table final
        $in_pic_site = array ('t_nw_site_id' => $siteid,
                     't_pic_id' => $picid);

        $in_serv = array ('t_network_order_id' => $orderid ,
                        'p_nw_service_id' => $packid ,
                        'jumlah' => 1);

        $in_router = array ('t_network_order_id' => $orderid ,
                        'p_nw_service_id' => $router ,
                        'jumlah' => 1);

        $this->inputor_model->inputfinal($in_serv, $in_router);
        $this->inputor_model->inputpic($in_pic_site);

        
        redirect('inputor','refresh');
        
    }  

    public function ac_pic()
    {
        $id = $this->input->post('id',TRUE);
        $rows = $this->inputor_model->get_pic($id);
        $json_array = array();
        foreach ($rows as $row)
            $json_array[]=$row->pic_name;
        echo json_encode($json_array);
    }
    
    public function get_phone()
    {
        $id = $this->input->post('id',TRUE);
        $getphone = $this->inputor_model->get_phone($id);
        foreach ($getphone as $row) {
            $phone = array(
                'phone' => $row->phone, 
                'phone2' => $row->phone2,
            );

        }

        echo json_encode($phone);
    }
}