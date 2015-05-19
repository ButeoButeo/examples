<?php
class About extends Admin_Controller {
	public function __construct() {
		parent:: __construct();
    }

    /**
     * About Main Index
     * Get About data and Load View
     */
	public function index() {
		//Get About
		$data['about'] = $this->Settings_model->get_about('id', 'DESC', 10);
		
		//Load View
		$data['error'] = '';
		$data['main_content'] = 'admin/about/index';
		$this->load->view('admin/layouts/main', $data);
	}
	
	//Add About
	public function add(){
		//Upload Image
		$config = array(
			'upload_path' => 'assets/images/about',
			'allowed_types' => 'gif|jpg|jpeg|png'
		);
		$this->load->library('upload', $config);
		
		//Validation Rules
		$this->form_validation->set_rules('title','Title','trim|required|min_length[4]|xss_clean');
		$this->form_validation->set_rules('description','Description','trim|required|xss_clean');
		$this->form_validation->set_rules('is_published','Publish','required');

		if(!$this->form_validation->run() || !$this->upload->do_upload('userfile')){
			//Views
			$data['error'] = $this->upload->display_errors('<p class="alert alert-dismissable alert-danger">' , '</p>');
			$data['main_content'] = 'admin/about/add';
			$this->load->view('admin/layouts/main', $data);
		} else {
			//Create About Data Array
			$file_data = $this->upload->data();
			$data = array(
					'title'         => $this->input->post('title'),
					'description'	=> $this->input->post('description'),
					'image'   		=> $file_data['file_name'],
					'is_published'  => $this->input->post('is_published')
			);
			
			//About Table Insert
			$this->Settings_model->insert_about($data);
			
			//Create Message
			$this->session->set_flashdata('about_saved', 'Your about page details has been saved');
			
			//Redirect to about page
			redirect(Admin_Controller::about);
		}
	}
	
	//Edit About
	public function edit($id){
		//Upload Image
		$config = array(
			'upload_path' => 'assets/images/about',
			'allowed_types' => 'gif|jpg|jpeg|png'
		);
		$this->load->library('upload', $config);
		$this->upload->do_upload('userfile');
		
		//Validation Rules
		$this->form_validation->set_rules('title','Title','trim|required|min_length[4]|xss_clean');
		$this->form_validation->set_rules('description','Description','trim|required|xss_clean');
		$this->form_validation->set_rules('is_published','Publish','required');
		
		$data['about'] = $this->Settings_model->get_single_about($id);
	
		if(!$this->form_validation->run()){
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
					'is_published'  => $this->input->post('is_published')
			);
				
			//About Table Insert
			$this->Settings_model->update_about($data, $id);
				
			//Create Message
			$this->session->set_flashdata('about_saved', 'Your about details has been saved');

            //Redirect to about page
            redirect(Admin_Controller::about);
		}
	}

    /**
     * Publish about details
     * Display message and redirect
     */
	public function publish($id){
		//Publish about details - set value to 1
		$this->Settings_model->publish_about($id);
		 
		//Create Message
		$this->session->set_flashdata('about_published', 'Your about details has been published');

        //Redirect to about page
        redirect(Admin_Controller::about);
	}


    /**
     * Unpublish about details
     * Display message and redirect
     */
	public function unpublish($id){
		//Unpublish about details - set value to 0
		$this->Settings_model->unpublish_about($id);
		 
		//Create Message
		$this->session->set_flashdata('about_unpublished', 'Your about details has been unpublished');

        //Redirect to about page
        redirect(Admin_Controller::about);
	}

    /**
     * Delete Image from Folder
     * Delete from database
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
        redirect(Admin_Controller::about);
	}
}