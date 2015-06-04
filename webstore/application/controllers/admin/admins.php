<?php
class Admins extends Admin_Controller {
	public function __construct() {
		parent:: __construct();
    }

    /**
     * Admins Main Index
     * Get Admins and Load View
     */
	public function index(){
		//Get admins
		$data['admins'] = $this->settings_model->get_admins();
		
		//Views
        $data['main_content'] = 'admin/admins/index';
        $this->load->view('admin/layouts/main', $data);
	}

    /**
     * Check the validity
     * Add admin to database
     * Display message and redirect
     */
	public function add(){
		if(!$this->settings_model->verify_admin()) {
			//Views
			$data['main_content'] = 'admin/admins/add';
			$this->load->view('admin/layouts/main', $data);
		} else {
			//Create Data Array
			$data = array(
					'first_name'  	=> $this->input->post('first_name'),
					'last_name'   	=> $this->input->post('last_name'),
					'username' 		=> $this->input->post('username'),
					'password'    	=> md5($this->input->post('password')),
					'email'  		=> $this->input->post('email')
			);
				
			//Table Insert
			$this->settings_model->insert_admin($data);
				
			//Create Message
			$this->session->set_flashdata('admin_saved', 'Admin has been added');
				
			//Redirect to admins page
			redirect(Admin_Controller::ADMINS);
		}
	}

    /**
     * Get Single Admin Data
     * Check the validity
     * Edit admin data in database
     * Display message and redirect
     */
	public function edit($id){
		$data['admin'] = $this->settings_model->get_admin($id);

        if(!$this->settings_model->verify_admin()) {
			//Views
			$data['main_content'] = 'admin/admins/edit';
			$this->load->view('admin/layouts/main', $data);
		} else {
			//Create Data Array
			$data = array(
					'first_name'  	=> $this->input->post('first_name'),
					'last_name'   	=> $this->input->post('last_name'),
					'username' 		=> $this->input->post('username'),
					'email'  		=> $this->input->post('email')
			);
	
			//Table Update
			$this->settings_model->update_admin($data, $id);
	
			//Create Message
			$this->session->set_flashdata('admin_saved', 'Admin has been saved');

            //Redirect to admins page
            redirect(Admin_Controller::ADMINS);
		}
	}

    /**
     * Delete admin from database
     * Display message and redirect
     */
	public function delete($id){
		$this->settings_model->delete_admin($id);
			
		//Create Message
		$this->session->set_flashdata('admin_deleted', 'Admin has been deleted');

        //Redirect to admins page
        redirect(Admin_Controller::ADMINS);
	}
}