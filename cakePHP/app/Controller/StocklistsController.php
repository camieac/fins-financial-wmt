<?php

// File: /app/Controller/StocklistsController.php

class StocklistsController extends AppController {
public $helpers = array('Html', 'Form');

public function index() {
if ($this->Session->read('Auth.User')) 
{


$this->loadModel('User');

$this->set('stocklists', $this->Stocklist->find('all'));

if ($this->request->is('post')) 
{
$value = $this->request->data['Stocklist']['symbol'];

$this->set('companySym', $value);

$this->Stocklist->create();
if ($this->Stocklist->save($this->request->data)) {
$this->Session->setFlash(__('Your stock has been saved.'));
return $this->redirect(array('action' => 'index'));
}
$this->Session->setFlash(__('Unable to add your stock.'));
}


}

else
{
$this->redirect(array('controller' => 'users', 'action' => 'login'));
}
}

public function delete($id) {
if ($this->request->is('get')) {
throw new MethodNotAllowedException();
}
if ($this->Stocklist->delete($id)) {
$this->Session->setFlash(
__('The stock with id: %s has been deleted.', h($id))
);
return $this->redirect(array('action' => 'index'));
}
}

public function view() {
if ($this->Session->read('Auth.User')) {
	$this->set('stock', $this->Stocklist->find('all'));
}
else{
	$this->redirect(array('controller' => 'users', 'action' => 'login'));
}
}

public function quickview() {
if ($this->Session->read('Auth.User')) {
	$this->set('stock', $this->Stocklist->find('all'));
}
else{
	$this->redirect(array('controller' => 'users', 'action' => 'login'));
}
}


} ?>
