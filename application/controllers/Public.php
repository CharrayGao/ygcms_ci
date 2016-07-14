<?php

/**
 * load the public tables: config, cate.
 * 
 * */

require_once 'init.inc.php';

// Get common datasets from 'config', 'cate', 'company'.
// and 'link', 'qq'.
$config = $cate = $company = $link = $qq ='';

if(!isset($this->db))
{
	$this->load->database();
}

$c = $this->db->get('config');
if(!empty($c))
{
	$config = strip_slashes($c->result_array());
} 

$c = $this->db->order_by('px', 'asc')->get('cate');
if(!empty($c))
{
	$cate = strip_slashes($c->result_array());
}

$c = $this->db->get('company');
if(!empty($c))
{
	$company = strip_slashes($c->result_array());
}

$c = $this->db->where('l_status', 1)->get('link');
if(!empty($c))
{
	$link = strip_slashes($c->result_array());
}

$c = $this->db->get('qq');
if(!empty($c))
{
	$qq = strip_slashes($c->result_array());
}
	
/**
 * Data for class manipulation
 * 
 * @var array
 * 
 * */
$data = array();

$data += ['config'=>$config];
$data += ['cate'=>$cate];
$data += ['link'=>$link];
$data += ['company'=>$company];
$data += ['qq'=>$qq];

