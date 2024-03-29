<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('AppController', 'Controller','Xml','Utility');


/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController {

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array();

/**
 * Displays a view
 *
 * @param mixed What page to display
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
	public function display() {
		//$stockTitles = array($user['User']['index1'],$user['User']['index2'],$user['User']['index3'],$user['User']['index4'])
		//$this->set('homeStock', $stockTitles);
 		$this->set('financialTimes', $this->getFTFeed());
		$path = func_get_args();
		$this->getHomeSettings();
		$count = count($path);
		if (!$count) {
			return $this->redirect('/');
		}
		$page = $subpage = $title_for_layout = null;

		if (!empty($path[0])) {
			$page = $path[0];
		}
		if (!empty($path[1])) {
			$subpage = $path[1];
		}
		if (!empty($path[$count - 1])) {
			$title_for_layout = Inflector::humanize($path[$count - 1]);
		}
		$this->set(compact('page', 'subpage', 'title_for_layout'));

		try {
			$this->render(implode('/', $path));
		} catch (MissingViewException $e) {
			if (Configure::read('debug')) {
				throw $e;
			}
			throw new NotFoundException();
		}
	}



public function getFTFeed(){
 App::import('Utility', 'Xml');
	$this->autoRender = false;
	$url = "http://www.ft.com/rss/home/uk";
	$parsed_xml = $xml = Xml::build($url);
	$array = Xml::toArray($parsed_xml);
	// $xml now is a instance of SimpleXMLElement
	
	//$parsed_xml =& new XML($url);
	return $array;
    //$feed = Xml::toArray(Xml::build(Configure::read($feed)));
}

public function getHomeSettings(){
$this->loadModel('User');
$userId = $this->Auth->user('id');
$user = $this->User->findById($userId);
$this->set('index1', $user['User']['index1']);
$this->set('index2', $user['User']['index2']);
$this->set('index3', $user['User']['index3']);
$this->set('index4', $user['User']['index4']);
$this->set('home_twitter', $user['User']['home_twitter']);
$this->set('indexDisplay', $user['User']['indexDisplay']);

}
}
