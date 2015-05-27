<?php
class Home extends Admin_Controller {
	public function __construct() {
		parent:: __construct();
    }

    /**
     * Home Main Index
     * Get Home Data and Load View
     */
	public function index() {
		//Get Home
		$data['home'] = $this->Settings_model->get_home('id', 'DESC', 10);
		
		//Load View
		$data['main_content'] = 'admin/home/index';
		$this->load->view('admin/layouts/main', $data);
	}

    /**
     * Add Home Page Details
     * Load Upload Configuration and Library
     * Verify Entered Data
     * Insert Data into DB, Display Message and Redirect
     */
	public function add(){
        //Load upload configuration
        $upload = $this->config->item('home');
        $this->load->library('upload', $upload);

		if(!$this->Settings_model->verify_home() || !$this->upload->do_upload('userfile')){
			//Views
			$data['main_content'] = 'admin/home/add';
			$this->load->view('admin/layouts/main', $data);
		} else {
			//Create Home Data Array
			$file_data = $this->upload->data();
			$data = array(
					'title'         => $this->input->post('title'),
					'description'	=> $this->input->post('description'),
					'button_title'	=> $this->input->post('button_title'),
					'button_link'	=> $this->input->post('button_link'),
					'image'   		=> $file_data['file_name'],
					'published'     => $this->input->post('published')
			);
			
			//Home Table Insert
			$this->Settings_model->insert_home($data);
			
			//Create Message
			$this->session->set_flashdata('home_saved', 'Your home page details has been saved');
			
			//Redirect
            redirect(Admin_Controller::home);
		}
	}

    /**
     * Edit Home Page Details
     * Load Upload Configuration and Library
     * Verify Entered Data
     * Insert Data into DB, Display Message and Redirect
     * @param $id
     */
	public function edit($id){
        //Load upload configuration and do upload
        $upload = $this->config->item('home');
        $this->load->library('upload', $upload);
        $this->upload->do_upload('userfile');
		
		$data['home'] = $this->Settings_model->get_single_home($id);
	
		if(!$this->Settings_model->verify_home()){
			//Views
			$data['main_content'] = 'admin/home/edit';
			$this->load->view('admin/layouts/main', $data);
		} else {
			$file_data = $this->upload->data();
			$row = $this->db->where('id',$id)->get('home_settings')->row();
			//Create home Data Array
			$data = array(
					'title'         => $this->input->post('title'),
					'description'	=> $this->input->post('description'),
					'button_title'	=> $this->input->post('button_title'),
					'button_link'	=> $this->input->post('button_link'),
					'image'   		=> $file_data['file_name'] ? $file_data['file_name'] : $row->image,
					'published'     => $this->input->post('published')
			);
				
			//Home Data Insert
			$this->Settings_model->update_home($data, $id);
				
			//Create Message
			$this->session->set_flashdata('home_saved', 'Your home page details has been saved');
				
			//Redirect
            redirect(Admin_Controller::home);
		}
	}

    /**
     * Publish Home Page Data
     * Display message and redirect
     */
	public function publish($id){
		//Publish home page details - set value to 1
		$this->Settings_model->publish_home($id);
		 
		//Create Message
		$this->session->set_flashdata('home_published', 'Your home settings has been published');
	
		//Redirect
        redirect(Admin_Controller::home);
	}


    /**
     * Unpublish Home Page Data
     * Display Message and Redirect
     */
	public function unpublish($id){
		//Unpublish home page details - set value to 0
		$this->Settings_model->unpublish_home($id);
		 
		//Create Message
		$this->session->set_flashdata('home_unpublished', 'Your home settings has been unpublished');
	
		//Redirect
        redirect(Admin_Controller::home);
	}

    /**
     * Delete slide image from folder
     * Delete Home Page data from DB
     * Display Message and Redirect
     */
	public function delete($id){
		//Delete Image from Folder
		$row = $this->db->where('id',$id)->get('home_settings')->row();
		$path_to_file = 'assets/images/slide/'.$row->image;
		unlink($path_to_file);
		
		//Delete form DB
		$this->Settings_model->delete_home($id);
		 
		//Create Message
		$this->session->set_flashdata('home_deleted', 'Your home settings has been deleted');
	
		//Redirect
        redirect(Admin_Controller::home);
	}
}