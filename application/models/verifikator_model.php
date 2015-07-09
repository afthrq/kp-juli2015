<?php

class Verifikator_model extends CI_Model 
{
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


	function get_data_permintaan()
	{
		$this->db->select('t_nw_site.site_name');
		$this->db->select('t_network_order.bw');
		$this->db->select('p_site_type.type_name');
		$this->db->select('p_service.service_name');
		$this->db->select('p_nw_service.package');
		$this->db->select('company.company_name');
		$this->db->select('t_nw_site.address');
		$this->db->select('p_region.region_name');
		$this->db->select('provinsi.provinsi_name');
		$this->db->select('t_pic.pic_name');
		$this->db->where('t_nw_site.t_nw_site_id = t_network_order.t_nw_site_id');
		$this->db->where('p_site_type.p_site_type_id = t_nw_site.p_site_type_id');
		$this->db->where('p_nw_service.p_nw_service_id = t_network_order.p_nw_service_id');
		$this->db->where('t_network_order.t_nw_site_id = t_nw_site.t_nw_site_id');
		$this->db->where('p_service.p_service_id = p_nw_service.p_service_id');
		$this->db->where('t_pic.t_pic_id = t_nw_site_pic.t_pic_id');
		$this->db->where('t_nw_site_pic.t_nw_site_id = t_nw_site.t_nw_site_id');
		$this->db->where('company.company_id = p_region.company_id');
		$this->db->where('t_nw_site.p_region_id = p_region.p_region_id');
		$this->db->where('provinsi.provinsi_id = t_nw_site.provinsi_id');
		$query = $this->db->get('t_nw_site,t_network_order,p_site_type,p_nw_service,p_service,company,p_region,t_pic,provinsi,t_nw_site_pic');
    	return $query->result();
		
	}

	function insert_detail_order($no_form, $tanggal_permintaan)
	{
		$data = array(
        'no_form_permintaan' => $no_form,
        'tgl_permintaan' => $tanggal_permintaan);
        $this->db->update('t_detail_network_order', $data);
        //$this->db->where('t_detail_network_order_id', "1"); //change "1" with parameter that shows current network order id
	}
	function insert_dokumen($tipe_dokumen, $caption, $path)
	{
		$data = array(
        'p_doc_type_id' => $tipe_dokumen,
        'caption' => $caption,
        'path' => $path);
        $this->db->update('t_document', $data);
        //$this->db->where('t_work_id', "1"); //change "1" with parameter that shows current process id
	}
}
