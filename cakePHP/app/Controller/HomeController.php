<?php
App::uses('Xml', 'Utility','Rss');
	
class HomeController extends AppController {
public $helpers = array('Html', 'Form');

public function index(){
	if ($this->Session->read('Auth.User')) {

$user = AuthComponent::user('username');
$this->set('user',$user);
debug($user);
$chartData = array();
$this->set('chartData',$chartData);
	
}else{
	$this->redirect(array('controller' => 'users', 'action' => 'login'));
}
}
public function getFTFeed(){
	$this->autoRender = false;
	$url = "http://www.ft.com/rss/home/uk";
	$parsed_xml = $xml = Xml::build($url);
	$array = Xml::toArray($parsed_xml);
	// $xml now is a instance of SimpleXMLElement
	
	//$parsed_xml =& new XML($url);
	return $array;
    //$feed = Xml::toArray(Xml::build(Configure::read($feed)));
}
}
