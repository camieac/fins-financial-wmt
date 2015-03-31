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
$events = $this->Meeting->find('all');
}
else
{
$events = $this->Meeting->find('all', array('conditions' => array("'$user' = fa")));
}
$this->set('events', $events);
$clientNames = array();
$this->loadModel('Client');
foreach($events as $event){
//debug($event);
$cID = $event['Meeting']['customer'];
$fID = $event['Meeting']['fa'];
//debug($cID);
$clientNames[] = $this->Client->find('first', array(
        'conditions' => array('Client.id' => $cID)
    ));
$faNames[] = $this->User->find('first', array(
        'conditions' => array('User.id' => $fID)
    ));
}
//debug($clientNames);
$this->set('clients', $clientNames);
$this->set('fas', $faNames);
//debug($this->Meeting->get());
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
$this->loadModel('Client');
$this->set('customer', $this->Client->find('all'));
$this->loadModel('User');
$this->set('fa', $this->User->find('all'));
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
$this->loadModel('Client');
$this->set('customer', $this->Client->find('all'));
$this->loadModel('User');
$this->set('fa', $this->User->find('all'));
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
__('The Meeting has been deleted.')
);
return $this->redirect(array('action' => 'index'));
}
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





} ?>
