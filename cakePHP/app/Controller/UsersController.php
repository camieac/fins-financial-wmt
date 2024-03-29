<?php // app/Controller/UsersController.php
App::uses('AppController', 'Controller');

class UsersController extends AppController {

public function beforeFilter() {
    parent::beforeFilter();
    // Allow users to register and logout.
    $this->Auth->allow('add', 'logout');
}




public function login() {
    if ($this->request->is('post')) {
        if ($this->Auth->login()) {
            return $this->redirect($this->Auth->redirect());
        }
        $this->Session->setFlash(__('Invalid username or password, try again'));
    }
}

public function logout() {
    return $this->redirect($this->Auth->logout());
}

    public function index() {
	$this->set('isAdmin',$this->Auth->user('role') == 'admin');
		if ($this->Session->read('Auth.User')) 
		{
        $this->User->recursive = 0;
        $this->set('users', $this->paginate());
		}
		else
		{
			$this->Auth->login = array('controller' => 'users', 'action' => 'login');
		}

    }

    public function view($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->set('user', $this->User->read(null, $id));
    }

    public function add() {
	if($this->Auth->user('role') == 'admin'){
		if ($this->request->is('post')) {
		    $this->User->create();
		    if ($this->User->save($this->request->data)) {
		        $this->Session->setFlash(__('The user has been saved'));
		        return $this->redirect(array('action' => 'login'));
		    }
		    $this->Session->setFlash(
		        __('The user could not be saved. Please, try again.')
		    );
		}
	}else{
		$this->Session->setFlash(__('You do not have sufficient priveledges to access that location.'));
		return $this->redirect(array('action' => 'index'));
	}
    }

    function change_password() {
    if (!empty($this->data)) {
        if ($this->User->save($this->data)) {
            $this->Session->setFlash('Password has been changed.');
            // call $this->redirect() here
        } else {
            $this->Session->setFlash('Password could not be changed.');
        }
    } else {
        $this->data = $this->User->findById($this->Auth->user('id'));
    }
}

function home_settings() {

    if (!empty($this->data)) {
        if ($this->User->save($this->data)) {
            $this->Session->setFlash('Home settings have been updated');
            // call $this->redirect() here
        } else {
            $this->Session->setFlash('Settings could not be changed.');
        }
    } else {
        $this->data = $this->User->findById($this->Auth->user('id'));
    }
}

    public function delete($id = null) {
        // Prior to 2.5 use
        // $this->request->onlyAllow('post');

        $this->request->allowMethod('post');

        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->User->delete()) {
            $this->Session->setFlash(__('User deleted'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('User was not deleted'));
        return $this->redirect(array('action' => 'index'));
    }
    
    

} ?>
