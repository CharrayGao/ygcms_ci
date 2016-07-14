<?php
if (!defined('BASEPATH')) exit ('No direct script access allowed');

/**
 * 
 * Show company information.
 * 
 * @category	application/controller
 * @author		Chunlei Gao
 * 
 * */

class Company extends CI_Controller {
	
	/**
	 * Store data which will be transfered to view.
	 *
	 **/
	private $data_config = array();
	
	/**
	 * Company class constructor
	 * Load system/helper system/library
	 * Load application/library
	 * Store data for views.
	 *
	 * */
	public function __construct()
	{
		parent::__construct();
		
		// Load database, helpers.
		$this->load->database();
		$this->load->helper('string');
		$this->load->helper('url_helper');
		
		require_once 'Public.php';
		
		// Store 'config', 'cate', 'company' table.
		$this->data_config['config'] = $config;
		$this->data_config['cate'] = $cate;
		$this->data_config['company'] = $company;
	}
	
	/**
	 * Show the company information.
	 * 
	 * */
	public function index()
	{
		// Transfer the data to the view.
		$this->load->view("company/index", $this->data_config);
	}
	
	
	
}