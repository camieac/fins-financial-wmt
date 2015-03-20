<?php
App::uses('StocksHelper', 'View/Helper');
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
if($this->checkExists($value)){
if ($this->Stocklist->save($this->request->data)) {
$this->Session->setFlash(__('Your stock has been saved.'));
return $this->redirect(array('action' => 'index'));
}else{
	$this->Session->setFlash(__('Your stock could not be saved.'));
}
}else{
$this->Session->setFlash(__('Stock was not added because it does not exist.'));
}
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

function checkExists($symbol){
		//Example request https://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20yahoo.finance.stocks%20where%20symbol%3D%22kokok%22&format=json&diagnostics=true&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys&callback=
		$request = 'https://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20yahoo.finance.stocks%20where%20symbol%3D%22'.$symbol.'%22&format=json&diagnostics=true&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys&callback=';
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $request);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$output = curl_exec($ch);
		curl_close($ch);
		$exists = (strpos($output,'CompanyName') !== false);
		return $exists;
	}


} ?>
