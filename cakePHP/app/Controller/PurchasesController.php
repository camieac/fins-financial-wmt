<?php
App::uses('Api', 'Vendor');
// File: /app/Controller/PurchasesController.php

class PurchasesController extends AppController {
public $helpers = array('Html', 'Form');

public function index() {
$api = new Api();
$this->set('api',$api);
if ($this->Session->read('Auth.User')) 
{
	
	
$this->loadModel('User');

$this->set('purchases', $this->Purchase->find('all'));

$this->set('query', $this->Purchase->get());

}

else
{
$this->redirect(array('controller' => 'users', 'action' => 'login'));
}
}

} ?>

