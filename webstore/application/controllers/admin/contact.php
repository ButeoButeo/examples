<?php
class Contact extends Admin_Controller {
	public function __construct() {
		parent:: __construct();
    }

    /**
     * Contact Main Index
     * Fetch contact details and Load View
     */
	public function index() {
		//Get Contact
		$data['contact'] = $this->Settings_model->get_contact_data('id', 'ASC', 10);
		
		//Load View
		$data['main_content'] = 'admin/contact/index';
		$this->load->view('admin/layouts/main', $data);
	}

    /**
     * Edit Contact Page Details
     * Load Upload Configuration and Library
     * Verify Entered Data
     * Insert Data into DB, Display Message and Redirect
     * @param $id
     */
	public function edit($id){
        $data['contact'] = $this->Settings_model->get_single_contact_data($id);

        //Load upload configuration and do upload
        $upload = $this->config->item('contact');
        $this->load->library('upload', $upload);
        $this->upload->do_upload('userfile');

		if(!$this->Settings_model->verify_contact()) {
			//Views
			$data['main_content'] = 'admin/contact/edit';
			$this->load->view('admin/layouts/main', $data);
		} else {
            //Create Contact Data Array if Image
			if ($id == '7') {
                $file_data = $this->upload->data();
                $row = $this->db->where('id','7')->get('contact_settings')->row();

				$data = array(
						'value'         =>  $file_data['file_name'] ? $file_data['file_name'] : $row->value
				);
			} else {
				//Create Contact Data Array
				$data = array(
						'value'         => $this->input->post('value')
				);
			}

			// Contact Table Insert
			$this->Settings_model->update_contact_data($data, $id);
				
			// Create Message
			$this->session->set_flashdata('contact_saved', 'Your contact details has been saved');
				
			// Redirect to contact page
			redirect('admin/contact/index');
	    }
    }
}