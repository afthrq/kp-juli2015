<?php

class Pm_model extends CI_Model 
{

	function getsitenserviceid($o_id)
	{
		$this->db->distinct();
		$this->db->where('t_nw_site.site_name', $o_id);
		$this->db->where('t_nw_site.t_nw_site_id = t_unrec_process.t_nw_site_id');
		$this->db->where('t_unrec_process.t_detail_network_order_id = t_detail_network_order.t_detail_network_order_id');
		$query = $this->db->get('t_nw_site,t_unrec_process,t_detail_network_order');
		return $query->result();
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
		//$this->db->select('t_nw_site.site_name');
		//$this->db->select('p_site_type.type_name');
		//$this->db->select('p_service.service_name');
		//$this->db->select('p_nw_service.package');
		//$this->db->select('t_network_order.bw');
		$this->db->where('t_nw_service.p_nw_service_id >= "1"');
		$this->db->where('t_nw_service.p_nw_service_id <= "13"');
		$this->db->where('t_nw_site.t_nw_site_id = t_network_order.t_nw_site_id');
		$this->db->where('p_site_type.p_site_type_id = t_nw_site.p_site_type_id');
		$this->db->where('t_network_order.t_network_order_id = t_nw_service.t_network_order_id');
		$this->db->where('p_nw_service.p_nw_service_id = t_nw_service.p_nw_service_id');
		$this->db->where('t_network_order.t_nw_site_id = t_nw_site.t_nw_site_id');
		$this->db->where('p_service.p_service_id = p_nw_service.p_service_id');
		$query = $this->db->get('t_nw_site,t_network_order,p_site_type,p_nw_service,p_service,t_nw_service');
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



  	//insert new---------------------------------------------//
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
  		//$this->db->select('valid_fr');
  		//$this->db->select('valid_to');
  		$this->db->select('mon_cacti');
  		$this->db->select('mon_npmd');
  		$this->db->select('mon_sp');

  		$this->db->where('t_nw_site_id',$site_id);
  		$query = $this->db->get("t_network_order");
   		return $query->row();
  	}

  	public function copydata($arrayorder)
  	{
		$this->db->set('valid_fr','NOW()',FALSE);
		$this->db->insert('t_network',$arrayorder);
		$id = $this->db->insert_id();
		$this->db->where('t_network_id',$id);
		$query = $this->db->get("t_network");
		return $query->row()->t_network_id;
  	}

  	function getcountserv($order_id)
  	{
  		$this->db->where('t_network_order_id', $order_id);
  		$query = $this->db->from('t_network_order');
		return $query->count_all_results();
  	}

  	function getarraylink($site_id)
	{
		$this->db->where('t_nw_service.p_nw_service_id >= "1"');
		$this->db->where('t_nw_service.p_nw_service_id <= "13"');
		$this->db->where('t_network.t_nw_site_id',$site_id);
		$this->db->where('t_nw_site.t_nw_site_id = t_network.t_nw_site_id');
		$this->db->where('t_network_order.t_nw_site_id = t_nw_site.t_nw_site_id');
		$this->db->where('t_unrec_process.t_nw_site_id = t_nw_site.t_nw_site_id');
		$this->db->where('t_unrec_process.t_detail_network_order_id = t_detail_network_order.t_detail_network_order_id');
		$this->db->where('t_detail_network_order.t_detail_network_order_id = t_network_order.t_detail_network_order_id');
		$this->db->where('t_nw_service.t_network_order_id = t_network_order.t_network_order_id');
		$query = $this->db->get('t_network, t_nw_site, t_network_order, t_unrec_process, t_detail_network_order,t_nw_service');
		return $query->row()->p_nw_service_id;
	}

	function getarrayrouter($site_id)
	{
		$this->db->where('t_nw_service.p_nw_service_id >= "14"');
		$this->db->where('t_nw_service.p_nw_service_id <= "15"');
		$this->db->where('t_network.t_nw_site_id',$site_id);
		$this->db->where('t_nw_site.t_nw_site_id = t_network.t_nw_site_id');
		$this->db->where('t_network_order.t_nw_site_id = t_nw_site.t_nw_site_id');
		$this->db->where('t_unrec_process.t_nw_site_id = t_nw_site.t_nw_site_id');
		$this->db->where('t_unrec_process.t_detail_network_order_id = t_detail_network_order.t_detail_network_order_id');
		$this->db->where('t_detail_network_order.t_detail_network_order_id = t_network_order.t_detail_network_order_id');
		$this->db->where('t_nw_service.t_network_order_id = t_network_order.t_network_order_id');
		$query = $this->db->get('t_network, t_nw_site, t_network_order, t_unrec_process, t_detail_network_order,t_nw_service');
		return $query->row()->p_nw_service_id;
	}
	

	function getarraymodule($site_id)
	{

		$this->db->where('t_nw_service.p_nw_service_id >= "16"');
		$this->db->where('t_nw_service.p_nw_service_id <= "17"');
		$this->db->where('t_network.t_nw_site_id',$site_id);
		$this->db->where('t_nw_site.t_nw_site_id = t_network.t_nw_site_id');
		$this->db->where('t_network_order.t_nw_site_id = t_nw_site.t_nw_site_id');
		$this->db->where('t_unrec_process.t_nw_site_id = t_nw_site.t_nw_site_id');
		$this->db->where('t_unrec_process.t_detail_network_order_id = t_detail_network_order.t_detail_network_order_id');
		$this->db->where('t_detail_network_order.t_detail_network_order_id = t_network_order.t_detail_network_order_id');
		$this->db->where('t_nw_service.t_network_order_id = t_network_order.t_network_order_id');
		$query = $this->db->get('t_network, t_nw_site, t_network_order, t_unrec_process, t_detail_network_order,t_nw_service');
		return $query->row()->p_nw_service_id;
	}

  	public function copyservice($arraylink, $arrayrouter)
  	{
  		$this->db->insert('t_nw_service_fix',$arraylink);
  		$this->db->insert('t_nw_service_fix',$arrayrouter);
  	}

  	//update-------------------------------------------------------//
  	public function getdataorderup($site_id)
  	{
  		$this->db->select('t_nw_site.t_nw_site_id');
  		$this->db->select('t_network_order.p_lastmile_id');
  		$this->db->select('t_network_order.no_jar');
  		$this->db->select('t_network_order.ip_wan');
  		$this->db->select('t_network_order.ip_lan');
  		$this->db->select('t_network_order.ip_loop');
  		$this->db->select('t_network_order.asn');
  		$this->db->select('t_network_order.bw');
  		$this->db->select('t_network_order.netmask_wan');
  		$this->db->select('t_network_order.netmask_lan');
  		$this->db->select('t_network_order.hostname');
  		$this->db->select('t_network_order.sla');
  		$this->db->select('t_network_order.valid_fr');
  		$this->db->select('t_network_order.valid_to');
  		$this->db->select('t_network_order.mon_cacti');
  		$this->db->select('t_network_order.mon_npmd');
  		$this->db->select('t_network_order.mon_sp');
  		$this->db->where('t_unrec_process.t_nw_site_id',$site_id);
		$this->db->where('t_nw_site.t_nw_site_id = t_network.t_nw_site_id');
		$this->db->where('t_network_order.t_nw_site_id = t_nw_site.t_nw_site_id');
		$this->db->where('t_unrec_process.t_nw_site_id = t_nw_site.t_nw_site_id');
		$this->db->where('t_unrec_process.t_detail_network_order_id = t_detail_network_order.t_detail_network_order_id');
		$this->db->where('t_detail_network_order.t_detail_network_order_id = t_network_order.t_detail_network_order_id');
		$query = $this->db->get('t_network, t_nw_site, t_network_order, t_unrec_process, t_detail_network_order');
  		return $query->row();
  	}

  	function getnetworkid($site_id)
  	{
  		$this->db->where('t_network.t_nw_site_id',$site_id);
  		$query = $this->db->get('t_network');

  		return $query->row()->t_network_id;
  	}

  	public function copydataup($arrayorder, $nwid)
  	{
		$this->db->set('valid_fr','NOW()',FALSE);
		$this->db->where('t_network.t_network_id',$nwid);
		$this->db->update('t_network',$arrayorder);
  	}


  	function getworkid($in_detail_id)
	{
		$this->db->set('valid_fr','NOW()',FALSE);
		$this->db->insert('t_process',$in_detail_id);
		$id = $this->db->insert_id();
		$this->db->where('t_work_id',$id);
		$query = $this->db->get("t_process");
		return $query->row()->t_work_id;
	}

	function insert_dokumen($tipe_dokumen, $caption, $path, $work_id)
	{
		$data = array( 't_work_id' => $work_id,
        'p_doc_type_id' => $tipe_dokumen,
        'caption' => $caption,
        'path' => $path);
        $this->db->insert('t_document', $data);
	}

  	public function copyserviceup($arraylink, $nwid)
  	{
  		$this->db->where('t_nw_service_fix.p_nw_service_id >= "1"');
  		$this->db->where('t_nw_service_fix.p_nw_service_id <= "13"');  		
  		$this->db->where('t_nw_service_fix.t_network_id', $nwid);
  		$this->db->update('t_nw_service_fix',$arraylink);
  	}

  	public function copymodule($arraymodule)
  	{
  		$this->db->insert('t_nw_service_fix',$arraymodule);
  	}

  	public function dropunrecdata($detail_id)
  	{
  		$this->db->where('t_unrec_process.t_detail_network_order_id', $detail_id);
  		$this->db->delete('t_unrec_process');
  	}

  	public function dismantle($site_id)
  	{
  		$data = array ('t_nw_site_id' => $site_id);
  		$this->db->delete('t_network', $data);
  	}
}
