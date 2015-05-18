<?php
class Products extends Admin_Controller {

    /**
     * Get Products, Categories and Adimins
     * Load View
     */
    public function index() {
		if($this->input->post('keywords')){
			//Get Filtered products
			$data['products'] = $this->Product_model->get_filtered_products($this->input->post('keywords'),'id','DESC',10);
		} else {
			//Get Products
			$data['products'] = $this->Product_model->get_products('id','DESC');
		}
		//Get Categories
		$data['categories'] = $this->Settings_model->get_categories('id', 'DESC');
		
		//Get Admins
		$data['admins'] = $this->Settings_model->get_admins('id', 'DESC');
		
		//Load View
		$data['error'] = '';
		$data['main_content'] = 'admin/products/index';
		$this->load->view('admin/layouts/main', $data);
	}
	
	//Add product
	public function add(){
		//Upload Image
		$config = array(
			'upload_path' => 'assets/images/products',
			'allowed_types' => 'gif|jpg|jpeg|png'
		);
		$this->load->library('upload', $config);
		
		//Validation Rules
		$this->form_validation->set_rules('title','Title','trim|required|min_length[4]|xss_clean');
		$this->form_validation->set_rules('description','Description','trim|required|xss_clean');
		$this->form_validation->set_rules('specifications','Specifications','trim|required|xss_clean');
		$this->form_validation->set_rules('price','Price','trim|required|xss_clean');
		$this->form_validation->set_rules('is_published','Publish','required');
		$this->form_validation->set_rules('category','Category','required');
		
		$data['categories'] = $this->Settings_model->get_categories();
		
		$data['admins'] = $this->Settings_model->get_admins();
		
		if(!$this->form_validation->run() || !$this->upload->do_upload('userfile')){
			//Views
			$data['error'] = $this->upload->display_errors('<p class="alert alert-dismissable alert-danger">' , '</p>');
			$data['main_content'] = 'admin/products/add';
			$this->load->view('admin/layouts/main', $data);
		} else {
			//Create products Data Array
			$file_data = $this->upload->data();
			$data = array(
					'title'				=> $this->input->post('title'),
					'description'		=> $this->input->post('description'),
					'specifications'	=> $this->input->post('specifications'),
					'image'   			=> $file_data['file_name'],
					'category_id'		=> $this->input->post('category'),
					'admin_id'			=> 1,
					'price'				=> $this->input->post('price'),
					'is_published'		=> $this->input->post('is_published')
			);
			
			//Products Table Insert
			$this->Settings_model->insert_product($data);
			
			//Create Message
			$this->session->set_flashdata('product_saved', 'Your product has been saved');
			
			//Redirect to products
            redirect(Admin_Controller::products);
		}
	}
	
	//Edit Product
	public function edit($id){
		//Upload Image
		$config = array(
			'upload_path' => 'assets/images/products',
			'allowed_types' => 'gif|jpg|jpeg|png'
		);
		$this->load->library('upload', $config);
		$this->upload->do_upload('userfile');
		
		//Validation Rules
		$this->form_validation->set_rules('title','Title','trim|required|min_length[4]|xss_clean');
		$this->form_validation->set_rules('description','Description','trim|required|xss_clean');
		$this->form_validation->set_rules('specifications','Specifications','trim|required|xss_clean');
		$this->form_validation->set_rules('price','Price','trim|required|mxss_clean');
		$this->form_validation->set_rules('is_published','Publish','required');
		$this->form_validation->set_rules('category','Category','required');
	
		$data['categories'] = $this->Settings_model->get_categories();
	
		$data['admins'] = $this->Settings_model->get_admins();
		
		$data['product'] = $this->Settings_model->get_product($id);
	
		if($this->form_validation->run() == FALSE){
			//Views
			$data['main_content'] = 'admin/products/edit';
			$this->load->view('admin/layouts/main', $data);
		} else {
			$file_data = $this->upload->data();
			$row = $this->db->where('id',$id)->get('products')->row();
			//Create Products Data Array
			$data = array(
					'title'				=> $this->input->post('title'),
					'description'		=> $this->input->post('description'),
					'specifications'	=> $this->input->post('specifications'),
					'image'   			=> $file_data['file_name'] ? $file_data['file_name'] : $row->image,
					'category_id'   	=> $this->input->post('category'),
					'admin_id'			=> $this->input->post('admin'),
					'price'				=> $this->input->post('price'),
					'is_published'		=> $this->input->post('is_published')
			);
				
			//Products Table Insert
			$this->Settings_model->update_product($data, $id);
				
			//Create Message
			$this->session->set_flashdata('product_saved', 'Your product has been saved');
				
			//Redirect to products
			redirect(Admin_Controller::products);
		}
	}

    /**
     * Publish product
     * Display message and redirect
     */
	public function publish($id){
		//Publish Menu Items in array
		$this->Settings_model->publish_product($id);
		 
		//Create Message
		$this->session->set_flashdata('product_published', 'Your product has been published');
	
		//Redirect to products
        redirect(Admin_Controller::products);
	}


    /**
     * Unpublish product
     * Display message and redirect
     */
	public function unpublish($id){
		//Publish Menu Items in array
		$this->Settings_model->unpublish_product($id);
		 
		//Create Message
		$this->session->set_flashdata('product_unpublished', 'Your product has been unpublished');
	
		//Redirect to products
        redirect(Admin_Controller::products);
	}

    /**
     * Delete product image from folder
     * Delete product from database
     * Display message and redirect
     */
	public function delete($id){
		//Delete Image from Folder
		$row = $this->db->where('id',$id)->get('products')->row();
		$path_to_file = 'assets/images/products/'.$row->image;
		unlink($path_to_file);
		
		//Delete form DB
		$this->Settings_model->delete_product($id);
		 
		//Create Message
		$this->session->set_flashdata('product_deleted', 'Your product has been deleted');
	
		//Redirect to products
        redirect(Admin_Controller::products);
	}
}