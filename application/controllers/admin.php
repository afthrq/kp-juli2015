<?php

class Admin extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		session_start();

        $this->load->database();
        $this->load->helper('url');
        $this->load->library('grocery_CRUD');

		if($this->session->userdata('role') != "admin")
		{
			redirect('user','refresh');	
        }
	}

    public function _example_output($output = null)
    {

        $this->load->view('admin/home',$output);
    }

    public function index()
    {
        $this->_example_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
    }

    public function layanan()
    {

            $crud = new grocery_CRUD();
     
            $crud->set_theme('bootstrap');
     
            $crud->set_subject('Layanan'); 
            $crud->set_table('p_service');
            $crud->columns('p_service_id','service_name');
            $crud->display_as('p_service_id','#')
                ->display_as('service_name', 'Nama Layanan');
        
            $crud->unset_print();
            $crud->unset_jquery_ui();
            $crud->unset_export();
     
            $output = $crud->render();

            $this->_example_output($output);
    }

    public function tipe_layanan()
    {

            $crud = new grocery_CRUD();
     
            $crud->set_theme('bootstrap');
     
            $crud->set_subject('Tipe Layanan'); 
            $crud->set_table('p_service_type');
            $crud->columns('p_serv_type_id','name');
            $crud->display_as('p_serv_type_id','#')
                ->display_as('name', 'Nama Tipe Layanan');
        
            $crud->unset_print();
            $crud->unset_jquery_ui();
            $crud->unset_export();
     
            $output = $crud->render();

            $this->_example_output($output);
    }

    public function perusahaan()
    {
            $crud = new grocery_CRUD();
     
            $crud->set_theme('bootstrap');
     
            $crud->set_subject('Provider'); 
            $crud->set_table('company');
            $crud->columns('company_id','company_name');
            $crud->display_as('company_id','#')
                ->display_as('company_name', 'Nama Perusahaan');
        
            $crud->unset_print();
            $crud->unset_jquery_ui();
            $crud->unset_export();
     
            $output = $crud->render();

            $this->_example_output($output);
    }

    public function provider()
    {
            $crud = new grocery_CRUD();
     
            $crud->set_theme('bootstrap');
     
            $crud->set_subject('Provider'); 
            $crud->set_table('provider');
            $crud->columns('provider_id','provider_name');
            $crud->display_as('provider_id','#')
                ->display_as('provider_name', 'Nama Provider');
        
            $crud->unset_print();
            $crud->unset_jquery_ui();
            $crud->unset_export();
     
            $output = $crud->render();

            $this->_example_output($output);
    }

    public function provinsi()
    {
            $crud = new grocery_CRUD();
     
            $crud->set_theme('bootstrap');
     
            $crud->set_subject('Provinsi'); 
            $crud->set_table('provinsi');
            $crud->columns('provinsi_id','provinsi_name');
            $crud->display_as('provinsi_id','ID Provinsi')
                ->display_as('provinsi_name', 'Nama Provinsi');
        
            $crud->unset_print();
            $crud->unset_jquery_ui();
            $crud->unset_export();
     
            $output = $crud->render();

            $this->_example_output($output);
    }

    public function lastmile()
    {
            $crud = new grocery_CRUD();
     
            $crud->set_theme('bootstrap');
     
            $crud->set_subject('Lastmile'); 
            $crud->set_table('p_lastmile');
            $crud->columns('p_lastmile_id','name');
            $crud->display_as('p_lastmile_id','#')
                ->display_as('name', 'Jenis Lastmile');
        
            $crud->unset_print();
            $crud->unset_jquery_ui();
            $crud->unset_export();
     
            $output = $crud->render();

            $this->_example_output($output);
    }

    public function monitoring()
    {
            $crud = new grocery_CRUD();
     
            $crud->set_theme('bootstrap');
     
            $crud->set_subject('Monitoring'); 
            $crud->set_table('p_monitoring');
            $crud->columns('mon_id','mon_name');
            $crud->display_as('mon_id','#')
                ->display_as('mon_name', 'Jenis Monitoring');
        
            $crud->unset_print();
            $crud->unset_jquery_ui();
            $crud->unset_export();
     
            $output = $crud->render();

            $this->_example_output($output);
    }

    public function tipe_permintaan()
    {
            $crud = new grocery_CRUD();
     
            $crud->set_theme('bootstrap');
     
            $crud->set_subject('Tipe Permintaan'); 
            $crud->set_table('p_order_type');
            $crud->columns('p_order_type_id','ord_name', 'delivery_time', 'desc');
            $crud->display_as('p_order_type_id','#')
                ->display_as('ord_name', 'Tipe Permintaan')
                ->display_as('delivery_time', 'Waktu Pengerjaan')
                ->display_as('desc', 'Deskripsi');
        
            $crud->unset_print();
            $crud->unset_jquery_ui();
            $crud->unset_export();
     
            $output = $crud->render();

            $this->_example_output($output);
    }

    public function proses()
    {
            $crud = new grocery_CRUD();
     
            $crud->set_theme('bootstrap');
     
            $crud->set_subject('Proses'); 
            $crud->set_table('p_process');
            $crud->columns('p_process_id','name', 'desc');
            $crud->display_as('p_process_id','#')
                ->display_as('name', 'Nama Proses')
                ->display_as('desc', 'Deskripsi');
        
            $crud->unset_print();
            $crud->unset_jquery_ui();
            $crud->unset_export();
     
            $output = $crud->render();

            $this->_example_output($output);
    }

    public function jenis_lokasi()
    {
            $crud = new grocery_CRUD();
     
            $crud->set_theme('bootstrap');
     
            $crud->set_subject('Jenis Lokasi'); 
            $crud->set_table('p_site_type');
            $crud->columns('p_site_type_id','type_name', 'desc');
            $crud->display_as('p_site_type_id','#')
                ->display_as('type_name', 'Jenis Lokasi')
                ->display_as('desc', 'Deskripsi');
        
            $crud->unset_print();
            $crud->unset_jquery_ui();
            $crud->unset_export();
     
            $output = $crud->render();

            $this->_example_output($output);
    }

    public function tipe_dokumen()
    {
            $crud = new grocery_CRUD();
     
            $crud->set_theme('bootstrap');
     
            $crud->set_subject('Tipe Dokumen'); 
            $crud->set_table('p_doc_type');
            $crud->columns('p_doc_type_id','name', 'desc');
            $crud->display_as('p_doc_type_id','#')
                ->display_as('name', 'Dokumen')
                ->display_as('desc', 'Deskripsi');
        
            $crud->unset_print();
            $crud->unset_jquery_ui();
            $crud->unset_export();
     
            $output = $crud->render();

            $this->_example_output($output);
    }

    public function paket()
    {
            $crud = new grocery_CRUD();
     
            $crud->set_theme('bootstrap');
     
            $crud->set_subject('Paket Layanan'); 
            $crud->set_table('p_nw_service');
            $crud->columns('p_nw_service_id', 'p_serv_type_id', 'p_service_id' ,'package', 'desc');
            $crud->display_as('p_nw_service_id','#')
                ->display_as('p_serv_type_id', 'Tipe Layanan')
                ->display_as('p_service_id', 'Nama Layanan')
                ->display_as('p_service_id', 'Paket')
                ->display_as('desc', 'Deskripsi');
            $crud->set_relation('p_serv_type_id','p_service_type','name');
            $crud->set_relation('p_service_id','p_service','service_name');
        
            $crud->unset_print();
            $crud->unset_jquery_ui();
            $crud->unset_export();
     
            $output = $crud->render();

            $this->_example_output($output);
    }

    public function region()
    {
            $crud = new grocery_CRUD();
     
            $crud->set_theme('bootstrap');
     
            $crud->set_subject('Region'); 
            $crud->set_table('p_region');
            $crud->columns('p_region_id', 'company_id', 'region_name' , 'desc');
            $crud->display_as('p_region_id','#')
                ->display_as('company_id', 'Perusahaan')
                ->display_as('region_name', 'Nama Region')
                ->display_as('desc', 'Deskripsi');
            $crud->set_relation('company_id','company','company_name');
        
            $crud->unset_print();
            $crud->unset_jquery_ui();
            $crud->unset_export();
     
            $output = $crud->render();

            $this->_example_output($output);
    }

    public function harga()
    {
            $crud = new grocery_CRUD();
     
            $crud->set_theme('bootstrap');
     
            $crud->set_subject('Harga Paket Layanan'); 
            $crud->set_table('p_price_nw_serv_provider');
            $crud->columns('provider_id', 'p_nw_service_id' ,'price_otc', 'price_mrc');
            $crud->display_as('provider_id','Nama Provider')
                ->display_as('p_nw_service_id', 'Paket')
                ->display_as('price_otc', 'Harga OTC')
                ->display_as('price_mrc', 'Harga MRC');
            $crud->set_relation('provider_id','provider','provider_name');
            $crud->set_relation('p_nw_service_id','p_nw_service','package');
        
            $crud->unset_print();
            $crud->unset_jquery_ui();
            $crud->unset_export();
     
            $output = $crud->render();

            $this->_example_output($output);
    }


}