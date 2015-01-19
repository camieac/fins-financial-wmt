<?php

// File: /app/Controller/clientsController.php

class ClientsController extends AppController {
public $helpers = array('Html', 'Form');

public function index() {
if ($this->Session->read('Auth.User')) 
{
$user = AuthComponent::user('username');

$conditions = array(
    "username" => $user,
    "role" => 'admin'
);

$this->loadModel('User');
if ($this->User->hasAny($conditions))
{
$this->set('clients', $this->Client->find('all'));
}
else
{
$this->set('clients', $this->Client->find('all', array('conditions' => array("'$user' = fa"))));
}

}
else
{
$this->redirect(array('controller' => 'users', 'action' => 'login'));
}
}

public function view($id = null) {
if ($this->Session->read('Auth.User')) 
{
if (!$id) {
throw new NotFoundException(__('Invalid client'));
}
$client = $this->Client->findById($id);
if (!$client) {
throw new NotFoundException(__('Invalid client'));
}
$this->set('client', $client);
}
else
{
$this->redirect(array('controller' => 'users', 'action' => 'login'));
}
}


public function add() {
	

$this->set('FAquery', $this->Client->getFAs());

if ($this->request->is('post')) {
$this->Client->create();
if ($this->Client->save($this->request->data)) {
$this->Session->setFlash(__('Your client has been saved.'));
return $this->redirect(array('action' => 'index'));
}
$this->Session->setFlash(__('Unable to add your client.'));
}
}

public function edit($id = null) {
	
if (!$id) {
throw new NotFoundException(__('Invalid Client'));
}
$client = $this->Client->findById($id);
if (!$client) {
throw new NotFoundException(__('Invalid Client'));
}

$this->set('FAquery', $this->Client->getFAs());

if ($this->request->is(array('Client', 'put'))) {
$this->Client->id = $id;
if ($this->Client->save($this->request->data)) {
$this->Session->setFlash(__('Your Client has been updated.'));
return $this->redirect(array('action' => 'index'));
}
$this->Session->setFlash(__('Unable to update your Client.'));
}
if (!$this->request->data) {
$this->request->data = $client;
}
}

public function delete($id) {
if ($this->request->is('get')) {
throw new MethodNotAllowedException();
}
if ($this->Client->delete($id)) {
$this->Session->setFlash(
__('The Client with id: %s has been deleted.', h($id))
);
return $this->redirect(array('action' => 'index'));
}
}


} ?>
