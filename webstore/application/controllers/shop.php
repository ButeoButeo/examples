<?php
class Shop extends CI_Controller {
	public function index() {
		//Get Home
		$data['home'] = $this->Settings_model->get_home('id', 'ASC', 10);
		//Load View
		$data['main_content'] = 'home';
		$this->load->view('layouts/main', $data);
	}
	
	public function about() {
		//Get About
		$data['about'] = $this->Settings_model->get_about('id', 'DESC', 10);
		//Load View
		$data['main_content'] = 'about';
		$this->load->view('layouts/main', $data);
	}
	
	public function contact() {
		//Get State and City
		$state = $this->db->where('id','3')->get('contact_settings')->row();
		$city = $this->db->where('id','2')->get('contact_settings')->row();
		
		//GoogleMap
		$this->load->library('googlemaps');
		$config = array();
		$config['center'] = $state->value.','.$city->value;
		$config['zoom'] = 4;
		$config['map_height'] = '350px';
		$config['map_width'] = '95%';
		
		$this->googlemaps->initialize($config);
		
		$marker = array();
		$marker['position'] = $state->value.','.$city->value;
		$this->googlemaps->add_marker($marker);
		
		$data['map'] = $this->googlemaps->create_map();
		
		$data['contact'] = $this->Settings_model->get_contact_data('id', 'ASC', 10);

        //Load Validation Library
        $this->load->library('form_validation');

        $this->form_validation->set_rules('contactname', 'Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email|xss_clean');
        $this->form_validation->set_rules('subject', 'Subject', 'required');
        $this->form_validation->set_rules('message', 'Message', 'trim|required|max_length[255]|xss_clean');

        if (!$this->form_validation->run()) {
            //Load View
            $data['main_content'] = 'contact';
            $this->load->view('layouts/main', $data);
        } else {
            //Load Email Library
            $this->load->library('email');

            //Set Email Values
            $this->email->from(set_value('email'), set_value('contactname'));
            $this->email->to('mianjegovan@gmail.com');
            $this->email->subject(set_value('subject'));
            $this->email->message(set_value('message'));

            if ($this->email->send()) {
                $this->session->set_flashdata('pass_message', 'Your message was successfully sent.');
                redirect('contact');
            }
        }
	}
}