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

	function getdatapaket($layanan)
	{
		//layanan parsing dari hasil fungsi getDataLayanan
		$this->db->where('name', $layanan);
		$query = $this->db->get('p_nw_service');		
    	return $query->result();
	}

	function inputform($site,$service,$reg,$perusahaan,$prov,$pic,$bandwidth)
	{
		$this->db->insert('t_nw_site',$site);
		$this->db->insert('p_nw_service',$service);
		$this->db->insert('p_region',$reg);
		$this->db->insert('company',$perusahaan);
		$this->db->insert('provinsi',$prov);
		$this->db->insert('t_pic',$pic);
		$this->db->insert('t_network_order',$bandwidth);
	}
}
