<?php
// Global Controller
class Admin_Controller extends CI_Controller {
    /**
     * Access Control
     */
    public function __construct() {
        parent:: __construct();

        // Access Deny and redirect
        if (!$this->session->userdata('logged_in')) {
            redirect('admin/login');
        }
    }
}
?>