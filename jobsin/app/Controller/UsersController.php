<?php
class UsersController extends AppController {
    public $name = 'Users';

    /**
     * User Register
     * Set Message and redirect
     */
    public function register() {
        if ($this->request->is('post')) {
            $this->User->create();

            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('You are now registered and may login'));
                return $this->redirect(array('controller' => 'jobs', 'action' => 'index'));
            }

            $this->Session->setFlash(__('There was a problem creating your account'));
        }
    }
}