<?php
class User_model extends CI_Model {
    /**
     * Verify User Data
     * @return bool
     */
    function verify_user() {
        $this->load->library('form_validation');

        //Validation Rules
        $this->form_validation->set_rules('first_name','First Name','trim|required');
        $this->form_validation->set_rules('last_name','Last Name','trim|required');
        $this->form_validation->set_rules('email','Email','trim|required|valid_email');
        $this->form_validation->set_rules('username','Username','trim|required|min_length[4]|max_length[16]');
        $this->form_validation->set_rules('password','Password','trim|required|min_length[4]|max_length[50]');
        $this->form_validation->set_rules('password2','Confirm Password','trim|required|matches[password]');

        if (!$this->form_validation->run()) {
            return false ;
        } else {
            return true;
        }
    }

    /**
     * User register
     * @return mixed
     */
	public function register() {
		$data = array(
			'first_name' => $this->input->post('first_name'),
			'last_name'  => $this->input->post('last_name'),
            'email'      => $this->input->post('email'),
            'username'   => $this->input->post('username'),
            'password'   => md5($this->input->post('password'))
		);
		$insert = $this->db->insert('users', $data);
		return $insert;
	}

    /**
     * User Login
     * @param $username
     * @param $password
     * @return mixed
     */
	public function login($username,$password){  
        //Validate
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        
        $result = $this->db->get('users');

        if ($result->num_rows() == 1) {
            return $result->row(0)->id;
        }
    }
}
