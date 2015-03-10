<?php
App::uses('Xml', 'Utility');
	
class HomeController extends AppController {
public $helpers = array('Html', 'Form');

public function index(){
}
public function getFTFeed(){
	$this->autoRender = false;
	$url = "http://www.ft.com/rss/home/uk";
	$parsed_xml = $xml = Xml::build($url);
	// $xml now is a instance of SimpleXMLElement
	
	//$parsed_xml =& new XML($url);
	return $parsed_xml + "Hello";
    //$feed = Xml::toArray(Xml::build(Configure::read($feed)));
}
}