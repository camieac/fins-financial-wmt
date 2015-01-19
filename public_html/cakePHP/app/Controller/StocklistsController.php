<?php

// File: /app/Controller/StocklistsController.php

class StocklistsController extends AppController {
public $helpers = array('Html', 'Form');

public function index() {
if ($this->Session->read('Auth.User')) 
{


$this->loadModel('User');

$this->set('stocklists', $this->Stocklist->find('all'));

//$this->Stocklist->read(null, $stocklist['Stocklist']['id']);
//$this->Stocklist->set('price', $stock['open']);
//$this->Stocklist->save();
}

else
{
$this->redirect(array('controller' => 'users', 'action' => 'login'));
}
}


public function add() {
if ($this->request->is('post')) {
$this->Stocklist->create();
if ($this->Stocklist->save($this->request->data)) {
$this->Session->setFlash(__('Your stock has been saved.'));
return $this->redirect(array('action' => 'index'));
}
$this->Session->setFlash(__('Unable to add your stock.'));
}
}

public function edit($id = null) {
if (!$id) {
throw new NotFoundException(__('Invalid stock'));
}
$stocklist = $this->Stocklist->findById($id);
if (!$stocklist) {
throw new NotFoundException(__('Invalid stock'));
}
if ($this->request->is(array('stockList', 'put'))) {
$this->Stocklist->id = $id;
if ($this->Stocklist->save($this->request->data)) {
$this->Session->setFlash(__('Your stock has been updated.'));
return $this->redirect(array('action' => 'index'));
}
$this->Session->setFlash(__('Unable to update your stock.'));
}
if (!$this->request->data) {
$this->request->data = $stocklist;
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
if ($this->Session->read('Auth.User')) 
{
$this->set('stock', $this->Stocklist->find('all'));
}
else
{
$this->redirect(array('controller' => 'users', 'action' => 'login'));
}
}


} ?>
