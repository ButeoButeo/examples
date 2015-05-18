<?php
// Global Controller
class Admin_Controller extends CI_Controller {
    /**
     * Create Enums for Links
     */
    const products = 'admin/products';
    const home = 'admin/home';

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