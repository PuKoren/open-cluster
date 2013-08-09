<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->data['selected'] = "";
	}


	private function setFormValidationRules($page){
		$this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');

		$this->load->view('templates/header', $this->data);

		if($page == 'register')
			$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]|max_length[25]|xss_clean');

		if($page != 'recover')
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[25]');

		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
	}

	public function action($page = 'register')
	{
		$this->data['title'] = ucfirst($page);

		$this->setFormValidationRules($page);

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