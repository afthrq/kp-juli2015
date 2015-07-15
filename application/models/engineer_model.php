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

	function getlastmileid($lastmile){
		$this->db->distinct();
		$this->db->where('name', $lastmile);
		$query = $this->db->get("p_lastmile"); 
		return $query->row()->p_lastmile_id;	
	}

	function getnwsiteid($in_traffic,$cek_lokasi)
	{
		$this->db->distinct();
		$this->db->where($cek_lokasi);
		$this->db->where($in_traffic);
		$query = $this->db->get("t_nw_site"); 
		return $query->row()->t_nw_site_id;	
	}

	//
	function updatenwsite($in_traffic,$lokasi)
	{
		$this->db->where('t_nw_site.site_name',$lokasi );
		$this->db->distinct();
		$this->db->update('t_nw_site',$in_traffic);

	}

	function inputlastmile($in_lastmile)
	{
		$this->db->distinct();
		$this->db->insert('p_lastmile',$in_lastmile);
	}


	//
	function insertdatafinal($in_final,$p_final)
	{
		$this->db->where($p_final);
		$this->db->distinct();
		$this->db->update('t_network_order',$in_final);
		
	}

	function insert_data_balo($data,$siteid)
	{
		$this->db->where('t_nw_site_id',$siteid);
		$this->db->update('t_network_order',$data);		
	}

	function getsiteid($cek_lokasi)
	{
		$this->db->distinct();
		$this->db->where($cek_lokasi);
		$query = $this->db->get("t_nw_site"); 
		return $query->row()->t_nw_site_id;	
	}
}
