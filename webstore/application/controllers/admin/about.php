<?php
class About extends Admin_Controller {
	public function __construct() {
		parent:: __construct();
    }

    /**
     * About Main Index
     * Get About Data and Load View
     */
	public function index() {
		//Get About
		$data['about'] = $this->Settings_model->get_about('id', 'DESC', 10);
		
		//Load View
		$data['main_content'] = 'admin/about/index';
		$this->load->view('admin/layouts/main', $data);
	}

    /**
     * Add About Page Details
     * Load Upload Configuration and Library
     * Verify Entered Data
     * Insert Data into DB, Display Message and Redirect
     */
    public function add(){
        //Load upload configuration
        $upload = $this->config->item('about');
        $this->load->library('upload', $upload);

		if(!$this->Settings_model->verify_about() || !$this->upload->do_upload('userfile')){
			//Views
			$data['main_content'] = 'admin/about/add';
			$this->load->view('admin/layouts/main', $data);
		} else {
			//Create About Data Array
			$file_data = $this->upload->data();
			$data = array(
					'title'         => $this->input->post('title'),
					'description'	=> $this->input->post('description'),
					'image'   		=> $file_data['file_name'],
					'published'     => $this->input->post('published')
			);
			
			//About Table Insert
			$this->Settings_model->insert_about($data);
			
			//Create Message
			$this->session->set_flashdata('about_saved', 'Your about page details has been saved');
			
			//Redirect to about page
			redirect(Admin_Controller::ABOUT);
		}
	}

    /**
     * Edit About Page Details
     * Load Upload Configuration and Library
     * Verify Entered Data
     * Insert Data into DB, Display Message and Redirect
     * @param $id
     */
    public function edit($id){
        //Load upload configuration and do upload
        $upload = $this->config->item('about');
        $this->load->library('upload', $upload);
		$this->upload->do_upload('userfile');
		
		$data['about'] = $this->Settings_model->get_single_about($id);
	
		if(!$this->Settings_model->verify_about()){
			//Views
			$data['main_content'] = 'admin/about/edit';
			$this->load->view('admin/layouts/main', $data);
		} else {
			//Create About Data Array
			$file_data = $this->upload->data();
			$row = $this->db->where('id',$id)->get('about_settings')->row();
			$data = array(
					'title'         => $this->input->post('title'),
					'description'	=> $this->input->post('description'),
					'image'   		=> $file_data['file_name'] ? $file_data['file_name'] : $row->image,
					'published'     => $this->input->post('published')
			);
				
			//About Table Insert
			$this->Settings_model->update_about($data, $id);
				
			//Create Message
			$this->session->set_flashdata('about_saved', 'Your about details has been saved');

            //Redirect to about page
            redirect(Admin_Controller::ABOUT);
		}
	}

    /**
     * Publish About Details
     * Display Message and Redirect
     */
	public function publish($id){
		//Publish about details - set value to 1
		$this->Settings_model->publish_about($id);
		 
		//Create Message
		$this->session->set_flashdata('about_published', 'Your about details has been published');

        //Redirect to about page
        redirect(Admin_Controller::ABOUT);
	}


    /**
     * Unpublish About Details
     * Display Message and Redirect
     */
	public function unpublish($id){
		//Unpublish about details - set value to 0
		$this->Settings_model->unpublish_about($id);
		 
		//Create Message
		$this->session->set_flashdata('about_unpublished', 'Your about details has been unpublished');

        //Redirect to about page
        redirect(Admin_Controller::ABOUT);
	}

    /**
     * Delete Image from Folder
     * Delete Data from DB
     * Display message and redirect
     */
	public function delete($id){
		//Delete Image from Folder
		$row = $this->db->where('id',$id)->get('about_settings')->row();
		$path_to_file = 'assets/images/about/'.$row->image;
		unlink($path_to_file);
		
		//Delete form DB
		$this->Settings_model->delete_about($id);
		 
		//Create Message
		$this->session->set_flashdata('about_deleted', 'Your about details has been deleted');

        //Redirect to about page
        redirect(Admin_Controller::ABOUT);
	}
}