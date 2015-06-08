<?php
class JobsController extends AppController {
    public $name = 'Jobs';

    /**
     * Default Index Method
     * Set Options, Get Job Info and Load View
     */
    public function index() {
        //Set Category Query Options
        $options = array(
            'order' => array('Category.name' => 'asc')
        );
        //Get Categories
        $categories = $this->Job->Category->find('all', $options);
        //Set Categories
        $this->set('categories', $categories);

        //Set Query Options
        $options = array(
          'order' => array('Job.created' => 'desc'),
            'limit' => 10
        );
        //Get Job Info
        $jobs = $this->Job->find('all', $options);

        //Set Title
        $this->set('title_for_layout', 'JobsIn | Welcome');

        $this->set('jobs', $jobs);
    }

    /**
     * Browse Index Method
     * Set Options, Get and Set Categories
     * Set Conditions and Query Options, Get Job Info and Load View
     */
    public function browse($category = null) {
        //Init Conditions Array
        $conditions = array();

        /**
         * Filters
         */

        //Check Keyword Filter
        if ($this->request->is('post')) {
            if (!empty($this->request->data('keywords')))  {
                $conditions[] = array('OR' => array(
                    'Job.title LIKE' => "%" . $this->request->data('keywords') . "%",
                    'Job.description LIKE' => "%" . $this->request->data('keywords') . "%"
                ));
            }
        }

        //State Filter
        if (!empty($this->request->data('state')) && $this->request->data('state') != 'Select State') {
            //Match State
            $conditions[] = array(
                'Job.state LIKE' => "%" . $this->request->data('state') . "%"
            );
        }

        //Category Filter
        if (!empty($this->request->data('category')) && $this->request->data('category') != 'Select Category') {
            //Match State
            $conditions[] = array(
                'Job.category_id LIKE' => "%" . $this->request->data('category') . "%"
            );
        }

        //Set Category Query Options
        $options = array(
                    'order' => array('Category.name' => 'asc')
        );
        //Get Categories
        $categories = $this->Job->Category->find('all', $options);
        //Set Categories
        $this->set('categories', $categories);

        if ($category != null) {
            //Match Category
            $conditions[] = array(
                    'Job.category_id LIKE' => "%" . $category . "%"
            );
        }
        //Set Query Options
        $options = array(
                    'order'         => array('Job.created' => 'desc'),
                    'conditions'    => $conditions,
                    'limit'         => 8
        );
        //Get Job Info
        $jobs = $this->Job->find('all', $options);

        //Set Title
        $this->set('title_for_layout', 'JobsIn | Browse For A Job');

        $this->set('jobs', $jobs);
    }


    /**
     * View Single Job
     * @param $id
     */
    public function view($id) {
        if (!$id) {
            throw new NotFoundException(__('Invalid job listing'));
        }

        $job = $this->Job->findById($id);

        if (!$job) {
            throw new NotFoundException(__('Invalid job listing'));
        }

        //Set Title
        $this->set('title_for_layout', $job['Job']['title']);

        $this->set('job', $job);
    }
}