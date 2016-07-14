<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Get customer's feedback.
 * Use system/library/Form_Validation to check form input.
 * If all ok, the feedback will be stored into 'msgs'.
 * 
 * @category	application/controller
 * @author		Chunlei Gao
 * 
 * */
class Msg extends CI_Controller {
	
	/**
	 * Define form fields config.
	 * rules, error hints.
	 * 
	 * @var  array.
	 * 
	 * */
	public $form_config = array(
			array(
					'field' => 'm_name',
					'label' => 'Name',
					'rules' => 'trim|htmlspecialchars|required|min_length[3]|max_length[5]',
					'errors' => array (
							'required' => 'Required!',
							'min_length' => 'At least 3 chars',
							'max_length' => 'Max is 5 chars',							
							),
			),
			array(
					'field' => 'm_tel',
					'label' => 'Telephone',
					'rules' => 'trim|htmlspecialchars|required|integer|max_length[10]',
					'errors' => array(
							'required' => 'Required!',
							'integer' => "Please input 0-9",
							'max_length' => 'Max is 10 digitals',
					),
			),
			array(
					'field' => 'm_email',
					'label' => 'Email',
					'rules' => 'trim|htmlspecialchars|required|valid_email',
					'errors' => array(
							'required' => 'Required!',
							'valid_email' => 'Please input valid email address.'
					),
			),
			array(
					'field' => 'm_tit',
					'label' => 'Title',
					'rules' => 'trim|htmlspecialchars|required|max_length[40]',
					'errors' => array(
							'required' => 'Required!',
							'max_length' => 'Max length is 40 chars.'
					),
			),
			array(
					'field' => 'm_con',
					'label' => 'Content',
					'rules' => 'trim|required',
					'errors' => array(
							'required' => 'Please say something, Thanks.',
					),
			),
	);
	
	/**
	 * Store data which will be transfered to view.
	 *
	 **/
	private $data_config = array();	
	
	/**
	 * Msg class contructor.
	 * 
	 * */
	public function __construct()
	{
		parent::__construct();
		
		$this->load->database();
		$this->load->helper(array('form', 'url','string'));
		
		$this->load->library('form_validation');
		
		require_once 'Public.php';
		
		// Store 'config', 'cate', 'company' tables data.
		$this->data_config ['config'] = $config;
		$this->data_config ['cate'] = $cate;
		$this->data_config ['company'] = $company;		
	}
	
	public function index()
	{
		$this->form_validation->set_rules($this->form_config);
		
		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('msg/index', $this->data_config);
		}
		else 
		{
			$data = $this->input->post(array('m_name', 'm_tel', 'm_email','m_tit',  'm_con'));
			$data['m_ip'] = $this->input->ip_address;
			$data['m_time'] = time();
			$data['m_status'] = 0;
			
			$this->db->insert('msgs', $data);
			
			$this->load->view('msg/success', $this->data_config);
		}
	}
	
}




