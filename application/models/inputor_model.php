<?php

class Inputor_model extends CI_Model 
{
	function getDataPerusahaan()
	{
		$this->db->select('name');
		$query = $this->db->get('company');
		foreach ($query->result() as $row)
		{
   			return $row->name;
		}
	}

	function getDataJenis()
	{
		$this->db->select('type_name');
		$query = $this->db->get('p_site_type');
		foreach ($query->result() as $row)
		{
   			return $row->name;
		}
	}

	function getDataRegion()
	{
		$this->db->select('name');
		$query = $this->db->get('p_region');
		foreach ($query->result() as $row)
		{
   			return $row->name;
		}
	}

	function getDataLayanan()
	{
		$this->db->select('name');
		$query = $this->db->get('p_nw_service');
		foreach ($query->result() as $row)
		{
   			return $row->name;
		}
	}

	function getDataPaket($layanan)
	{
		//layanan parsing dari hasil fungsi getDataLayanan
		$this->db->select('package');
		$this->db->where('name', $layanan);
		$query = $this->db->get("p_nw_service");		
    	foreach ($query->result() as $row)
		{
   			return $row->name;
		}
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
