<?php

class Wan_performance_model extends CI_Model 
{
	function getcountmon()
	{
		$this->db->where('t_unrec_process.p_process_id = "7"');
		$query = $this->db->from('t_unrec_process');
		return $query->count_all_results();
	}

	function getlokasiid($o_id)
	{
		$this->db->distinct();
		$this->db->where('site_name', $o_id);
		$query = $this->db->get('t_nw_site');
		return $query->result();
	}

	function getproses($o_id)
	{
		$this->db->where('t_nw_site.site_name', $o_id);
		$this->db->where('t_nw_site.t_nw_site_id = t_unrec_process.t_nw_site_id');
		$this->db->where('t_unrec_process.t_detail_network_order_id = t_detail_network_order.t_detail_network_order_id');
		$this->db->where('t_detail_network_order.t_detail_network_order_id = t_process.t_detail_network_order_id');
		$this->db->where('t_process.p_process_id = p_process.p_process_id');
		$query = $this->db->get('t_nw_site, t_unrec_process, t_detail_network_order, t_process, p_process');
		return $query->result();
	}

	function getidmon($i)
	{
		$this->db->where('p_monitoring.mon_name', $i);
		$query = $this->db->get('p_monitoring');
		return $query->row()->mon_id;
	}
	
	function countmon($order_id)
	{
		$this->db->where('t_monitoring.t_network_order_id', $order_id);
		$query = $this->db->from('t_monitoring');
		return $query->count_all_results();
	}

	function dropmon($order_id)
	{
		$this->db->where('t_monitoring.t_network_order_id', $order_id);
		$this->db->delete('t_monitoring');
	}
	function getorderid($site_id)
	{
		$this->db->where('t_nw_site.t_nw_site_id', $site_id);
		$this->db->where('t_nw_site.t_nw_site_id = t_unrec_process.t_nw_site_id');
		$this->db->where('t_unrec_process.t_detail_network_order_id = t_detail_network_order.t_detail_network_order_id');
		$this->db->where('t_detail_network_order.t_detail_network_order_id = t_network_order.t_detail_network_order_id');
		$query = $this->db->get('t_nw_site , t_unrec_process, t_detail_network_order, t_network_order');
		return $query->row()->t_network_order_id;
	}

	function insertmon($input)
	{

		$this->db->insert('t_monitoring',$input);
	}

	function getdatapermintaan()
	{
		$this->db->distinct();
		//$this->db->select('t_nw_site.site_name');
		//$this->db->select('p_site_type.type_name');
		//$this->db->select('p_service.service_name');
		//$this->db->select('p_nw_service.package');
		//$this->db->select('t_network_order.bw');
		$this->db->where('t_unrec_process.p_process_id = "7"');
		$this->db->where('p_nw_service.p_serv_type_id = "1"');
		$this->db->where('t_nw_service.p_nw_service_id = p_nw_service.p_nw_service_id');
		$this->db->where('t_unrec_process.t_detail_network_order_id = t_detail_network_order.t_detail_network_order_id');
		$this->db->where('t_network_order.t_detail_network_order_id = t_detail_network_order.t_detail_network_order_id');
		$this->db->where('t_nw_site.t_nw_site_id = t_network_order.t_nw_site_id');
		$this->db->where('p_site_type.p_site_type_id = t_nw_site.p_site_type_id');
		$this->db->where('t_network_order.t_network_order_id = t_nw_service.t_network_order_id');
		$this->db->where('p_nw_service.p_nw_service_id = t_nw_service.p_nw_service_id');
		$this->db->where('t_network_order.t_nw_site_id = t_nw_site.t_nw_site_id');
		$this->db->where('p_service.p_service_id = p_nw_service.p_service_id');
		$this->db->where('t_detail_network_order.p_order_type_id = p_order_type.p_order_type_id');
		$this->db->where('t_nw_site.p_region_id = p_region.p_region_id');
		$this->db->where('p_region.company_id = company.company_id');
		$query = $this->db->get('p_region, company, t_nw_site,t_network_order,p_site_type,p_nw_service,p_service,t_nw_service,t_unrec_process,t_detail_network_order,p_order_type');
    	return $query->result();
	}

	function get_data_permintaan_pic($o_id)
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
		$this->db->select('t_pic.phone');
		$this->db->select('t_pic.phone2');
		$this->db->where('t_nw_site.site_name',$o_id);
		$this->db->where('p_nw_service.p_serv_type_id = "1"');
		$this->db->where('t_nw_service.p_nw_service_id = p_nw_service.p_nw_service_id');
		$this->db->where('t_unrec_process.t_detail_network_order_id = t_detail_network_order.t_detail_network_order_id');
		$this->db->where('t_network_order.t_detail_network_order_id = t_detail_network_order.t_detail_network_order_id');
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
		$query = $this->db->get('t_nw_service,t_nw_site,t_network_order,p_site_type,p_nw_service,p_service,company,p_region,t_pic,provinsi,t_nw_site_pic,t_unrec_process,t_detail_network_order');
    	return $query->result();
	}

	function get_data_permintaan($o_id)
	{
		$this->db->distinct();
		$this->db->select('t_nw_site.site_name');
		$this->db->select('t_network_order.bw');
		$this->db->select('p_site_type.type_name');
		$this->db->select('p_service.service_name');
		$this->db->select('p_nw_service.package');
		$this->db->select('company.company_name');
		$this->db->select('t_nw_site.address');
		$this->db->select('p_region.region_name');
		$this->db->select('provinsi.provinsi_name');
		$this->db->select('t_nw_site.latitude');
		$this->db->select('t_nw_site.longitude');
		$this->db->where('t_nw_site.site_name',$o_id);
		$this->db->where('t_nw_service.p_nw_service_id >= "1"');
		$this->db->where('t_nw_service.p_nw_service_id <= "13"');
		$this->db->where('t_unrec_process.t_detail_network_order_id = t_detail_network_order.t_detail_network_order_id');
		$this->db->where('t_network_order.t_detail_network_order_id = t_detail_network_order.t_detail_network_order_id');
		$this->db->where('t_nw_site.t_nw_site_id = t_network_order.t_nw_site_id');
		$this->db->where('p_site_type.p_site_type_id = t_nw_site.p_site_type_id');
		$this->db->where('p_nw_service.p_nw_service_id = t_nw_service.p_nw_service_id');
		$this->db->where('t_nw_service.t_network_order_id = t_network_order.t_network_order_id');
		$this->db->where('t_network_order.t_nw_site_id = t_nw_site.t_nw_site_id');
		$this->db->where('p_service.p_service_id = p_nw_service.p_service_id');
		$this->db->where('company.company_id = p_region.company_id');
		$this->db->where('t_nw_site.p_region_id = p_region.p_region_id');
		$this->db->where('provinsi.provinsi_id = t_nw_site.provinsi_id');
		$query = $this->db->get('t_nw_service,t_nw_site,t_network_order,p_site_type,p_nw_service,p_service,company,p_region,provinsi,t_unrec_process,t_detail_network_order');
    	return $query->result();
	}

	function getbreadcrumbs($o_id)
	{
		$this->db->select('p_process.name');
		$this->db->where('t_nw_site.site_name',$o_id);
		$this->db->where('t_nw_site.t_nw_site_id = t_unrec_process.t_nw_site_id');
		$this->db->where('t_detail_network_order.t_detail_network_order_id = t_unrec_process.t_detail_network_order_id');
		$this->db->where('t_detail_network_order.p_order_type_id = p_order_type.p_order_type_id');
		$this->db->where('p_order_type.p_order_type_id = workflow.p_order_type_id');
		$this->db->where('workflow.p_process_id = p_process.p_process_id');
		$query = $this->db->get('t_nw_site, t_unrec_process, t_detail_network_order, p_order_type, workflow, p_process');
		return $query->result();
	}

	function getdatamonitoring()
	{
		$query = $this->db->get("p_monitoring");
		return $query->result();
	}
	function getsiteid($cek_lokasi)
	{
		$this->db->distinct();
		$this->db->where($cek_lokasi);
		$query = $this->db->get("t_nw_site"); 
		return $query->row()->t_nw_site_id;	
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

	function updateprocessmon($in_detail_id, $detail_id)
	{
		$this->db->where('t_process.t_detail_network_order_id',$detail_id);
		$this->db->where('t_process.p_process_id = "7"');
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
	
	public function getunrecupid ($site_id)
  	{
		$this->db->where('t_nw_site_id',$site_id);
		$query = $this->db->get("t_unrec_process");
		return $query->row()->t_detail_network_order_id;
  	}

	function inputunrec($in_unrec, $detail_id)
	{
		$this->db->where('t_unrec_process.t_detail_network_order_id',$detail_id);
		$this->db->update('t_unrec_process',$in_unrec);			
	}

	function getnext ($tahap, $detail_id)
	{
		$this->db->select ('workflow.next_process_id');
		$this->db->where ('t_unrec_process.p_process_id',$tahap);
		$this->db->where('t_detail_network_order.t_detail_network_order_id',$detail_id);
		$this->db->where('t_unrec_process.p_process_id = p_process.p_process_id');
		$this->db->where('p_process.p_process_id = workflow.p_process_id');
		$this->db->where('t_unrec_process.t_detail_network_order_id = t_detail_network_order.t_detail_network_order_id');
		$this->db->where('t_network_order.t_detail_network_order_id = t_detail_network_order.t_detail_network_order_id');
		//$this->db->where('t_detail_network_order.p_order_type_id',$proses);
		$this->db->where('t_detail_network_order.p_order_type_id = p_order_type.p_order_type_id');
		$this->db->where('p_order_type.p_order_type_id = workflow.p_order_type_id');
		$query = $this->db->get ('workflow, t_unrec_process, p_process, t_detail_network_order, p_order_type,t_network_order');
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

  	function insert_data_balo($data,$siteid)
	{
		$this->db->where('t_nw_site_id',$siteid);
		$this->db->update('t_network_order',$data);		
	}

	//reject----------------------------------------------------------------
	function getprevid($detail_id)
	{
		$this->db->select('workflow.p_process_id');
		$this->db->where('t_unrec_process.t_detail_network_order_id', $detail_id);
		$this->db->where('t_unrec_process.p_process_id = workflow.next_process_id');
		$this->db->where('t_unrec_process.t_detail_network_order_id = t_detail_network_order.t_detail_network_order_id');
		$this->db->where('t_detail_network_order.p_order_type_id = p_order_type.p_order_type_id');
		$this->db->where('p_order_type.p_order_type_id = workflow.p_order_type_id');
		$query = $this->db->get('t_detail_network_order, t_unrec_process, workflow, p_order_type');
		return $query->row()->p_process_id;
	}

	function dropprocess($detail_id, $tahap)
	{
		$this->db->where('t_process.t_detail_network_order_id', $detail_id);
		$this->db->where('t_process.p_process_id', $tahap);
		$this->db->delete('t_process');
	}

	function rejectdate($detail_id, $prev_id)
	{
		$this->db->where('t_process.t_detail_network_order_id', $detail_id);
		$this->db->where('t_process.p_process_id', $prev_id);
		$this->db->set('valid_to','',FALSE);
		$this->db->update('t_process');

	}

	function rejectunrec($detail_id, $prev_id)
	{
		$process = array ( 'p_process_id' => $prev_id);

		$this->db->where('t_unrec_process.t_detail_network_order_id', $detail_id);
		$this->db->update('t_unrec_process', $process);
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

	public function get_ket_reject($id)
	{	
		$this->db->select('t_process.ket_reject');
		$this->db->where('t_nw_site.site_name',$id);
		$this->db->where('t_nw_site.t_nw_site_id = t_unrec_process.t_nw_site_id');
		$this->db->where('t_unrec_process.t_detail_network_order_id = t_process.t_detail_network_order_id');
		$this->db->where('t_unrec_process.p_process_id = t_process.p_process_id');
		$query = $this->db->get('t_nw_site,t_unrec_process,t_process');
		return $query->result();
	} 
}
