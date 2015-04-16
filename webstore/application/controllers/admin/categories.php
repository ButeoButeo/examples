<?php
class Categories extends CI_Controller {
	public function __construct() {
		parent:: __construct();
		
		//Access Control
		if (!$this->session->userdata('logged_in')) {
			redirect('admin/login');
		}
    }
	
	//Categories Main Index
	public function index() {
		//Get Categories
		$data['categories'] = $this->Settings_model->get_categories('id', 'DESC');
		
		//View
		$data['main_content'] = 'admin/categories/index';
		$this->load->view('admin/layouts/main', $data);
	}
	
	//Add Category
	public function add(){
		//Validation Rules
		$this->form_validation->set_rules('name','Name','trim|required|min_length[4]|xss_clean');
	
		if($this->form_validation->run() == FALSE){
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
			redirect('admin/categories');
		}
	}
	
	//Edit Category
	public function edit($id){
		//Validation Rules
		$this->form_validation->set_rules('name','Name','trim|required|min_length[4]|xss_clean');
	
		if($this->form_validation->run() == FALSE){
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
			redirect('admin/categories');
		}
	}
	
	//Delete Category
	public function delete($id){
		$this->Settings_model->delete_category($id);
			
		//Create Message
		$this->session->set_flashdata('category_deleted', 'Your category has been deleted');
	
		//Redirect to articles
		redirect('admin/categories');
	}
}