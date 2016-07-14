<?php
defined('BASEPATH') OR exit("No direct script access allowed");

/**
 * Index Class
 * Show the home page of the website.
 * Load the tables: config, cate, goods,news
 * provid the data to views/index.php
 * @category	applcation/controller
 * @author		Chunlei Gao
 * 
 * */
class Index extends CI_Controller {
	
	/**
	 * constructor, initialize the database, some helper class.
	 * 
	 * */
	public function __construct()
	{
		parent::__construct();
		
		$this->load->database();
		$this->load->helper('string');
		$this->load->helper('url_helper');
	}
	
	
	/**
	 * Load the tables: config, cate, goods,news
	 * store data into $data, 
	 * bind the views/index.php,
	 * show the page.
	 * @param	none
	 * @return	none
	 * 
	 * */
	public function Index()
	{
		header('Content-Type:text/html;charset=utf-8');
		require('Public.php');
		
		$dz_goods = $new_goods = $zs = '';
		
		$c = $this->db->where('goods_dz>',0)
						->order_by('goods_addtime', 'desc')
						->limit(0,6)
						->get('goods');
		if(!empty($c))
		{
			$dz_goods = strip_slashes($c->result_array());
		}
		
		$c = $this->db->order_by('goods_addtime', 'desc')
						->limit(0,6)
						->get('goods');
		if(!empty($c))
		{
			$new_goods = strip_slashes($c->result_array());
		}
		
		$c = $this->db->where('news_class', 'Knowledge')
										->order_by('add_time', 'desc')
				                        ->having('sh', 1)
										->limit(10)
				                        ->get('News');
		if(!empty($c))
		{
			$zs = strip_slashes($c->result_array());
		}
		
		foreach($new_goods as $key=>$val)
		{
			$arr = explode('-', $val['goods_pics']);
			$c = count($arr) - 2;
			$new_goods[$key]['goods_pics']=$arr[rand(0,$c)];
		}
		
		foreach($dz_goods as $key=>$val)
		{
			$arr = explode('-', $val['goods_pics']);
			$c = count($arr)-2;
			$dz_goods[$key]['goods_pics'] = $arr[rand(0, $c)];
		}
		
		$data += ['dzgoods'=>$dz_goods];
		$data += ['newgoods' => $new_goods];
		$data += ['zs' => $zs];
		
		if(! file_exists(APPPATH . 'views/Index/index'.'.php'))
		{
			show_404();
		}
		
		$this->load->view('Index/index', $data);
	}
}