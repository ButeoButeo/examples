<?php
class JobsController extends AppController {
    public $name = 'Jobs';

    /**
     * Default Index Method
     * Set Options, Get Job Info and Load View
     */
    public function index() {
        //Set Title
        $this->set('title_for_layout', 'JobsIn | Welcome');

        //Set Category Query Options
        $options = array(
            'order' => array('Category.name' => 'asc')
        );
        //Get and Set Categories
        $this->set('categories', $this->Job->Category->find('all', $options));

        //Set Job Query Options
        $options = array(
            'order' => array('Job.created' => 'desc'),
            'limit' => 10
        );
        //Get and Set Job Info
        $this->set('jobs', $this->Job->find('all', $options));
    }

    /**
     * Browse Index Method
     * Set Options, Get and Set Categories
     * Set Conditions and Query Options, Get Job Info and Load View
     */
    public function browse($category = null) {
        //Set Title
        $this->set('title_for_layout', 'JobsIn | Browse For A Job');

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
        //Get and Set Categories
        $this->set('categories', $this->Job->Category->find('all', $options));

        if ($category != null) {
            //Match Category
            $conditions[] = array(
                    'Job.category_id LIKE' => "%" . $category . "%"
            );
        }

        //Set Job Query Options
        $options = array(
                    'order'         => array('Job.created' => 'desc'),
                    'conditions'    => $conditions,
                    'limit'         => 8
        );
        // Get and Set Jobs
        $this->set('jobs', $this->Job->find('all', $options));
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

    /**
     * Add Job
     */
    public function add() {
        //Get Categories for select list
        $options = array(
                'order' => array('Category.name' => 'asc')
        );
        //Get and Set Categories
        $this->set('categories', $this->Job->Category->find('list', $options));

        //Get and Set types for select list
        $this->set('types', $this->Job->Type->find('list'));

        if ($this->request->is('post')) {
            $this->Job->create();

            //Save Logged User ID
            $this->request->data['Job']['user_id'] = $this->Auth->user('id');

            if ($this->Job->save($this->request->data)) {
                $this->Session->setFlash(__('Your job has been listed'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Unable to add your job'));
        }
    }

    /**
     * Edit Job
     * @param $id
     */
    public function edit($id) {
        //Get Categories for select list
        $options = array(
            'order' => array('Category.name' => 'asc')
        );
        //Get and Set Categories
        $this->set('categories', $this->Job->Category->find('list', $options));

        //Get and Set types for select list
        $this->set('types', $this->Job->Type->find('list'));

        if (!$id) {
            throw new NotFoundException(__('Invalid job listing'));
        }

        $job = $this->Job->findById($id);
        if (!$job) {
            throw new NotFoundException(__('Invalid job listing'));
        }

        if ($this->request->is(array('job', 'put'))) {
            $this->Job->id = $id;

            if ($this->Job->save($this->request->data)) {
                $this->Session->setFlash(__('Your job has been updated'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Unable to update your job'));
        }

        if (!$this->request->data) {
            $this->request->data = $job;
        }
    }

    /**
     * Delete Job
     * @param $id
     */
    public function delete($id){
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }

        if ($this->Job->delete($id)) {
            $this->Session->setFlash(
                __('The job with id: %s has been deleted.', h($id))
            );
            return $this->redirect(array('action' => 'index'));
        }
    }
}