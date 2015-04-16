<?php

class Product_model extends CI_Model {
	
	// Get Products
	public function get_products($order_by = null, $sort='DESC', $limit = null, $offset = 0){
		$this->db->select('a.*, b.name as category_name, c.first_name, c.last_name');
		$this->db->from('products as a');
		$this->db->join('categories AS b', 'b.id = a.category_id','left');
		$this->db->join('admins AS c', 'c.id = a.admin_id','left');
		if($limit != null){
			$this->db->limit($limit, $offset);
		}
		if($order_by != null){
			$this->db->order_by($order_by, $sort);
		}
		$query = $this->db->get();
		return $query->result();
	}
	
	//Get Single Product
	public function get_product_details($id) {
		$this->db->select('*');
		$this->db->from('products');
		$this->db->where('id', $id);
		$query = $this->db->get();
		return $query->row();
	}
	
	//Get Filtered Products
	public function get_filtered_products($keywords, $order_by = null, $sort = 'DESC', $limit = null, $offset = 0){
		$this->db->select('a.*, b.name as category_name, c.first_name, c.last_name');
		$this->db->from('products as a');
		$this->db->join('categories AS b', 'b.id = a.category_id','left');
		$this->db->join('admins AS c', 'c.id = a.admin_id','left');
		$this->db->like('title', $keywords);
		$this->db->or_like('description', $keywords);
		if($limit != null){
			$this->db->limit($limit, $offset);
		}
		if($order_by != null){
			$this->db->order_by($order_by, $sort);
		}
		$query = $this->db->get();
		return $query->result();
	}
	
	//Get Products Count
	public function get_product_count() {
        return $this->db->count_all('products');
    }

	//Get List of Products
    public function get_list_products($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->get('products');
 
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
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
	public function get_category($category_id) {
		$this->db->select('*');
		$this->db->from('products');
		$this->db->where('category_id', $category_id);
		$query = $this->db->get();
		return $query->result();
	}
	
	//Get Most Popular Products
	public function get_popular() {
		$this->db->select('P.*, COUNT(O.product_id) as total');
		$this->db->from('orders AS O');
		$this->db->join('products AS P', 'O.product_id = P.id', 'INNER');
		$this->db->group_by('O.product_id');
		$this->db->order_by('total', 'desc');
		$this->db->limit(3);
		$query = $this->db->get();
		return $query->result();
	}
	
	//Add Order To Database
	public function add_order($order_data) {
		$insert = $this->db->insert('orders', $order_data);
		return $insert;
	}
}