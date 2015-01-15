<?php

// File: /app/Controller/StocksController.php

class StocksController extends AppController {
public $helpers = array('Html', 'Form');

public function index() {
	
if ($this->Session->read('Auth.User')) 
{
//$this->set('stocks', $this->Stock>find('all')); need table of stocks from client
}
else
{
$this->redirect(array('controller' => 'users', 'action' => 'login'));
}
}


} ?>
