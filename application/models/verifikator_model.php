<?php

class Verifikator_model extends CI_Model 
{
	function get_list_permintaan()
	{
		
	}

	function get_data_permintaan()
	{
		
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
        'caption' => $caption
        'path' => $path);
        $this->db->update('t_document', $data);
        //$this->db->where('t_work_id', "1"); //change "1" with parameter that shows current process id
	}
}
