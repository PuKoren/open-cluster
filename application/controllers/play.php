<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Play extends CI_Controller {
	public function __construct()
       {
            parent::__construct();
            // Your own constructor code
       }
	public function index($page = 'dashboard')
	{
		$data['title'] = ucfirst($page);
		$data['selected'] = 'game';
		$this->load->view('templates/header', $data);
		$this->load->view('game/'.$page);
		$this->load->view('templates/footer');
	}
}

/* End of file play.php */
/* Location: ./application/controllers/play.php */