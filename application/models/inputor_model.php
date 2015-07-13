<?php

class Inputor_model extends CI_Model 
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function getdatajenis()
	{
		$query = $this->db->get('p_site_type');
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

	function getorderid($bw)
	{
		$this->db->where('bw', $bw);
		$query = $this->db->get("t_network_order"); 
		return $query->row()->t_network_order_id;
	}

	function getpackid($paket, $servid)
	{
		$this->db->where('package', $paket);
		$query = $this->db->get("p_nw_service"); 
		return $query->row()->p_nw_service_id;
	}

	function getsiteid($lokasi)
	{
		$this->db->where('site_name', $lokasi);
		$query = $this->db->get("t_nw_site"); 
		return $query->row()->t_nw_site_id;
	}

	function getserviceid($layanan)
	{
		$this->db->where('service_name', $layanan);
		$query = $this->db->get("p_service"); 
		return $query->row()->p_service_id;	
	}

	function inputfinal($in_serv, $in_pic_site)
	{
		$this->db->insert('t_nw_service',$in_serv);
		$this->db->insert('t_nw_site_pic',$in_pic_site);
	}

	function inputparent($in_prov,$in_pic)
	{
		$this->db->insert('provinsi',$in_prov);
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

	public function getcompid()  
   	{  
      $this->db->select('company_id,company_name');  
      $this->db->from('company');  
      $query = $this->db->get();  
      foreach($query->result_array() as $row)
      {  
         $data[$row['company_id']]=$row['company_name'];  
      }   
      return $data;  
   	} 

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
      $this->db->select('p_service_id,service_name');  
      $this->db->from('p_service');  
      $query = $this->db->get();  
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

  	function getdatapermintaan()
	{
		$this->db->select('t_nw_site.site_name');
		$this->db->select('t_network_order.bw');
		$this->db->select('p_site_type.type_name');
		$this->db->select('p_service.service_name');
		$this->db->select('p_nw_service.package');
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

  	public function getdataupdate($o_id)
  	{
  		$this->db->select('t_nw_site.site_name');
		$this->db->select('p_site_type.type_name');
		$this->db->select('company.company_name');
		$this->db->select('t_nw_site.address');
		$this->db->select('p_region.region_name');
		$this->db->select('provinsi.provinsi_name');
		$this->db->select('t_pic.pic_name');
		$this->db->where('t_nw_site.site_name',$o_id);
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

  	public function getsiteupid ($site_up)
  	{
  		$this->db->where('site_name', $site_up);
		$query = $this->db->get("t_nw_site"); 
		return $query->row()->t_nw_site_id;
  	}

  	public function getorderupid ($site_up_id,$bw_up)
  	{
  		$this->db->where('bw',$bw_up);
		$query = $this->db->get("t_network_order"); 
		return $query->row()->t_nw_site_id;
  	}

  	public function getservupid ($pack_up)
  	{
  		$this->db->where('package',$pack_up);
		$query = $this->db->get("p_nw_service"); 
		return $query->row()->p_nw_service_id;
  	}


  	public function updatefinal ($serv_up_id,$order_up_id)
  	{
  		$this->db->set('p_nw_service_id',$serv_up_id);
  		$this->db->where('t_network_order_id',$order_up_id);
  	}

}
