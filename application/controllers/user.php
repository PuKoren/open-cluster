<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->data['selected'] = "";

		$this->load->library('ion_auth');
		if ($this->ion_auth->logged_in())
		{
			$data['logged'] = true;
		}

		$this->load->library('form_validation');
		$this->load->helper(array('form', 'url'));
		$this->load->database();

		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		$this->ion_auth->set_error_delimiters('<div class="error">', '</div>');
	}

	private function setFormValidationRules($page){
		if($page == 'register')
			$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]|max_length[25]|xss_clean');

		if($page != 'recover')
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[25]');

		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
	}

	private function setFormErrorMessages(){
		$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
	}

	public function logout(){
		$this->ion_auth->logout();
		redirect('', 'refresh');
	}

	public function register(){
		$this->data['title'] = "Commander registration";
		$this->load->view('templates/header', $this->data);

		if ($this->ion_auth->logged_in())
		{
			redirect('play', 'refresh');
		}
		
		$this->setFormValidationRules('register');

		if ($this->form_validation->run() == FALSE)
		{
			$this->setFormErrorMessages();
			$this->load->view('user/register', $this->data);
		}
		else
		{
			if($this->ion_auth->register($this->input->post('username'), $this->input->post('password'), $this->input->post('email'), array())){
				if($this->ion_auth->login($this->input->post('email'), $this->input->post('password'), false)){
					$this->load->view('user/registersuccess');
				}else{
					show_error("Unable to login user but user was created. Please proceed to login: <a href='".site_url('user/login')."'>LOGIN</a>");
				}
			}else{
				$this->setFormErrorMessages();
				$this->load->view('user/register', $this->data);
			}
		}

		$this->load->view('templates/footer');
	}

	public function login(){
		$this->data['title'] = "Commander login";
		$this->load->view('templates/header', $this->data);

		if ($this->ion_auth->logged_in())
		{
			redirect('play', 'refresh');
		}

		$this->setFormValidationRules('login');

		if ($this->form_validation->run() == FALSE)
		{
			$this->setFormErrorMessages();
			$this->load->view('user/login', $this->data);
		}
		else
		{
			if($this->ion_auth->login($this->input->post('email'), $this->input->post('password'), $this->input->post('remember'))){
				redirect('play', 'refresh');
			}else{
				$this->setFormErrorMessages();
				$this->load->view('user/login', $this->data);
			}
		}

		$this->load->view('templates/footer');
	}


	public function recover(){
		$this->data['title'] = "Password recovery";
		$this->load->view('templates/header', $this->data);

		if ($this->ion_auth->logged_in())
		{
			redirect('play', 'refresh');
		}

		$this->setFormValidationRules('recover');

		if ($this->form_validation->run() == FALSE)
		{
			$this->setFormErrorMessages();
			$this->load->view('user/recover', $this->data);
		}
		else
		{
			$this->load->view('user/recoversuccess');
		}

		$this->load->view('templates/footer');
	}

}