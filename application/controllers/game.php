<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Game extends CI_Controller {
	public function index($page = 'dashboard')
	{
		$data['title'] = ucfirst($page);

		$this->load->view('templates/header', $data);
		$this->load->view('game/'.$page);
		$this->load->view('templates/footer');
	}
}

/* End of file game.php */
/* Location: ./application/controllers/game.php */