<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Services_api extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_api');
		$this->load->helper('url','form');
	}

	
	
	public function Add_subcategory() 
	{
		
		$this->load->model('Model_api');
		$data['response']=$this->Model_api->subcategory($_POST);//function returns the response 
		print_r($data['response']);
		
	}
	public function Insert_category()
	{
		
		
		
			$this->load->model('Model_api');
			$this->Model_api->insert_category($_POST);
			
		
		
	}


	    public function View_category()
	      {
		
		   
			$this->load->model('Model_api');
			$data['response']=$this->Model_api->view_category();
			
		
	
	
}
public function updatesub()
	{
		$this->load->model('Model_api');
		$this->Model_api->editbtnsub($_POST);

	}

public function Deletesubcategory()
	{
		$this->Model_api-> m_delsubcategory();
	}




}

