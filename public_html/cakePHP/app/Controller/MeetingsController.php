<?php

// File: /app/Controller/MeetingsController.php

class MeetingsController extends AppController {
public $helpers = array('Html', 'Form');

public function index() {
if ($this->Session->read('Auth.User')) 
{


$this->loadModel('User');

$this->set('meetings', $this->Meeting->find('all'));

$this->set('query', $this->Meeting->get());

}

else
{
$this->redirect(array('controller' => 'users', 'action' => 'login'));
}
}



public function add() {
	
$this->set('Custquery', $this->Meeting->getCustomers());
$this->set('FAquery', $this->Meeting->getFAs());
	
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

$this->set('Custquery', $this->Meeting->getCustomers());
$this->set('FAquery', $this->Meeting->getFAs());


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


} ?>
