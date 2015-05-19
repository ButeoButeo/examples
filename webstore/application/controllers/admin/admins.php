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
		$data['admins'] = $this->Settings_model->get_admins();
		
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
		//Validation Rules
		$this->form_validation->set_rules('first_name','First Name','trim|required|xss_clean');
		$this->form_validation->set_rules('last_name','Last Name','trim|required|xss_clean');
		$this->form_validation->set_rules('email','Email','trim|required|valid_email|xss_clean');
		$this->form_validation->set_rules('username','Username','trim|required|min_length[3]|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'required|matches[confirm_password]');
	
		if(!$this->form_validation->run()) {
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
			$this->Settings_model->insert_admin($data);
				
			//Create Message
			$this->session->set_flashdata('admin_saved', 'Admin has been added');
				
			//Redirect to admins page
			redirect(Admin_Controller::admins);
		}
	}


    /**
     * Check the validity
     * Edit admin data in database
     * Display message and redirect
     */
	public function edit($id){
		//Validation Rules
		$this->form_validation->set_rules('first_name','First Name','trim|required|xss_clean');
		$this->form_validation->set_rules('last_name','Last Name','trim|required|xss_clean');
		$this->form_validation->set_rules('email','Email','trim|required|valid_email|xss_clean');
		$this->form_validation->set_rules('username','Username','trim|required|min_length[3]|xss_clean');
	
		$data['admin'] = $this->Settings_model->get_admin($id);
	
		if(!$this->form_validation->run()){
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
			$this->Settings_model->update_admin($data, $id);
	
			//Create Message
			$this->session->set_flashdata('admin_saved', 'Admin has been saved');

            //Redirect to admins page
            redirect(Admin_Controller::admins);
		}
	}

    /**
     * Delete admin from database
     * Display message and redirect
     */
	public function delete($id){
		$this->Settings_model->delete_admin($id);
			
		//Create Message
		$this->session->set_flashdata('admin_deleted', 'Admin has been deleted');

        //Redirect to admins page
        redirect(Admin_Controller::admins);
	}
}