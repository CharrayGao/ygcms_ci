<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->database();		
		
		$query = $this->db->get('goods');
		
		$this->load->library('pagination');
		
		$config['base_url'] = "http://localhost/portfolio/ci/index.php/welcome/";
		$config['total_rows'] = $query->num_rows();
		$config['per_page'] = 1;
		$config['uri_segment'] = 3;
		$config['use_page_numbers'] = TRUE;
		
		$config['first_tag_open'] = $config['last_tag_open'] = $config['next_tag_open'] = $config['prev_tag_open'] = $config['num_tag_open'] = '<li>';
		$config['first_tag_close'] = $config['last_tag_close'] = $config['next_tag_close'] = $config['prev_tag_close'] = $config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = " ";
		$config['cur_tag_close'] = " ";
		
		$this->pagination->initialize($config);
		
		$data['page_links'] = $this->pagination->create_links();
		
		
		$this->load->view('welcome_message', $data);
	}
	
	public function page($num = 0)
	{
		echo "<br>This is ". $num ."<br>";
		
	}
	
}
