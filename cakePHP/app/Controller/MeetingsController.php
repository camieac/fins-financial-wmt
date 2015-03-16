<?php

// File: /app/Controller/MeetingsController.php

class MeetingsController extends AppController {
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
$this->Meeting->user = $user;

if ($this->User->hasAny($conditions))
{
<<<<<<< HEAD
$this->set('events', $this->Meeting->find('all'));
}
else
{
$this->set('events', $this->Meeting->find('all', array('conditions' => array("'$user' = fa"))));
=======
$this->set('meetings', $this->Meeting->find('all'));
}
else
{
$this->set('meetings', $this->Meeting->find('all', array('conditions' => array("'$user' = fa"))));
>>>>>>> 9283f741b8c75a119d90aa68d0ac45998f85d375
}
$this->set('query', $this->Meeting->get());


}

else
{
$this->redirect(array('controller' => 'users', 'action' => 'login'));
}
}



public function add() {
	
$user = AuthComponent::user('username');
$this->Meeting->user = $user;

$this->set('Custquery', $this->Meeting->getCustomers());
$this->set('FAquery', $this->Meeting->getFAs());
$this->set('user', $user);
	
if ($this->request->is('post')) {
$this->Meeting->create();
if ($this->Meeting->save($this->request->data)) {
$this->Session->setFlash(__('Your meeting has been saved.'));
return $this->redirect(array('action' => 'index'));
}
$this->Session->setFlash(__('Unable to add your meeting.'));
}
}

public function edit($id = null) {
if (!$id) {
throw new NotFoundException(__('Invalid Meeting'));
}
$meeting = $this->Meeting->findById($id);
if (!$meeting) {
throw new NotFoundException(__('Invalid Meeting'));
}

$user = AuthComponent::user('username');
$this->Meeting->user = $user;

$this->set('Custquery', $this->Meeting->getCustomers());
$this->set('FAquery', $this->Meeting->getFAs());
$this->set('user', $user);


if ($this->request->is(array('Meeting', 'put'))) {
$this->Meeting->id = $id;
if ($this->Meeting->save($this->request->data)) {
$this->Session->setFlash(__('Your Meeting has been updated.'));
return $this->redirect(array('action' => 'index'));
}
$this->Session->setFlash(__('Unable to update your Meeting.'));
}
if (!$this->request->data) {
$this->request->data = $meeting;
}
}

public function delete($id) {
if ($this->request->is('get')) {
throw new MethodNotAllowedException();
}
if ($this->Meeting->delete($id)) {
$this->Session->setFlash(
__('The Meeting with id: %s has been deleted.', h($id))
);
return $this->redirect(array('action' => 'index'));
}
}

<<<<<<< HEAD
public function Calendar() {
	

}
public function test() {

if ($this->Session->read('Auth.User')) 
{

$user = AuthComponent::user('username');

$conditions = array(
    "username" => $user,
    "role" => 'admin'
);

$this->loadModel('User');
$this->Meeting->user = $user;

if ($this->User->hasAny($conditions))
{
$this->set('events', $this->Meeting->find('all'));
}
else
{
$this->set('events', $this->Meeting->find('all', array('conditions' => array("'$user' = fa"))));
}
$this->set('query', $this->Meeting->get());


}

else
{
$this->redirect(array('controller' => 'users', 'action' => 'login'));
}


}
=======
public function test() {

	}
>>>>>>> 9283f741b8c75a119d90aa68d0ac45998f85d375



} ?>
