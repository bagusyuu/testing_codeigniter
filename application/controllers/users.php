<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {	
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
		// $data['product'] = $this->product->get_product();
		// $data['title'] = 'Nekobiz';

		// $this->load->view('templates/header', $data);
		// $this->load->view('products/index', $data);
		// $this->load->view('templates/footer');
	}

	public function view($id){
		// $data['product_item'] = $this->product->get_product($id);
		// if (empty($data['product_item'])){
		// 	show_404();
		// }

		// $data['title'] = $data['product_item']['title'];

		// $this->load->view('templates/header', $data);
		// $this->load->view('products/show', $data);
		// $this->load->view('templates/footer');
	}

	public function create(){
		$data['title'] = 'Sign Up';

		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		// $this->form_validation->set_rules('text', 'text', 'required');

		if ($this->form_validation->run() === FALSE){
			$this->load->view('templates/header', $data);
			$this->load->view('users/create');
			$this->load->view('templates/footer');
		} else {
			$result = $this->user->set_user();
			if ($result == TRUE) {
				$data['message_display'] = 'Registration Successfully !';
				redirect('/login', $data);
				// $this->load->view('templates/header', $data);
				// $this->load->view('users/login', $data);
				// $this->load->view('templates/footer');
			} else {
				$data['message_display'] = 'Email already exist!';
				$this->load->view('templates/header', $data);
				$this->load->view('users/create', $data);
				$this->load->view('templates/footer');
			}
		}
	}

	public function auth(){
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->helper('url');

		$data['title'] = 'Login';

		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		// $this->form_validation->set_rules('text', 'text', 'required');

		if ($this->form_validation->run() === FALSE){
			if(isset($this->session->userdata['logged_in'])){
				redirect('/home', $data);
			}
			$this->load->view('templates/header', $data);
			$this->load->view('users/login');
			$this->load->view('templates/footer');
		} else {
			$data = array(
				'email' => $this->input->post('email'),
				'password' => $this->input->post('password')
			);
			$result = $this->user->login($data);
			if($result == TRUE){
				$session_data = array();
				foreach ($result as $row) {
					$session_data = array(
	        	'id' => $row->id,
	        	'email' => $row->email
	        );
	        $this->session->set_userdata('logged_in', $session_data);
				}
				echo $session_data['id'];
				// $this->load->view('users/login');
				redirect('/home', $data);

			} else {
				$data = array(
					'error_message' => 'Invalid Username or Password'
				);
				$this->load->view('users/login', $data);
			}
		}
	}

	public function logout(){
		// Removing session data
		$sess_array = array(
			'username' => ''
		);
		$this->session->unset_userdata('logged_in', $sess_array);
		$data['message_display'] = 'Successfully Logout';
		redirect('/home', $data);
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */