<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 
 * define the model of Goods for pagination.
 * 
 * @author	Chunlei Gao
 * 
 * */
class Goods_Model extends CI_Model {
	
	private $table_name = 'goods';
	private $rows_query_array = '';
	private $count_rows = 0;
	
	public function __construct()
	{
		parent::__construct();
		
		if(empty($this->db))
		{
			$this->load->database();			
		}

		$rows_query = $this->db->order_by('goods_addtime', 'desc')
									->get($this->table_name);
		
		$this->rows_query_array = $rows_query->result_array();
		$this->count_rows = count($this->rows_query_array);
	}
	
	// Count all records of table "goods".
	public function record_count()
	{		
		if(isset($this->rows_query_array))
		{
			return count($this->rows_query_array);
		} else {
			return NULL;
		}
	}
	
	/**
	 * Fetch data from the query set according to per_page limit.
	 * 
	 * @param	$per_page_limit		the number of per page.
	 * @param	$cur_page_id		the number of current page.
	 * 
	 * */
	public function fetch_data($per_page_limit, $cur_page_id)
	{
		$data = array();
		$num = $per_page_limit*(($cur_page_id-1)>=0 ? ($cur_page_id-1):0);
		
		if(!empty($this->rows_query_array))
		{
			for($i=0;$i<$per_page_limit; $i++)
			{
				if(($num +$i) >= $this->count_rows)
				{
					return $data;
				}

				$data[$i] = $this->rows_query_array[$num+$i];
			}
		}
		
		return $data;
	}
	
	/**
	 * reload the data from the table.
	 * otherwise the query result will not change after first construct.
	 * 
	 * */
	public  function reload_query()
	{
		$rows_query = $this->db->get($table_name);
		$this->rows_query_array = $rows_query->result();
		$this->count_rows = count($this->rows_query_array);
	}
	
}

