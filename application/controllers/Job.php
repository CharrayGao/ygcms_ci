<?php

if (!defined('BASEPATH')) exit("No direct script access allowed");

/**
 * Show Job class
 * 
 * @category	application/controller
 * @author		Chunlei Gao 
 * 
 * */

class Job extends CI_Controller {
	
	/**
	 * Store config of pagination object.
	 * 
	 * @var object
	 * */
	private $paginConfig;
	
	/**
	 * Store data which will be transfered to view
	 * 
	 * @var	array.
	 * 
	 * */
	private $data_config = array();
	
	/**
	 * Job class constructor
	 * Load system/helper system/library
	 * Load application/library
	 * Load application/model/job_model
	 * Store data for views.
	 * 
	 * */
	public function __construct()
	{
		parent::__construct();
		
		// Load database, helpers, library.
		$this->load->database();
		$this->load->helper('string');
		$this->load->helper('url_helper');
		$this->load->library('Pagination');
		
		require_once 'Public.php';
		
		// Store 'config', 'cate', 'company' table.
		$this->data_config['config'] = $config;
		$this->data_config['cate'] = $cate;
		$this->data_config['company'] = $company;
		
		// Load application/library
		$this->load->library('paginationlib');
		
		// Load current model.
		$this->load->model('job_model');
		
		// Initialize the pagination object.
		$this->paginConfig = $this->paginationlib->initPagination("index.php/job/index", $this->job_model->record_count(), 2);
	}
	
	/**
	 * Use system/library/Pagination to show the jobs.
	 * 
	 * */
	public function index()
	{
		// Calculate the current page via uri.
		if($this->uri->segment(3))
		{
			$page = ($this->uri->segment(3));
		} else {
			$page = 1;
		}
		
		// Fetch data for current page.
		$jobs = $this->job_model->fetch_data($this->paginConfig['per_page'], $page);
		
		// Prepare data for the view.
		$this->data_config['job'] = $jobs;
		
		// Prepare the pagination for the view.
		$this->data_config['page'] = $this->pagination->create_links();
		
		// Transfer the data to the view.
		$this->load->view("job/index", $this->data_config);
		
	}
}
