<?php

class Engineer_model extends CI_Model 
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
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
		$this->db->where('p_nw_service.p_nw_service_id = t_network_order.p_nw_service_id');
		$this->db->where('t_network_order.t_nw_site_id = t_nw_site.t_nw_site_id');
		$this->db->where('p_service.p_service_id = p_nw_service.p_service_id');
		$query = $this->db->get('t_nw_site,t_network_order,p_site_type,p_nw_service,p_service');
    	return $query->result();
	}

	function getlastmileid($lastmile){
		$this->db->where('name', $lastmile);
		$query = $this->db->get("p_lastmile"); 
		return $query->row()->p_lastmile_id;	
	}

	function getnwsiteid($traffic){
		$this->db->where('traffic_mgmt', $traffic);
		$query = $this->db->get("t_nw_site"); 
		return $query->row()->t_nw_site_id;	
	}

	//
	function updatenwsite($in_traffic)
	{
		$this->db->update('t_nw_site',$in_traffic);
		$this->db->where('t_nw_site.t_nw_site_id = 1');
	}

	function inputlastmile($in_lastmile)
	{
		$this->db->insert('p_lastmile',$in_lastmile);
	}


	//
	function insertdatafinal($in_final)
	{
		$this->db->update('t_network_order',$in_final);		
	}




}
