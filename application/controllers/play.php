<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Play extends CI_Controller {

	private $data = Array('selected' => 'game');

	public function __construct()
	{
	    parent::__construct();
	}

	public function index($page = 'dashboard')
	{
		$this->data['title'] = ucfirst($page);
		$this->load->view('templates/header', $this->data);
		$this->load->view('game/'.$page);
		$this->load->view('templates/footer');
	}
}

/* End of file play.php */
/* Location: ./application/controllers/play.php */