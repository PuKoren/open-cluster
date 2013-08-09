<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends CI_Controller {

	public function _remap($page = 'home')
	{
		if(!file_exists('application/views/pages/'.$page.'.php')){
			show_404();
		}

		$this->load->library('ion_auth');
		if ($this->ion_auth->logged_in())
		{
			$data['logged'] = true;
		}


		$data['title'] = ucfirst($page);
		$data['selected'] = lcfirst($page);

		$this->load->view('templates/header', $data);
		$this->load->view('pages/'.$page);
		$this->load->view('templates/footer');
	}
}

/* End of file pages.php */
/* Location: ./application/controllers/pages.php */