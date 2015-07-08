<?php

class Verifikator_model extends CI_Model 
{
	function get_list_permintaan()
	{
		
	}

	function get_data_permintaan()
	{
		$this->db->where('p_region_id', "1");
		$query = $this->db->get('p_region');
		return $query->result();
	}

	function insert_koordinasi_provider($tiket_provider,$pic_provider)
	{
		/*
		$data = array(
        'tiket_order_provider' => $tiket_provider,
        'pic_provider' => $pic_provider);
        $this->db->update('t_detail_network_order', $data);
        $this->db->where('t_detail_network_order_id', "1"); //change "1" with parameter that shows current network order id
        */
	}
}
