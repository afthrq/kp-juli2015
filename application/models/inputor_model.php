<?php

class Inputor_model extends CI_Model 
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function getdataperusahaan()
	{
		$query = $this->db->get('company');
		return $query->result();
	}

	function getdatajenis()
	{
		$query = $this->db->get('p_site_type');
		return $query->result();
	}

	function getdataregion()
	{
		$this->db->distinct();
		$query = $this->db->get('p_region');
		return $query->result();
	}

	function getdatalayanan()
	{
		$this->db->distinct();
		$this->db->select('name');
		$query = $this->db->get('p_nw_service');
		return $query->result();

	}

	function getdatapaket()
	{
		//layanan parsing dari hasil fungsi getDataLayanan
		$this->db->distinct();
		$this->db->select('package');
		$query = $this->db->get('p_nw_service');		
    	return $query->result();
	}

	function getprovinsiid($provinsi)
	{
		$this->db->where('name', $provinsi);
		$query = $this->db->get("provinsi"); 
		return $query->row()->provinsi_id;
	
	}

	function getperusahaanid($perusahaan)
	{
		$this->db->where('name', $perusahaan);
		$query = $this->db->get("company"); 
		return $query->row()->company_id;
	
	}

	function getpicid($pic)
	{
		$this->db->where('name', $pic);
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
		$this->db->where('name', $region);
		$query = $this->db->get("p_region"); 
		return $query->row()->p_region_id;
	
	}

	function getsiteid($lokasi)
	{
		$this->db->where('name', $lokasi);
		$query = $this->db->get("t_nw_site"); 
		return $query->row()->t_nw_site_id;
	
	}

	function getserviceid($layanan,$paket)
	{
		$this->db->where('name', $layanan);
		$this->db->where('package', $paket);
		$query = $this->db->get("p_nw_service"); 
		return $query->row()->p_nw_service_id;	
	}

	function inputfinal($in_order)
	{
		$this->db->insert('t_network_order',$in_order);
	}

	function inputparent($in_prov,$in_pic)
	{
		$this->db->insert('provinsi',$in_prov);
		$this->db->insert('t_pic',$in_pic);
	}

	function inputlvl1($in_reg)
	{
		$this->db->insert('p_region',$in_reg);		
	}

	function inputlvl2($in_site)
	{
		$this->db->insert('t_nw_site',$in_site);		
	}


	public function getcompid()  
   	{  
      $this->db->select('company_id,name');  
      $this->db->from('company');  
      $query = $this->db->get();  
      foreach($query->result_array() as $row){  
         $data[$row['company_id']]=$row['name'];  
      }  
      // the fetching data from database is return  
      return $data;  
   	}  
   //fill your cities dropdown depending on the selected city  
   	public function getregionfromcomp($company_id=string)  
   	{  
      $this->db->from('p_region');  
      $this->db->where('company_id',$company_id);  
      $query = $this->db->get();  
      return $query->result();  
  	 }  
}
