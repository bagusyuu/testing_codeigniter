<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Products extends CI_Controller {

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
		$this->load->model('category');
		$this->load->library('session');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->helper('url');
	}

	public function index(){
		$data['product'] = $this->product->get_product();
		$data['title'] = 'Nekobiz';

		$this->load->view('templates/header', $data);
		$this->load->view('products/index', $data);
		$this->load->view('templates/footer');
	}

	public function view($id){
		$session_data = $this->session->userdata('logged_in');
		$data['product_item'] = $this->product->get_product($id);
		if (empty($data['product_item'])){
			show_404();
		}

		$data['title'] = $data['product_item']['title'];
		$data['user_id'] = $session_data['id'];

		$this->load->view('templates/header', $data);
		$this->load->view('products/show', $data);
		$this->load->view('templates/footer');
	}

	public function create(){
		$session_data = $this->session->userdata('logged_in');
		$data['category'] = $this->category->get_category();
		$data['user_id'] = $session_data['id'];

		$data['title'] = 'Create Product';

		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('category_id', 'Category', 'required');
		$this->form_validation->set_rules('user_id', 'User', 'required');
		// $this->form_validation->set_rules('text', 'text', 'required');

		if ($this->form_validation->run() === FALSE){
			$this->load->view('templates/header', $data);
			$this->load->view('products/create');
			$this->load->view('templates/footer');

		} else {
			// $this->input->post('user_id') = $session_data['id'];
			$this->product->set_product();
			redirect('/home', $data);
		}
	}

	public function update($id){
		$session_data = $this->session->userdata('logged_in');
		$data['category'] = $this->category->get_category();
		$data['user_id'] = $session_data['id'];
		$data['product_item'] = $this->product->get_product($id);

		$data['title'] = 'Update Product';

		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('category_id', 'Category', 'required');
		$this->form_validation->set_rules('user_id', 'User', 'required');
		// $this->form_validation->set_rules('text', 'text', 'required');

		if ($this->form_validation->run() === FALSE){
			$this->load->view('templates/header', $data);
			$this->load->view('products/update');
			$this->load->view('templates/footer');

		} else {
			$data = array(
				'title' => $this->input->post('title'),
				'content' => $this->input->post('content'),
				'category_id' => $this->input->post('category_id'),
				'user_id' => $this->input->post('user_id'),
				'price' => $this->input->post('price'),
				'latitude' => $this->input->post('latitude'),
				'longitude' => $this->input->post('longitude'),
				'type' => $this->input->post('type'),
				'locationLabel' => $this->input->post('locationLabel'),
				'pictureUrl' => $this->input->post('pictureUrl'),
				'bidEndAt' => $this->input->post('bidEndAt'),
				'stocks' => $this->input->post('stocks'),
				'weight' => $this->input->post('weight')
			);
			$whereId = $this->input->post('did');
			$result = $this->product->update_product($whereId, $data);
			if($result){
				echo "ok";
				redirect('/home', $data);
			} else { 
				echo $id;
				echo 'failed';
				redirect('/products/'.$whereId.'/update', $data);
			}
		}
	}

	public function delete($id){
		$session_data = $this->session->userdata('logged_in');
		$result = $this->product->delete_product($id);
		if($result == TRUE){
			redirect('/home', $data);
		} else {
			redirect('/products/'.$id, $data);
		}
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */