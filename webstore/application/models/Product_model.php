<?php

class Product_model extends CI_Model {

    /**
     * Get Products form DB
     * @param null $order_by
     * @param string $sort
     * @param null $limit
     * @param int $offset
     * @return mixed
     */
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

    /**
     * Get Single Product form DB
     * @param $id
     * @return mixed
     */
	public function get_product_details($id) {
		$this->db->select('*');
		$this->db->from('products');
		$this->db->where('id', $id);
		$query = $this->db->get();
		return $query->row();
	}

    /**
     * Get Filtered Products
     * @param $keywords
     * @param null $order_by
     * @param string $sort
     * @param null $limit
     * @param int $offset
     * @return mixed
     */
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

    /**
     * Get Products Count (used for pagination)
     */
	public function get_product_count() {
        return $this->db->count_all('products');
    }

    /**
     * Get List of Products
     * @param $limit
     * @param $start
     * @return array|bool
     */
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


    /**
     * Get Categories form DB
     * @param null $order_by
     * @param string $sort
     * @param null $limit
     * @param int $offset
     * @return mixed
     */
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

    /**
     * Get Single Category
     * @param $category_id
     * @return mixed
     */
	public function get_category($category_id) {
		$this->db->select('*');
		$this->db->from('products');
		$this->db->where('category_id', $category_id);
		$query = $this->db->get();
		return $query->result();
	}


    /**
     * Get Most Popular Products
     * @return mixed
     */
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


    /**
     * Verify Order Data
     * @return bool
     */
    public function verify_order_data() {
        $this->load->library('form_validation');

        //Validation Rules
        $this->form_validation->set_rules('address','Address','trim|required|max_length[45]');
        $this->form_validation->set_rules('address2','Address2','trim|max_length[45]');
        $this->form_validation->set_rules('city','City','trim|required|max_length[45]');
        $this->form_validation->set_rules('state','State','trim|required|max_length[45]');
        $this->form_validation->set_rules('zipcode','Zipcode','trim|required|min_length[4]|max_length[16]');

        if (!$this->form_validation->run()) {
            return FALSE ;
        } else {
            return TRUE;
        }
    }

    /**
     * Add Order To Database
     * @param $order_data
     * @return mixed
     */
	public function add_order($order_data) {
		$insert = $this->db->insert('orders', $order_data);
		return $insert;
	}

}