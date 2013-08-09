<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->data['selected'] = "";

		$this->load->library('ion_auth');
		$this->load->library('form_validation');
		$this->load->helper(array('form', 'url'));
		$this->load->database();

		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
	}


	private function setFormValidationRules($page){
		if($page == 'register')
			$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]|max_length[25]|xss_clean');

		if($page != 'recover')
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[25]');

		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
	}

	public function action($page = 'register')
	{
		$this->data['title'] = ucfirst($page);

		$this->setFormValidationRules($page);

		$this->load->view('templates/header', $this->data);
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('user/'.$page);
		}
		else
		{
			//do the user login/logout/registration/recover here
			$this->load->view('user/'.$page.'success');
		}
		$this->load->view('templates/footer');
	}
}