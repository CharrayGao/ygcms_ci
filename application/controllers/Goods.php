<?php
if (!defined('BASEPATH')) exit("No direct script access allowed");

/**
 * 
 * Show goods
 * 
 * @category	application/controller
 * @author 		gaochunlei
 **/

class Goods extends CI_Controller {
	
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
	 * Goods class constructor 
	 * Load system/helper system/library
	 * Load application/library
	 * Load application/model/goods_model
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
		$this->data_config += ['config'=>$config];
		$this->data_config += ['cate'=>$cate];
		$this->data_config += ['company'=>$company];
		
		// Load application/library
		$this->load->library('paginationlib');
		
		// Load current model.
		$this->load->model('goods_model');
		
		// Initialize the pagination object.
		$this->paginConfig = $this->paginationlib->initPagination("index.php/goods/index", $this->goods_model->record_count(), 6);
	}
	
	/**
	 * Use system/library/Pagination to show the goods.
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
		$goods = $this->goods_model->fetch_data($this->paginConfig['per_page'], $page);
		
		// Change some data for demo
		foreach ($goods as $key=>$val)
		{
			$arr = explode('-', $val['goods_pics']);
			$c = count($arr) - 2;
			$goods[$key]['goods_pics'] = $arr[rand(0, $c)];
		}
		
		// Prepare data for the view.
		$this->data_config ['goods'] = $goods;
		
		// Prepare the pagination for the view.
		$str_links = $this->pagination->create_links();
		$this->data_config['page'] = $str_links;
		
		// Transfer the data to the view.
		$this->load->view("goods/index", $this->data_config);
	}
	
	/**
	 * Show the details of the goods.
	 * 
	 * @param	$index 	
	 * */
	public function showGoods($index=0)
	{
		$g = $this->db->where('id', $index)
					  ->get('goods');
		
		$this->data_config['goods'] = $g->result_array();
		
		$this->load->view('goods/showGoods', $this->data_config);
	}
}