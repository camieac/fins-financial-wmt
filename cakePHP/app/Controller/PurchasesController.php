<?php

// File: /app/Controller/PurchasesController.php

class PurchasesController extends AppController {
public $helpers = array('Html', 'Form');

public function index() {
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

<<<<<<< HEAD
} ?>
=======
} ?>
>>>>>>> 9283f741b8c75a119d90aa68d0ac45998f85d375
