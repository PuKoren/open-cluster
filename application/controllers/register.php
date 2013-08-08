<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->data['selected'] = "";
	}

	public function index($page = 'register')
	{
		$this->data['title'] = ucfirst($page);

		$this->load->view('templates/header', $this->data);
		$this->load->view('user/'.$page);
		$this->load->view('templates/footer');
	}
}