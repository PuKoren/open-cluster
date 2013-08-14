<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Training extends CI_Controller {

	private $data = Array('selected' => 'game', 'title' => 'training');

	public function __construct()
	{
	    parent::__construct();
	    $this->load->library('ion_auth');
	    if (!$this->ion_auth->logged_in()){
			redirect('user/login', 'refresh');
		}else{
			$this->data['logged'] = true;
		}
	}

	public function index($action = 'home')
	{
		$this->data['title'] = ucfirst($this->data['title']);
		$this->data['igSelected'] = lcfirst($this->data['title']);

		$this->load->view('templates/header', $this->data);
		$this->load->view('ui/menu', $this->data);
		$this->load->view('game/'.$this->data['title']);
		$this->load->view('templates/footer');
	}
}

/* End of file dashboard.php */
/* Location: ./application/controllers/game/dashboard.php */