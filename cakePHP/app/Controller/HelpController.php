<?php

// File: /app/Controller/HelpController.php
//	App::uses('Api', 'Vendor');

class HelpController extends AppController {
public $helpers = array('Html', 'Form');

public function index() {
if ($this->Session->read('Auth.User')) 
{
$user = AuthComponent::user('username');

$conditions = array(
    "username" => $user,
    "role" => 'admin'
);



}
else
{
$this->redirect(array('controller' => 'users', 'action' => 'login'));
}

}
}
?>