<?php
// Global Controller
class Admin_Controller extends CI_Controller {
    /**
     * Create Enums for Links
     */
    const products = 'admin/products';
    const categories = 'admin/categories';
    const home = 'admin/home';
    const about = 'admin/about';
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