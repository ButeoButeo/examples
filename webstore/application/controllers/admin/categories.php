<?php
class Categories extends Admin_Controller {
	public function __construct() {
		parent:: __construct();
    }

    /**
     * Categories Main Index
     * Fetch categories and load view
     */
	public function index() {
		//Get Categories
		$data['categories'] = $this->Settings_model->get_categories('id', 'DESC');
		
		//Load View
		$data['main_content'] = 'admin/categories/index';
		$this->load->view('admin/layouts/main', $data);
	}

    /**
     * Check the validity
     * Add category to database
     * Display message and redirect
     */
	public function add() {
		//Validation Rules
		$this->form_validation->set_rules('name','category name','trim|required|min_length[4]|xss_clean');
	
		if(!$this->form_validation->run()) {
			//Views
			$data['main_content'] = 'admin/categories/add';
			$this->load->view('admin/layouts/main', $data);
		} else {
			//Create Data Array
			$data = array(
					'name'         => $this->input->post('name')
			);
				
			//Categories Table Insert
			$this->Settings_model->insert_category($data);
				
			//Create Message
			$this->session->set_flashdata('category_saved', 'Your category has been saved');
				
			//Redirect to pages
			redirect(Admin_Controller::categories);
		}
	}

    /**
     * Check the validity
     * Edit category in database
     * Display message and redirect
     */
	public function edit($id) {
		//Validation Rules
		$this->form_validation->set_rules('name','category name','trim|required|min_length[4]|xss_clean');
	
		if (!$this->form_validation->run()) {
			$data['category'] = $this->Settings_model->get_category($id);
			
			//Views
			$data['main_content'] = 'admin/categories/edit';
			$this->load->view('admin/layouts/main', $data);
		} else {
			//Create Data Array
			$data = array(
					'name'         => $this->input->post('name')
			);
	
			//Articles Table Insert
			$this->Settings_model->update_category($data, $id);
	
			//Create Message
			$this->session->set_flashdata('category_saved', 'Your category has been saved');
	
			//Redirect to pages
			redirect(Admin_Controller::categories);
		}
	}

    /**
     * Delete category from database
     * Display message and redirect
     */
	public function delete($id) {
		$this->Settings_model->delete_category($id);
			
		//Create Message
		$this->session->set_flashdata('category_deleted', 'Your category has been deleted');
	
		//Redirect to categories
		redirect(Admin_Controller::categories);
	}
}