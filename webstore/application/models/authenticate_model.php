<?php
class Authenticate_model extends CI_Model {
    /**
     * Admin LogIn - Verify Entered Data
     * @param $username
     * @param $password
     * @return mixed
     */
	public function login_user($username, $password){
		//Secure password
        $enc_password = md5($password);

        //Validate
        $this->db->where('username', $username);
        $this->db->where('password', $enc_password);
        
        $result = $this->db->get('admins');

        if ($result->num_rows() == 1) {
            return $result->row();
        }
	}

    /**
     * Verify Entered Data - New Admin
     * @return bool
     */
    function verify_login() {
        //Validation Rules
        $this->form_validation->set_rules('username','Username','trim|required|min_length[3]|xss_clean');
        $this->form_validation->set_rules('password','Password','trim|required|min_length[3]|xss_clean');

        if (!$this->form_validation->run()) {
            return false ;
        } else {
            return true;
        }
    }
}