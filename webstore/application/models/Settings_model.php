<?php
class Settings_model extends CI_Model {
	
	//Get Single Product
	public function get_product($id) {
		$this->db->where('id', $id);
		$query = $this->db->get('products');
		return $query->row();
	}
	
	//Insert Product
	public function insert_product($data) {
		$this->db->insert('products', $data);
		return true;
	}
	
	//Update Product
	public function update_product($data, $id) {
		$this->db->where('id', $id);
		$this->db->update('products', $data);
		return true;
	}
	
	// Publish Product
	public function publish_product($id){
		$data = array(
               		'is_published' => 1
            	);

		$this->db->where('id', $id);
		$this->db->update('products', $data); 
	}
	
	// Unpublish Product
	public function unpublish_product($id){
		$data = array(
               		'is_published' => 0
            	);

		$this->db->where('id', $id);
		$this->db->update('products', $data); 
	}
	
	// Delete Product
	public function delete_product($id){
		$this->db->where('id', $id);
		$this->db->delete('products', $data);
		return true;
	}
	
	//Get Categories
	public function get_categories($order_by = null, $sort = 'DESC', $limit = null, $offset = 0){
		$this->db->select('*');
		$this->db->from('categories');	
		if($limit != null){
			$this->db->limit($limit, $offset);
		}
		if($order_by != null){
			$this->db->order_by($order_by, $sort);
		}
		$query = $this->db->get();
		return $query->result();
	}
	
	//Get Single Category
	public function get_category($id){
		$this->db->where('id',$id);
		$query = $this->db->get('categories');
		return $query->row();
	}
	
	//Insert Category
	public function insert_category($data) {
		$this->db->insert('categories', $data);
		return true;
	}
	
	//Update Category
	public function update_category($data, $id){
		$this->db->where('id', $id);
		$this->db->update('categories', $data);
		return true;
	}
	
	//Delete Category
	public function delete_category($id){
		$this->db->where('id', $id);
		$this->db->delete('categories', $data);
		return true;
	}
	
	// Get Admins
	public function get_admins($order_by = null, $sort = 'DESC', $limit = null, $offset = 0){
		$this->db->select('*');
		$this->db->from('admins');	
		if($limit != null){
			$this->db->limit($limit, $offset);
		}
		if($order_by != null){
			$this->db->order_by($order_by, $sort);
		}
		$query = $this->db->get();
		return $query->result();
	}
	
	//Get Single Admin
	public function get_admin($id){
		$this->db->where('id', $id);
		$query = $this->db->get('admins');
		return $query->row();
	}
	
	//Insert
	public function insert_admin($data) {
		$this->db->insert('admins', $data);
		return true;
	}
	
		//Update
	public function update_admin($data, $id){
		$this->db->where('id', $id);
		$this->db->update('admins', $data);
		return true;
	}
	
	//Delete
	public function delete_admin($id){
		$this->db->where('id', $id);
		$this->db->delete('admins', $data);
		return true;
	}
	
	// Get Home
	public function get_home($order_by = null, $sort = 'DESC', $limit = null, $offset = 0){
		$this->db->select('*');
		$this->db->from('home_settings');	
		if($limit != null){
			$this->db->limit($limit, $offset);
		}
		if($order_by != null){
			$this->db->order_by($order_by, $sort);
		}
		$query = $this->db->get();
		return $query->result();
	}
	
	//Get Single Home
	public function get_single_home($id){
		$this->db->where('id',$id);
		$query = $this->db->get('home_settings');
		return $query->row();
	}
	
	//Insert Home
	public function insert_home($data) {
		$this->db->insert('home_settings', $data);
		return true;
	}
	
	//Update Home
	public function update_home($data, $id) {
		$this->db->where('id', $id);
		$this->db->update('home_settings', $data);
		return true;
	}
	
	// Publish Home
	public function publish_home($id){
		$data = array(
               		'is_published' => 1
            	);

		$this->db->where('id', $id);
		$this->db->update('home_settings', $data); 
	}
	
	// Unpublish Home
	public function unpublish_home($id){
		$data = array(
               		'is_published' => 0
            	);

		$this->db->where('id', $id);
		$this->db->update('home_settings', $data); 
	}
	
	// Delete Home
	public function delete_home($id){
		$this->db->where('id', $id);
		$this->db->delete('home_settings', $data);
		return true;
	}
	
	//Get About
	public function get_about($order_by = null, $sort = 'DESC', $limit = null, $offset = 0){
		$this->db->select('*');
		$this->db->from('about_settings');	
		if($limit != null){
			$this->db->limit($limit, $offset);
		}
		if($order_by != null){
			$this->db->order_by($order_by, $sort);
		}
		$query = $this->db->get();
		return $query->result();
	}
	
	//Get Single About
	public function get_single_about($id){
		$this->db->where('id',$id);
		$query = $this->db->get('about_settings');
		return $query->row();
	}
	
	//Insert About
	public function insert_about($data) {
		$this->db->insert('about_settings', $data);
		return true;
	}
	
	//Update About
	public function update_about($data, $id) {
		$this->db->where('id', $id);
		$this->db->update('about_settings', $data);
		return true;
	}
	
	// Publish About
	public function publish_about($id){
		$data = array(
               		'is_published' => 1
            	);

		$this->db->where('id', $id);
		$this->db->update('about_settings', $data); 
	}
	
	// Unpublish About
	public function unpublish_about($id){
		$data = array(
               		'is_published' => 0
            	);

		$this->db->where('id', $id);
		$this->db->update('about_settings', $data); 
	}
	
	// Delete About
	public function delete_about($id){
		$this->db->where('id', $id);
		$this->db->delete('about_settings', $data);
		return true;
	}
	
	//Get Contact
	public function get_contact_data($order_by = null, $sort = 'DESC', $limit = null, $offset = 0){
		$this->db->select('*');
		$this->db->from('contact_settings');	
		if($limit != null){
			$this->db->limit($limit, $offset);
		}
		if($order_by != null){
			$this->db->order_by($order_by, $sort);
		}
		$query = $this->db->get();
		return $query->result();
	}
	
	//Get Single Contact Data
	public function get_single_contact_data($id){
		$this->db->where('id',$id);
		$query = $this->db->get('contact_settings');
		return $query->row();
	}
	
	//Update Home
	public function update_contact_data($data, $id) {
		$this->db->where('id', $id);
		$this->db->update('contact_settings', $data);
		return true;
	}
}