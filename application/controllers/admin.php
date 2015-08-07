<?php

class Admin extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		session_start();
        parent::__construct();

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

    public function offices()
    {
        $output = $this->grocery_crud->render();

        $this->_example_output($output);
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
            $crud->unset_export();
     
            $output = $crud->render();

            $this->_example_output($output);
    }

    function forms()
    {
    	$this->load->view('admin/forms');
    }

}