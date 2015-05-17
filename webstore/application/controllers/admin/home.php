<?php
class Home extends Admin_Controller {
	public function __construct() {
		parent:: __construct();
    }
	
	public function index() {
		//Get Home
		$data['home'] = $this->Settings_model->get_home('id', 'DESC', 10);
		
		//Load View
		$data['error'] = '';
		$data['main_content'] = 'admin/home/index';
		$this->load->view('admin/layouts/main', $data);
	}
	
	//Add Home
	public function add(){
		//Upload Image
		$config = array(
			'upload_path' => 'assets/images/slide',
			'allowed_types' => 'gif|jpg|jpeg|png'
		);
		$this->load->library('upload', $config);
		
		//Validation Rules
		$this->form_validation->set_rules('title','Title','trim|required|min_length[4]|xss_clean');
		$this->form_validation->set_rules('description','Description','trim|required|xss_clean');
		$this->form_validation->set_rules('button_title','Button Title','trim|required|xss_clean');
		$this->form_validation->set_rules('button_link','Button Link','trim|required|xss_clean');
		$this->form_validation->set_rules('is_published','Publish','required');

		if(!$this->form_validation->run() || !$this->upload->do_upload('userfile')){
			//Views
			$data['error'] = $this->upload->display_errors('<p class="alert alert-dismissable alert-danger">' , '</p>');
			$data['main_content'] = 'admin/home/add';
			$this->load->view('admin/layouts/main', $data);
		} else {
			//Create home Data Array
			$file_data = $this->upload->data();
			$data = array(
					'title'         => $this->input->post('title'),
					'description'	=> $this->input->post('description'),
					'button_title'	=> $this->input->post('button_title'),
					'button_link'	=> $this->input->post('button_link'),
					'image'   		=> $file_data['file_name'],
					'is_published'  => $this->input->post('is_published')
			);
			
			//Home Table Insert
			$this->Settings_model->insert_home($data);
			
			//Create Message
			$this->session->set_flashdata('home_saved', 'Your home page details has been saved');
			
			//Redirect to pages
			redirect('admin/home');
		}
	}
	
	//Edit Home
	public function edit($id){
		//Upload Image
		$config = array(
			'upload_path' => 'assets/images/slide',
			'allowed_types' => 'gif|jpg|jpeg|png'
		);
		$this->load->library('upload', $config);
		$this->upload->do_upload('userfile');
		
		//Validation Rules
		$this->form_validation->set_rules('title','Title','trim|required|min_length[4]|xss_clean');
		$this->form_validation->set_rules('description','Description','trim|required|xss_clean');
		$this->form_validation->set_rules('button_title','Button Title','trim|required|xss_clean');
		$this->form_validation->set_rules('button_link','Button Link','trim|required|xss_clean');
		$this->form_validation->set_rules('is_published','Publish','required');
		
		$data['home'] = $this->Settings_model->get_single_home($id);
	
		if($this->form_validation->run() == FALSE){
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
					'is_published'  => $this->input->post('is_published')
			);
				
			//Home Data Insert
			$this->Settings_model->update_home($data, $id);
				
			//Create Message
			$this->session->set_flashdata('home_saved', 'Your home page details has been saved');
				
			//Redirect to pages
			redirect('admin/home');
		}
	}
	
	//Publish Home
	public function publish($id){
		//Publish Menu Items in array
		$this->Settings_model->publish_home($id);
		 
		//Create Message
		$this->session->set_flashdata('home_published', 'Your home settings has been published');
	
		//Redirect
		redirect('admin/home');
	}
	 
	 
	//Unpublish Home
	public function unpublish($id){
		//Publish Menu Items in array
		$this->Settings_model->unpublish_home($id);
		 
		//Create Message
		$this->session->set_flashdata('home_unpublished', 'Your home settings has been unpublished');
	
		//Redirect
		redirect('admin/home');
	}
	
	//Delete Home
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
		redirect('admin/home');
	}
}