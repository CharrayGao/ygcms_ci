<?php
if (!defined('BASEPATH')) exit("No direct script access allowed");

/**
 * 
 * Show News list
 * 
 * @category	application/controller
 * @author 		gaochunlei
 **/

class News extends CI_Controller {
	
	/**
	 * Store config of pagination object.
	 * 
	 * @var object
	 * */
	private $paginConfig;
	
	/**
	 * Store data which will be transfered to view.
	 *
	 **/
	private $data_config = array();
	
	/**
	 * News class constructor 
	 * Load system/helper system/library
	 * Load application/library
	 * Load application/model/news_model
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
		$this->load->helper('date');
		$this->load->library('Pagination');		
		
		require_once 'Public.php';
		
		// Store 'config', 'cate', 'company' tables data.
		$this->data_config ['config'] = $config;
		$this->data_config ['cate'] = $cate;
		$this->data_config ['company'] = $company;
		
		// Load application/library
		$this->load->library('paginationlib');
		
		// Load current model.
		$this->load->model('news_model');
		
		// Initialize the pagination object.
		$this->paginConfig = $this->paginationlib->initPagination("index.php/news/index", $this->news_model->record_count(), 2);
	}
	
	/**
	 * Use system/library/Pagination to show the news.
	 * 
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
		$news = $this->news_model->fetch_data($this->paginConfig['per_page'], $page);
		
		// Prepare data for the view.
		$this->data_config ['news'] = $news;
		
		// Prepare the pagination for the view.
		$this->data_config['page'] = $this->pagination->create_links();
		
		// Transfer the data to the view.
		$this->load->view("news/index", $this->data_config);
	}
	
	/**
	 * Show the details of the news.
	 * 
	 * @param	$index 	
	 * */
	public function showNews($index=0)
	{
		$g = $this->db->where('id', $index)
					  ->get('News');
		
		$this->data_config['news'] = $g->result_array();
		
		$this->load->view('news/showNews', $this->data_config);
	}
}
