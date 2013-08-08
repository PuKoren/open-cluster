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

		$this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');

		$this->load->view('templates/header', $this->data);

		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]|max_length[25]|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[25]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('user/'.$page);
		}
		else
		{
			$this->load->view('user/'.$page.'success');
		}
		$this->load->view('templates/footer');
	}
}