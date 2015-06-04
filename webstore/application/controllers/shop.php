<?php
class Shop extends CI_Controller {
    /**
     * Get Data for Home Page and Load View
     */
	public function index() {
		//Get Home
		$data['home'] = $this->settings_model->get_home('id', 'ASC', 10);
		//Load View
		$data['main_content'] = 'home';
		$this->load->view('layouts/main', $data);
	}

    /** Get Data for About Page and Load View
     *
     */
	public function about() {
		//Get About
		$data['about'] = $this->settings_model->get_about('id', 'DESC', 10);
		//Load View
		$data['main_content'] = 'about';
		$this->load->view('layouts/main', $data);
	}

    /**
     * Get Contact Data, Send Email and Load View
     */
	public function contact() {
		//Get State and City
		$state = $this->db->where('key','State')->get('contact_settings')->row();
		$city = $this->db->where('key','City')->get('contact_settings')->row();
		
		//GoogleMap
		$this->load->library('googlemaps');
		$config = array();
		$config['center'] = $state->value.','.$city->value;
		$config['zoom'] = 5;
		$config['map_height'] = '350px';
		$config['map_width'] = '95%';
		
		$this->googlemaps->initialize($config);
		
		$marker = array();
		$marker['position'] = $state->value.','.$city->value;
		$this->googlemaps->add_marker($marker);
		
		$data['map'] = $this->googlemaps->create_map();
		
		$data['contact'] = $this->settings_model->get_contact_data('id', 'ASC', 10);

        /**
         * Check the validity of entered data and send an email
         * Display message and redirect
         */
        if (!$this->settings_model->verify_email()) {
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