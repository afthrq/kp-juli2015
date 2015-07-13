<?php

class Pm_model extends CI_Model 
{
	function get_list_permintaan()
	{
		
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
		//save the sub query in variable $sub_query = $this->db->last_query(); 
		$sub_query = $this->db->last_query();

		$this->db->select('type_name');
		$this->db->where("p_site_type_id = ($sub_query)", NULL, False);
		$query = $this->db->get("p_site_type");		
		return $query->result();
	}
/*
	function getdatalayanan()
	{
		$this->db->select('p_nw_service_id'); 
		//where ke status 
		$query = $this->db->get('t_network_order'); 
		//save the sub query in variable $sub_query = $this->db->last_query(); 
		return $query->result();

		$this->db->select('p_service_id');
		$this->db->where("p_nw_service_id = ($sub_query)", NULL, False);
		$this->db->get("p_nw_service"); 
		//save the sub query in variable $sub_query = $this->db->last_query(); 
		$sub_query = $this->db->last_query();

		$this->db->select('name');
		$this->db->where("p_service_id = ($sub_query)", NULL, False);
		$query = $this->db->get("p_service");		
    	foreach ($query->result() as $row)
		{
   			return $row->name;
		}

	}

	function getdatapaket()
	{
		$this->db->select('p_nw_service_id'); 
		//where ke status 
		$query = $this->db->get('t_network_order'); 
		//save the sub query in variable $sub_query = $this->db->last_query(); 
		return $query->result();
/*
		$this->db->select('package');
		$this->db->where("p_nw_service_id = ($sub_query)", NULL, False);
		$query = $this->db->get("p_nw_service"); 
		//save the sub query in variable $sub_query = $this->db->last_query(); 
    	foreach ($query->result() as $row)
		{
   			return $row->name;
		}

	}
	function getdatabandwidth()
	{
		$this->db->select('bw');
		$query = $this->db->get('t_network_order');
    	return $query->result();
	}*/

}
