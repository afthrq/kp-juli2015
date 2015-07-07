<?php

class Inputor_model extends CI_Model 
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function getDataPerusahaan()
	{
		$query = $this->db->get('company');
		return $query->result();
	}

	function getDataJenis()
	{
		$query = $this->db->get('p_site_type');
		return $query->result();
	}

	public function getDataRegion()
	{
		$query = $this->db->get('p_region');
		return $query->result();
	}

	function getDataLayanan()
	{
		$this->db->distinct();
		$this->db->select('name');
		$query = $this->db->get('p_nw_service');
		return $query->result();

	}

	function getDataPaket($layanan)
	{
		//layanan parsing dari hasil fungsi getDataLayanan
		$this->db->where('name', $layanan);
		$query = $this->db->get('p_nw_service');		
    	return $query->result();
	}

	function inputLokasi($lokasi,$alamat)
	{
		$this->db->set('name',$lokasi);
		$this->db->set('address',$alamat);
		$this->db->insert('t_nw_site');
	}

	function inputAlamat($provinsi)
	{
		$this->db->set('name',$provinsi);
		$this->db->insert('provinsi');
	}

	function inputPic($pic)
	{
		$this->db->set('name',$pic);
		$this->db->insert('t_pic');
	}

	function inputBw($bw)
	{
		$this->db->set('bw',$bw);
		$this->db->insert('t_network_order');
	}
}
