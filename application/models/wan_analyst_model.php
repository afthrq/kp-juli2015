<?php

class Wan_analyst_model extends CI_Model 
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function getlokasiid($o_id)
	{
		$this->db->distinct();
		$this->db->where('site_name', $o_id);
		$query = $this->db->get('t_nw_site');
		return $query->result();
	}

	function getdatapermintaansrv()
	{
		$this->db->distinct();
		//$this->db->select('t_nw_site.site_name');
		//$this->db->select('p_site_type.type_name');
		//$this->db->select('p_service.service_name');
		//$this->db->select('p_nw_service.package');
		//$this->db->select('t_network_order.bw');
		$this->db->where('t_unrec_process.p_process_id = "4"');
		$this->db->where('t_nw_service.p_nw_service_id >= "1"');
		$this->db->where('t_nw_service.p_nw_service_id <= "13"');
		$this->db->where('t_unrec_process.t_detail_network_order_id = t_detail_network_order.t_detail_network_order_id');
		$this->db->where('t_network_order.t_detail_network_order_id = t_detail_network_order.t_detail_network_order_id');
		$this->db->where('t_nw_site.t_nw_site_id = t_network_order.t_nw_site_id');
		$this->db->where('p_site_type.p_site_type_id = t_nw_site.p_site_type_id');
		$this->db->where('t_network_order.t_network_order_id = t_nw_service.t_network_order_id');
		$this->db->where('p_nw_service.p_nw_service_id = t_nw_service.p_nw_service_id');
		$this->db->where('t_network_order.t_nw_site_id = t_nw_site.t_nw_site_id');
		$this->db->where('p_service.p_service_id = p_nw_service.p_service_id');
		$query = $this->db->get('t_nw_site,t_network_order,p_site_type,p_nw_service,p_service,t_nw_service,t_unrec_process,t_detail_network_order');
    	return $query->result();
	}

	function getdatapermintaanimp()
	{
		$this->db->distinct();
		//$this->db->select('t_nw_site.site_name');
		//$this->db->select('p_site_type.type_name');
		//$this->db->select('p_service.service_name');
		//$this->db->select('p_nw_service.package');
		//$this->db->select('t_network_order.bw');
		$this->db->where('t_unrec_process.p_process_id = "5"');
		$this->db->where('t_nw_service.p_nw_service_id >= "1"');
		$this->db->where('t_nw_service.p_nw_service_id <= "13"');
		$this->db->where('t_unrec_process.t_detail_network_order_id = t_detail_network_order.t_detail_network_order_id');
		$this->db->where('t_network_order.t_detail_network_order_id = t_detail_network_order.t_detail_network_order_id');
		$this->db->where('t_nw_site.t_nw_site_id = t_network_order.t_nw_site_id');
		$this->db->where('p_site_type.p_site_type_id = t_nw_site.p_site_type_id');
		$this->db->where('t_network_order.t_network_order_id = t_nw_service.t_network_order_id');
		$this->db->where('p_nw_service.p_nw_service_id = t_nw_service.p_nw_service_id');
		$this->db->where('t_network_order.t_nw_site_id = t_nw_site.t_nw_site_id');
		$this->db->where('p_service.p_service_id = p_nw_service.p_service_id');
		$query = $this->db->get('t_nw_site,t_network_order,p_site_type,p_nw_service,p_service,t_nw_service,t_unrec_process,t_detail_network_order');
    	return $query->result();
	}

	function getdatapermintaanbalo()
	{
		$this->db->distinct();
		//$this->db->select('t_nw_site.site_name');
		//$this->db->select('p_site_type.type_name');
		//$this->db->select('p_service.service_name');
		//$this->db->select('p_nw_service.package');
		//$this->db->select('t_network_order.bw');
		$this->db->where('t_unrec_process.p_process_id = "8"');
		$this->db->where('t_nw_service.p_nw_service_id >= "1"');
		$this->db->where('t_nw_service.p_nw_service_id <= "13"');
		$this->db->where('t_unrec_process.t_detail_network_order_id = t_detail_network_order.t_detail_network_order_id');
		$this->db->where('t_network_order.t_detail_network_order_id = t_detail_network_order.t_detail_network_order_id');
		$this->db->where('t_nw_site.t_nw_site_id = t_network_order.t_nw_site_id');
		$this->db->where('p_site_type.p_site_type_id = t_nw_site.p_site_type_id');
		$this->db->where('t_network_order.t_network_order_id = t_nw_service.t_network_order_id');
		$this->db->where('p_nw_service.p_nw_service_id = t_nw_service.p_nw_service_id');
		$this->db->where('t_network_order.t_nw_site_id = t_nw_site.t_nw_site_id');
		$this->db->where('p_service.p_service_id = p_nw_service.p_service_id');
		$query = $this->db->get('t_nw_site,t_network_order,p_site_type,p_nw_service,p_service,t_nw_service,t_unrec_process,t_detail_network_order');
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

	function getnwsiteid($cek_lokasi)
	{
		$this->db->distinct();
		$this->db->where($cek_lokasi);
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

  	//
  	public function inputdatabalo($data)
  	{
  		$this->db->update('t_detail_network_order', $data);
  	}

  	function insert_dokumen($tipe_dokumen, $caption, $path ,$work_id)
	{
		$data = array('t_work_id' => $work_id,
        'p_doc_type_id' => $tipe_dokumen,
        'caption' => $caption,
        'path' => $path);
        $this->db->insert('t_document', $data);
        //$this->db->where('t_work_id', "1"); //change "1" with parameter that shows current process id
	}

	function updateprocesssrv($in_detail_id, $detail_id)
	{
		$this->db->where('t_process.t_detail_network_order_id',$detail_id);
		$this->db->where('t_process.p_process_id = "4"');
		$this->db->set('t_process.valid_to','NOW()',FALSE);		
		$this->db->update('t_process',$in_detail_id);
	}

	function updateprocessimp($in_detail_id, $detail_id)
	{
		$this->db->where('t_process.t_detail_network_order_id',$detail_id);
		$this->db->where('t_process.p_process_id = "5"');
		$this->db->set('t_process.valid_to','NOW()',FALSE);		
		$this->db->update('t_process',$in_detail_id);
	}

	function updateprocessbalo($in_detail_id, $detail_id)
	{
		$this->db->where('t_process.t_detail_network_order_id',$detail_id);
		$this->db->where('t_process.p_process_id = "8"');
		$this->db->set('t_process.valid_to','NOW()',FALSE);		
		$this->db->update('t_process',$in_detail_id);
	}
	function getworkid($detail_id)
	{
		$this->db->where('t_process.t_detail_network_order_id',$detail_id);
		$this->db->select('t_process.t_work_id');
		$query = $this->db->get('t_process');

		return $query->row()->t_work_id;
	}

	function inputunrec($in_unrec, $detail_id)
	{
		$this->db->where('t_unrec_process.t_detail_network_order_id',$detail_id);
		$this->db->update('t_unrec_process',$in_unrec);			
	}
	
	function getnext ($tahap, $get_next)
	{
		$this->db->select ('workflow.next_process_id');
		$this->db->where ('t_unrec_process.p_process_id',$tahap);
		$this->db->where('t_unrec_process.p_process_id = p_process.p_process_id');
		$this->db->where('p_process.p_process_id = workflow.p_process_id');
		//$this->db->where('t_detail_network_order.p_order_type_id',$proses);
		$this->db->where('t_detail_network_order.p_order_type_id = p_order_type.p_order_type_id');
		$this->db->where('p_order_type.p_order_type_id = workflow.p_order_type_id');
		$query = $this->db->get ('workflow, t_unrec_process, p_process, t_detail_network_order, p_order_type');
		return $query->row()->next_process_id;
	}

	function nexttahap($in_next)
	{
		$this->db->set('valid_fr','NOW()',FALSE);
		$this->db->insert('t_process',$in_next);	
	}

	function updateunrec($up_unrec, $detail_id)
	{
		$this->db->where('t_unrec_process.t_detail_network_order_id',$detail_id);	
		$this->db->update('t_unrec_process',$up_unrec);
	}
}
