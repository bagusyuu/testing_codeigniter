<?php
class User extends CI_Model {

	public function __construct(){
		$this->load->database();
	}

	public function get_user($id = FALSE){
		if($id == FALSE){
			$query = $this->db->get('users');
			return $query->result_array();
		}

		$query = $this->db->get_where('users', array('id' => $id));
		return $query->row_array();
	}

	public function set_user(){
		$this->load->helper('url');

		$data = array(
			'email' => $this->input->post('email'),
			'firstName' => $this->input->post('firstName'),
			'lastName' => $this->input->post('lastName'),
			'password' => $this->input->post('password')
		);
		$result = $this->db->insert('users', $data);

		return $result;
	}

	public function login($data){
		$condition = "email =" . "'" . $data['email'] . "' AND " . "password =" . "'" . $data['password'] . "'";
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where($condition);
		$this->db->limit(1);

		$query = $this->db->get();

		if($query -> num_rows() == 1){
	    return $query->result();
	  } else {
	    return false;
	  }
	}
}