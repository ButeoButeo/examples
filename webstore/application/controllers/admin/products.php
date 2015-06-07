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
		$data['main_content'] = 'admin/products/index';
		$this->load->view('admin/layouts/main', $data);
	}

    /**
     * Add Product
     * Load Upload Configuration and Library
     * Verify Entered Data
     * Insert Data into DB, Display Message and Redirect
     */
	public function add(){
        //Load upload configuration
        $upload = $this->config->item('products');
        $this->load->library('upload', $upload);

        //Get needed data
		$data['categories'] = $this->Settings_model->get_categories();
		$data['admins'] = $this->Settings_model->get_admins();
		
		if(!$this->Settings_model->verify_product() || !$this->upload->do_upload('userfile')){
			//Views
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
					'published'		=> $this->input->post('published')
			);
			
			//Products Table Insert
			$this->Settings_model->insert_product($data);
			
			//Create Message
			$this->session->set_flashdata('product_saved', 'Your product has been saved');
			
			//Redirect to products page
            redirect(Admin_Controller::PRODUCTS);
		}
	}

    /**
     * Edit Product
     * Load Upload Configuration and Library
     * Verify Entered Data
     * Insert Data into DB, Display Message and Redirect
     */
	public function edit($id){
        //Load upload configuration and do upload
        $upload = $this->config->item('products');
        $this->load->library('upload', $upload);
        $this->upload->do_upload('userfile');

        //Get needed data
		$data['categories'] = $this->Settings_model->get_categories();
		$data['admins'] = $this->Settings_model->get_admins();
		$data['product'] = $this->Settings_model->get_product($id);

		if(!$this->Settings_model->verify_product()){
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
					'published'		    => $this->input->post('published')
			);
				
			//Products Table Insert
			$this->Settings_model->update_product($data, $id);
				
			//Create Message
			$this->session->set_flashdata('product_saved', 'Your product has been saved');
				
			//Redirect to products page
			redirect(Admin_Controller::PRODUCTS);
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
        redirect(Admin_Controller::PRODUCTS);
	}


    /**
     * Unpublish product
     * Display message and redirect
     */
	public function unpublish($id){
		//Unpublish Menu Items in array
		$this->Settings_model->unpublish_product($id);
		 
		//Create Message
		$this->session->set_flashdata('product_unpublished', 'Your product has been unpublished');
	
		//Redirect to products page
        redirect(Admin_Controller::PRODUCTS);
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
	
		//Redirect to products page
        redirect(Admin_Controller::PRODUCTS);
	}
}