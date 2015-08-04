<?php

class Inputor_model extends CI_Model 
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	//inisiasi-----------------------------------------------//
	function getdatajenis()
	{
		$query = $this->db->get('p_site_type');
		return $query->result();
	}


	function getdataprovider()
	{
		$query = $this->db->get('provider');
		return $query->result();
	}

	function getdataprovinsi()
	{
		$query = $this->db->get('provinsi');
		return $query->result();
	}

	//cascading dropdown----------------------------------------//
	public function getcompid()  
   	{  
      $this->db->select('company_id,company_name');  
      $this->db->from('company');  
      $query = $this->db->get();
      $data[''] = '(Pilih Perusahaan)';  
      foreach($query->result_array() as $row)
      {  
         $data[$row['company_id']]=$row['company_name'];  
      }   
      return $data;  
   	}

   	/*public function getcompidrej($o_id)
   	{
   		$this->db->where('t_nw_site.site_name', $o_id);
   		$this->db->where('t_nw_site.p_region_id = p_region.p_region_id');
   		$this->db->where('p_region.company_id = company.company_id');
	    $this->db->select('company.company_id,company.company_name');    
	    $query = $this->db->get('t_nw_site, p_region, company');
	    return $query->row()->company_name;
   	} 

   	public function getcompanyrej($company)  
   	{
      $this->db->select('company_id,company_name');  
      $this->db->from('company');  
      $query = $this->db->get();
      $data[''] = $company ;
      $data[''] .
      foreach($query->result_array() as $row)
      {  
         $data[$row['company_id']]=$row['company_name'];  
  	  }   
      return $data;  
   	}*/ 

   	public function getregionfromcomp($company_id=string)  
   	{ 
   	  $this->db->select('region_name'); 
      $this->db->from('p_region');  
      $this->db->where('company_id',$company_id);  
      $query = $this->db->get();  
      return $query->result();  
  	 }  

  	 public function getservid()  
   	{  
      $this->db->select('p_service.p_service_id,p_service.service_name');  
      $this->db->where('p_service.p_service_id = p_nw_service.p_service_id');
      $this->db->where('p_nw_service.p_nw_service_id >= "1"');
      $this->db->where('p_nw_service.p_nw_service_id <= "13"');  
      $this->db->from('p_service,p_nw_service');
      $query = $this->db->get();  
      $data[''] = '(Pilih Layanan)';  
      foreach($query->result_array() as $row)
      {  
         $data[$row['p_service_id']]=$row['service_name'];  
      }   
      return $data;  
   	} 

   	public function getpaketfromlayanan($p_service_id=string)  
   	{ 
   	  $this->db->select('package'); 
      $this->db->from('p_nw_service');  
      $this->db->where('p_service_id',$p_service_id);  
      $query = $this->db->get();  
      return $query->result();  
  	}
	//-------------------------------------------------------------//

  	//insert-------------------------------------------------------//
	function getlokasiid($o_id)
	{
		$this->db->distinct();
		$this->db->where('site_name', $o_id);
		$query = $this->db->get('t_nw_site');
		return $query->result();
	}

	function insertservalue($in_proses)
	{
		$this->db->insert('t_detail_network_order',$in_proses);
	}

	function getdetailorderid ($in_proses)
	{
		$this->db->where($in_proses);
		$query = $this->db->get("t_detail_network_order"); 
		return $query->row()->t_detail_network_order_id;
	}

	function getdataproses()
	{
		$query = $this->db->get('t_detail_network_order');
		return $query->result();
	}


	function getdatalokasi()
	{
		$query = $this->db->get('t_nw_site');
		return $query->result();
	}

	function getprovinsiid($provinsi)
	{
		$this->db->where('provinsi_name', $provinsi);
		$query = $this->db->get("provinsi"); 
		return $query->row()->provinsi_id;
	
	}

	function getperusahaanid($perusahaan)
	{
		$this->db->where('company_name', $perusahaan);
		$query = $this->db->get("company"); 
		return $query->row()->company_id;
	
	}

    public function get_pic($pic)
    {
        $this->db->select('pic_name');
        $this->db->like('pic_name', $pic);
           $query = $this->db->get('t_pic');
        return $query->result();
    }

	function getpicid($pic)
	{
		$this->db->where('pic_name', $pic);
		$query = $this->db->get("t_pic"); 
		return $query->row()->t_pic_id;
	}

	function getjenid($jenis)
	{
		$this->db->where('type_name', $jenis);
		$query = $this->db->get("p_site_type"); 
		return $query->row()->p_site_type_id;
	}

	function getregid($region)
	{
		$this->db->where('region_name', $region);
		$query = $this->db->get("p_region"); 
		return $query->row()->p_region_id;
	}

	function getorderid($getnworderid)
	{
		$this->db->insert('t_network_order',$getnworderid);
		$id = $this->db->insert_id();
		$this->db->where('t_network_order_id',$id);
		$query = $this->db->get("t_network_order");
		return $query->row()->t_network_order_id;
	}

	function getpackid($cekpackid)
	{
		$this->db->where($cekpackid);
		$query = $this->db->get("p_nw_service"); 
		return $query->row()->p_nw_service_id;
	}

	function getsiteid($lokasi)
	{
		$this->db->where('site_name', $lokasi);
		$query = $this->db->get("t_nw_site"); 
		return $query->row()->t_nw_site_id;
	}

	function getproviderid($provider)
	{
		$this->db->where('provider_name', $provider);
		$query = $this->db->get("provider"); 
		return $query->row()->provider_id;
	}


	function getserviceid($layanan)
	{
		$this->db->where('service_name', $layanan);
		$query = $this->db->get("p_service"); 
		return $query->row()->p_service_id;	
	}

	function inputproses($in_proses)
	{
		$this->db->insert('t_detail_network_order',$in_proses);
		$id = $this->db->insert_id();
		$this->db->where('t_detail_network_order_id',$id);
		$query = $this->db->get("t_detail_network_order");
		return $query->row()->t_detail_network_order_id;
	}

	//input-----------------------------------------------------------------//
	function inputtahap($in_tahap)
	{
		$this->db->set('valid_fr','NOW()',FALSE);
		$this->db->set('valid_to','NOW()',FALSE);
		$this->db->insert('t_process',$in_tahap);	
	}

	function inputunrec($in_unrec)
	{
		$this->db->insert('t_unrec_process',$in_unrec);			
	}

	function getnext ($tahap, $proses, $get_next)
	{
		$this->db->select ('workflow.next_process_id');
		$this->db->where ('t_unrec_process.p_process_id',$tahap);
		$this->db->where('t_unrec_process.p_process_id = p_process.p_process_id');
		$this->db->where('p_process.p_process_id = workflow.p_process_id');
		$this->db->where('t_detail_network_order.p_order_type_id',$proses);
		$this->db->where('t_detail_network_order.p_order_type_id = p_order_type.p_order_type_id');
		$this->db->where('p_order_type.p_order_type_id = workflow.p_order_type_id');
		$query = $this->db->get ('workflow, t_unrec_process, p_process, t_detail_network_order, p_order_type');
		return $query->row()->next_process_id;
	}

	function nexttahap($in_next)
	{
		$this->db->set('valid_fr','NOW()',FALSE);
		$this->db->insert('t_process',$in_next);
	
	}

	function updateunrec($up_unrec, $serv_type_id)
	{
		$this->db->where('t_unrec_process.t_detail_network_order_id',$serv_type_id);	
		$this->db->update('t_unrec_process',$up_unrec);
	}

	function inputfinal($in_serv, $in_pic_site, $in_router, $in_price)
	{
		$this->db->insert('t_nw_service',$in_serv);
		$this->db->insert('t_nw_site_pic',$in_pic_site);
		$this->db->insert('t_nw_service',$in_router);
		$this->db->insert('t_price_nw_serv_provider', $in_price);
	}

	function inputmodul($in_modul)
	{
		$this->db->insert('t_nw_service',$in_modul);
	}

	function inputparent($in_pic)
	{
		$this->db->insert('t_pic',$in_pic);
	}

	function inputlvl2($in_site)
	{
		$this->db->insert('t_nw_site',$in_site);		
	}

	function inputlvl3($in_order)
	{
		$this->db->insert('t_network_order',$in_order);		
	}
	//------------------------------------------------------------------------//

	//update------------------------------------------------------------------//
  	public function getupdateid()  
   	{  
      $this->db->select('p_service.p_service_id,p_service.service_name');  
      $this->db->where('p_service.p_service_id = p_nw_service.p_service_id');
      $this->db->where('p_nw_service.p_nw_service_id >= "1"');
      $this->db->where('p_nw_service.p_nw_service_id <= "13"');  
      $this->db->from('p_service,p_nw_service');
      $query = $this->db->get();  
      $data[''] = '(Pilih Layanan)';  
      foreach($query->result_array() as $row)
      {  
         $data[$row['p_service_id']]=$row['service_name'];  
      }   
      return $data;  
   	}



   	public function getpaketfromlayanan_up($p_service_id_up=string)  
   	{ 
   	  $this->db->select('package'); 
      $this->db->from('p_nw_service');  
      $this->db->where('p_service_id',$p_service_id_up);
      $query = $this->db->get();  
      return $query->result();  
  	}

	function getdatapermintaan()
	{
		//$this->db->select('t_nw_site.site_name');
		//$this->db->select('p_site_type.type_name');
		//$this->db->select('p_service.service_name');
		//$this->db->select('p_nw_service.package');
		//$this->db->select('t_network_order.bw');
		$this->db->where('t_nw_service_fix.p_nw_service_id >= "1"');
		$this->db->where('t_nw_service_fix.p_nw_service_id <= "13"');
		$this->db->where('p_site_type.p_site_type_id = t_nw_site.p_site_type_id');
		$this->db->where('t_network.t_network_id = t_nw_service_fix.t_network_id');
		$this->db->where('p_nw_service.p_nw_service_id = t_nw_service_fix.p_nw_service_id');
		$this->db->where('t_network.t_nw_site_id = t_nw_site.t_nw_site_id');
		$this->db->where('p_service.p_service_id = p_nw_service.p_service_id');
		$this->db->where('company.company_id = p_region.company_id');
		$this->db->where('t_nw_site.p_region_id = p_region.p_region_id');
		$query = $this->db->get('t_nw_site,t_network,p_site_type,p_nw_service,p_service,t_nw_service_fix,company, p_region');
    	return $query->result();
	}

	function getdatapermintaanbr()
	{
		$this->db->distinct();
		//$this->db->select('t_nw_site.site_name');
		//$this->db->select('p_site_type.type_name');
		//$this->db->select('p_service.service_name');
		//$this->db->select('p_nw_service.package');
		//$this->db->select('t_network_order.bw');
		$this->db->where('t_nw_service.p_nw_service_id >= "1"');
		$this->db->where('t_nw_service.p_nw_service_id <= "13"');
		$this->db->where('t_unrec_process.t_detail_network_order_id = t_detail_network_order.t_detail_network_order_id');
		$this->db->where('t_network_order.t_detail_network_order_id = t_detail_network_order.t_detail_network_order_id');
		$this->db->where('t_nw_site.p_region_id = p_region.p_region_id');
		$this->db->where('p_region.company_id = company.company_id');
		$this->db->where('t_nw_site.t_nw_site_id = t_network_order.t_nw_site_id');
		$this->db->where('p_site_type.p_site_type_id = t_nw_site.p_site_type_id');
		$this->db->where('t_network_order.t_network_order_id = t_nw_service.t_network_order_id');
		$this->db->where('p_nw_service.p_nw_service_id = t_nw_service.p_nw_service_id');
		$this->db->where('t_network_order.t_nw_site_id = t_nw_site.t_nw_site_id');
		$this->db->where('p_service.p_service_id = p_nw_service.p_service_id');
		$this->db->where('t_detail_network_order.p_order_type_id = p_order_type.p_order_type_id');
		$this->db->where('t_unrec_process.p_process_id = p_process.p_process_id');
		$query = $this->db->get('p_process, p_region, company, t_nw_site,t_network_order,p_site_type,p_nw_service,p_service,t_nw_service,t_unrec_process,t_detail_network_order,p_order_type');
    	return $query->result();
	}

  	public function getdataupdate($o_id)
  	{
    	//$this->db->select('t_nw_site.t_nw_site_id');
  		//$this->db->select('t_nw_site.site_name');
		//$this->db->select('p_site_type.type_name');
		//$this->db->select('company.company_name');
		//$this->db->select('t_nw_site.address');
		//$this->db->select('p_region.region_name');
		//$this->db->select('provinsi.provinsi_name');
		//$this->db->select('t_pic.pic_name');
		$this->db->where('t_nw_site.site_name',$o_id);
		$this->db->where('t_nw_service_fix.p_nw_service_id >= "1"');
		$this->db->where('t_nw_service_fix.p_nw_service_id <= "13"');
		$this->db->where('t_nw_site.t_nw_site_id = t_network.t_nw_site_id');
		$this->db->where('p_site_type.p_site_type_id = t_nw_site.p_site_type_id');
		$this->db->where('p_nw_service.p_nw_service_id = t_nw_service_fix.p_nw_service_id');
		$this->db->where('t_nw_service_fix.t_network_id = t_network.t_network_id');
		$this->db->where('t_network.t_nw_site_id = t_nw_site.t_nw_site_id');
		$this->db->where('p_service.p_service_id = p_nw_service.p_service_id');
		$this->db->where('t_pic.t_pic_id = t_nw_site_pic.t_pic_id');
		$this->db->where('t_nw_site_pic.t_nw_site_id = t_nw_site.t_nw_site_id');
		$this->db->where('company.company_id = p_region.company_id');
		$this->db->where('t_nw_site.p_region_id = p_region.p_region_id');
		$this->db->where('provinsi.provinsi_id = t_nw_site.provinsi_id');
		$query = $this->db->get('t_nw_service_fix,t_nw_site,t_network,p_site_type,p_nw_service,p_service,company,p_region,t_pic,provinsi,t_nw_site_pic');
    	return $query->result();
  	}

  	public function getsiteupid ($site_up)
  	{
  		$this->db->where('site_name', $site_up);
		$query = $this->db->get("t_nw_site"); 
		return $query->row()->t_nw_site_id;
  	}


  	public function getorderupid ($getnworderid)
  	{
		$this->db->insert('t_network_order',$getnworderid);
		$id = $this->db->insert_id();
		$this->db->where('t_network_order_id',$id);
		$query = $this->db->get("t_network_order");
		return $query->row()->t_network_order_id;
  	}

 	public function setbw ($updateorder,$bw_up)
  	{
  		$this->db->insert('t_network_order',$bw_up);
  		$this->db->where($updateorder);
  	}

  	public function getservupid ($pack_up)
  	{
  		$this->db->where('package',$pack_up);
		$query = $this->db->get("p_nw_service"); 
		return $query->row()->p_nw_service_id;
  	}

  	public function updatefinal ($update)
  	{
  		$this->db->insert('t_nw_service',$update);
  	}

  	//rejected------------------------------------------------------
  	public function getrejectid()  
   	{  
      $this->db->select('p_service.p_service_id,p_service.service_name');  
      $this->db->where('p_service.p_service_id = p_nw_service.p_service_id');
      $this->db->where('p_nw_service.p_nw_service_id >= "1"');
      $this->db->where('p_nw_service.p_nw_service_id <= "13"');  
      $this->db->from('p_service,p_nw_service');
      $query = $this->db->get();  
      $data[''] = '(Pilih Layanan)';  
      foreach($query->result_array() as $row)
      {  
         $data[$row['p_service_id']]=$row['service_name'];  
      }   
      return $data;  
   	}

  	public function getdatareject($o_id)
  	{
    	//$this->db->select('t_nw_site.t_nw_site_id');
  		//$this->db->select('t_nw_site.site_name');
		//$this->db->select('p_site_type.type_name');
		//$this->db->select('company.company_name');
		//$this->db->select('t_nw_site.address');
		//$this->db->select('p_region.region_name');
		//$this->db->select('provinsi.provinsi_name');
		//$this->db->select('t_pic.pic_name');
		$this->db->where('t_nw_site.site_name',$o_id);
		$this->db->where('t_nw_service.p_nw_service_id >= "1"');
		$this->db->where('t_nw_service.p_nw_service_id <= "13"');
		$this->db->where('t_nw_site.t_nw_site_id = t_network_order.t_nw_site_id');
		$this->db->where('p_site_type.p_site_type_id = t_nw_site.p_site_type_id');
		$this->db->where('p_nw_service.p_nw_service_id = t_nw_service.p_nw_service_id');
		$this->db->where('t_nw_service.t_network_order_id = t_network_order.t_network_order_id');
		$this->db->where('t_network_order.t_nw_site_id = t_nw_site.t_nw_site_id');
		$this->db->where('p_service.p_service_id = p_nw_service.p_service_id');
		$this->db->where('t_pic.t_pic_id = t_nw_site_pic.t_pic_id');
		$this->db->where('t_nw_site_pic.t_nw_site_id = t_nw_site.t_nw_site_id');
		$this->db->where('company.company_id = p_region.company_id');
		$this->db->where('t_nw_site.p_region_id = p_region.p_region_id');
		$this->db->where('provinsi.provinsi_id = t_nw_site.provinsi_id');
		$query = $this->db->get('t_nw_service,t_nw_site,t_network_order,p_site_type,p_nw_service,p_service,company,p_region,t_pic,provinsi,t_nw_site_pic');
    	return $query->result();
  	} 
}
