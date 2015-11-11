<?php
class Product extends CI_Model {

	public function __construct(){
		$this->load->database();
	}

	public function get_product($id = FALSE){
		if($id == FALSE){
			$query = $this->db->get('products');
			return $query->result_array();
		}

		$query = $this->db->get_where('products', array('id' => $id));
		return $query->row_array();
	}

	public function set_product(){
		$this->load->helper('url');

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

		return $this->db->insert('products', $data);
	}

	public function update_product($id, $data){
		$this->db->where('id',$id);	
		return $this->db->update('products', $data);
	}

	public function delete_product($id){
		$this->db->where("id", $id);
		return $this->db->delete("products");
	}
}