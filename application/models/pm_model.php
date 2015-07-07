<?php

class Pm_model extends CI_Model 
{
	function insert_koordinasi_provider($tiket_provider,$pic_provider)
	{
		$data = array(
        'tiket_order_provider' => $tiket_provider,
        'pic_provider' => $pic_provider);
		$this->db->insert('t_detail_network_order',$data);
	}
}
