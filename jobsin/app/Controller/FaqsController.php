<?php
class FaqsController extends AppController {
    public $name = 'Faqs';

    /**
     * Set FQA's, Get Info and Load View
     */
    public function index() {
        //Set Title
        $this->set('title_for_layout', 'JobsIn | FAQ\'s');
    }
}