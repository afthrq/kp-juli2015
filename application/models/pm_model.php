<?php

class Pm_model extends CI_Model 
{
	function getlokasiid($o_id)
	{
		$this->db->distinct();
		$this->db->where('site_name', $o_id);
		$query = $this->db->get('t_nw_site');
		return $query->result();
	}


	function get_list_permintaan()
	{
		
	}
	function insert_koordinasi_provider($tiket_provider,$pic_provider,$detail_id)
	{
		$this->db->where('t_detail_network_order_id', $detail_id);
		$data = array(
        'tiket_order_provider' => $tiket_provider,
        'pic_provider' => $pic_provider);
        $this->db->update('t_detail_network_order', $data);
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

	function getdatajenis()
	{
		$this->db->select('p_site_type_id');  
		$this->db->get('t_nw_site'); 
		$sub_query = $this->db->last_query();

		$this->db->select('type_name');
		$this->db->where("p_site_type_id = ($sub_query)", NULL, False);
		$query = $this->db->get("p_site_type");		
		return $query->result();
	}

	function inputtahap($in_tahap)
	{

		$this->db->set('valid_fr','NOW()',FALSE);
		$this->db->insert('t_process',$in_tahap);		
	}

	public function getorderupid ($site_id)
  	{
		$this->db->where('t_nw_site_id',$site_id);
		$query = $this->db->get("t_network_order");
		return $query->row()->t_network_order_id;
  	}

  	public function getdetailupid ($order_up_id)
  	{
		$this->db->where('t_network_order_id',$order_up_id);
		$query = $this->db->get("t_network_order");
		return $query->row()->t_detail_network_order_id;
  	}

  	public function getdataorder($site_id)
  	{
  		$this->db->select('t_nw_site_id');
  		$this->db->select('p_lastmile_id');
  		$this->db->select('no_jar');
  		$this->db->select('ip_wan');
  		$this->db->select('ip_lan');
  		$this->db->select('ip_loop');
  		$this->db->select('asn');
  		$this->db->select('bw');
  		$this->db->select('netmask_wan');
  		$this->db->select('netmask_lan');
  		$this->db->select('hostname');
  		$this->db->select('sla');
  		$this->db->select('valid_fr');
  		$this->db->select('valid_to');
  		$this->db->select('mon_cacti');
  		$this->db->select('mon_npmd');
  		$this->db->select('mon_sms');
  		$this->db->select('mon_log');

  		$this->db->where('t_nw_site_id',$site_id);
  		$query = $this->db->get("t_network_order");
  		return $query->row();
  	}

  	public function copydata($input)
  	{
  		$this->db->insert('t_network',$input);

  	}



}
