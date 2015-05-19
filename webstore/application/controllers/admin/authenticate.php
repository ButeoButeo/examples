<?php 
class Authenticate extends CI_Controller {
    /**
     * User login
     * Check the validity
     * Set session and display message
     *
     */
	public function login() {
		$this->form_validation->set_rules('username','Username','trim|required|min_length[3]|xss_clean');
		$this->form_validation->set_rules('password','Password','trim|required|min_length[3]|xss_clean');
		if (!$this->form_validation->run()) {
			//Load View
			$this->load->view('admin/layouts/login');
		} else {
			//Get From Post
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			
			//Validate Username & Password
			$user_id = $this->Authenticate_model->login_user($username, $password);
			
			if($user_id){
				$user_data = array(
						'user_id'   => $user_id,
						'username'  => $username,
						'logged_in' => true
				);
				//Set session userdata
				$this->session->set_userdata($user_data);
				
				//Set message
				$this->session->set_flashdata('pass_login', 'You are now logged in');
				redirect('admin/dashboard');
			} else {
				//Set message
				$this->session->set_flashdata('fail_login', 'Sorry, the login info that you entered is invalid');
				redirect('admin/login');
			}
		}
	}

    /**
     * User logout
     * Unset session and display message
     *
     */
	public function logout() {
		//Unset user data
		$this->session->unset_userdata('logged_in');
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('username');
		$this->session->sess_destroy();
	
		//Set message
		$this->session->set_flashdata('logged_out', 'You have been logged out');
		redirect('admin/login');
	}
}