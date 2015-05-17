<?php
class Dashboard extends Admin_Controller {
	public function __construct() {
		parent:: __construct();
    }
	
	public function index() {
		//Get Products
		$data['products'] = $this->Product_model->get_products();
		
		//Get Categories
		$data['categories'] = $this->Settings_model->get_categories();
		
		//Get Contact
		$data['contact'] = $this->Settings_model->get_contact_data('id', 'ASC', 10);
		
		//Get Admins
		$data['admins'] = $this->Settings_model->get_admins('id', 'DESC', 10);
		
		//Get Home
		$data['home'] = $this->Settings_model->get_home('id', 'DESC', 10);
		
		//Get About
		$data['about'] = $this->Settings_model->get_about('id', 'DESC', 10);
		
		//Load View
		$data['main_content'] = 'admin/dashboard/index';
		$this->load->view('admin/layouts/main', $data);
	}
}