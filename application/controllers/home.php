<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()	{
		parent::__construct();
		$this->load->model('product');
		$this->load->model('user');
		$this->load->library('session');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->helper('url');
	}

	public function index(){
		if($this->session->userdata('logged_in')){
   		$session_data = $this->session->userdata('logged_in');
      $data['email'] = $session_data['email'];
   	}
   	$data['product'] = $this->product->get_product();
   	$data['title'] = 'Nekobiz';
   	$this->load->view('templates/header', $data);
		$this->load->view('home/index', $data);
		$this->load->view('templates/footer');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */