<?php
// Global Controller
class Admin_Controller extends CI_Controller {
    /**
     * Create Enums for Links
     */
    const PRODUCTS = 'admin/products';
    const CATEGORIES = 'admin/categories';
    const HOME = 'admin/home';
    const ABOUT = 'admin/about';
    const ADMINS = 'admin/admins';

    /**
     * Access Control
     */
    public function __construct() {
        parent:: __construct();

        // Access deny and redirect
        if (!$this->session->userdata('logged_in')) {
            redirect('admin/login');
        }
    }
}
?>