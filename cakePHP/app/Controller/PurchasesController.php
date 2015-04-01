<?php
App::uses('Api', 'Vendor');
// File: /app/Controller/PurchasesController.php

class PurchasesController extends AppController {
public $helpers = array('Html', 'Form');

public function index() {
	$api = new Api();
	$this->set('api',$api);
	if ($this->Session->read('Auth.User')) {
	
		$userID = AuthComponent::user('id');
		$username = AuthComponent::user('username');
		$role = AuthComponent::user('role');
		$this->loadModel('Meeting');
		$allData = $this->Purchase->get();
		$purchases = array();
		$clients = array();
		$stocks = array();
		foreach($allData as $item){
			if($item['clients']['fa'] == $username || $role == 'admin'){
				$purchases[] = $item['purchases'];
				$clients[] = $item['clients'];
				$stocks[] = $item['stocklists'];
			}
		}
		$length = sizeof($clients);
		$this->set('purchases', $purchases );
		$this->set('clients', $clients );
		$this->set('stocks', $stocks );
		$this->set('length', $length );

		//debug($purchases);
		//debug($clients);
		//debug($stocks);
		//debug($length);
	}else{
		$this->redirect(array('controller' => 'users', 'action' => 'login'));
	}
}

public function sell(){
$this->autoRender = false;
$data = $this->request->data;
$id = $data['Purchase']['id'];
$balance = $data['Purchase']['balance'];
debug($data);
$this->Purchase->create();

if($this->Purchase->save($data)) echo 'save success';
else echo 'save fail';

//$this->redirect(array('controller' => 'clients', 'action' => 'view/'.$id));
}


public function buy(){
$this->autoRender = false;
$data = $this->request->data;
$id = $data['Purchase']['id'];
$balance = $data['Purchase']['balance'];
$cost = $data['Purchase']['price']*$data['Purchase']['quantity'];
if($balance >= $cost){			//If we have enough money
	$this->Purchase->create();
	if($this->Purchase->save($data)){ echo 'save success';}
	else{ echo 'save fail';}
}else{
	echo 'save not valid';
}echo 'save fail';

//$this->redirect(array('controller' => 'clients', 'action' => 'view/'.$id));
}
} ?>

























