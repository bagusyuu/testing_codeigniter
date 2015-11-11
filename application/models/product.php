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

	public function set_product($data){
		$this->load->helper('url');
		$datas = array(
			'title' => $data['title'],
			'content' => $data['content'],
			'category_id' => $data['category_id'],
			'price' => $data['price'],
			'pictureUrls' => $data['pictureUrl'],
			'stocks' => $data['stocks'],
			'weight' => $data['weight'],
			'user_id' => $data['user_id']
		);
		return $this->db->insert('products', $datas);
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
