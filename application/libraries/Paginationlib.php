<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Initialize the pagination rules for goods page
 * 
 * 
 * @return 	Pagination
 * @author	Chunlei Gao
 * 
 * 
 * */

class Paginationlib {
	
	public function __construct()
	{
		$this->ci = & get_instance();
	}
	
	public function initPagination($base_url, $total_rows, $per_page)
	{
		$config['per_page'] = $per_page;
		$config['uri_segment'] = 3;
		$config['base_url'] = base_url().$base_url;
		$config['total_rows'] = $total_rows;
		$config['use_page_numbers'] = TRUE;
		
		$config['cur_tag_open'] = '<li><a class="current">';
		$config['cur_tag_close'] = '</a></li>';
		
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Previous';
		
		$config['full_tag_open'] = '<ul class="tsc_pagination">';
		$config['full_tag_close'] = '</ul>';
		
		$config['first_tag_open'] = $config['last_tag_open']= $config['next_tag_open']= $config['prev_tag_open'] = $config['num_tag_open'] ='<li>';
		$config['first_tag_close'] = $config['last_tag_close']= $config['next_tag_close']= $config['prev_tag_close'] = $config['num_tag_close'] = '</li>';
		
		$this->ci->pagination->initialize($config);
		return $config;
	}
}
