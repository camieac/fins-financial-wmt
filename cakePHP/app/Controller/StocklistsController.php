<?php
App::uses('StocksHelper', 'View/Helper');
App::uses('Api', 'Vendor');
// File: /app/Controller/StocklistsController.php

class StocklistsController extends AppController
{
    public $helpers = array('Html', 'Form');

    public function prepareStockJSON(){
	$this->loadModel('Stock');
	$jsonStocks = ($this->Stock->find('all'));
	foreach($jsonStocks as $stock){
		$properJSON[] = array('label' =>$stock['Stock']['symbol'],'desc' =>$stock['Stock']['company']);
	}
	$properJSON = json_encode($properJSON);
	$this->set('jsonStocks', $properJSON);
    }
   
    public function index()
    {
        if ($this->Session->read('Auth.User')) {
            $this->prepareStockJSON();
            
            $this->loadModel('User');
            
            $this->set('stocklists', $this->Stocklist->find('all'));
            //$this->Stocklist->checkUpdates(); //Update stocks 
            
            if ($this->request->is('post')) {
                $value = $this->request->data['Stocklist']['symbol'];
                
                $this->set('companySym', $value);
                
                $this->Stocklist->create();
		$api = new Api();
                if ($api->checkExists($value)) {
                    if ($this->Stocklist->save($this->request->data)) {
                        $this->Session->setFlash(__('Your stock has been saved.'));
                        return $this->redirect(array(
                            'action' => 'index'
                        ));
                    } else {
                        $this->Session->setFlash(__('Your stock could not be saved.'));
                    }
                } else {
                    $this->Session->setFlash(__('Stock was not added because it does not exist.'));
                }
            }
            
            
        }
        
        else {
            $this->redirect(array(
                'controller' => 'users',
                'action' => 'login'
            ));
        }
    }
    public function update(){
		$this->autoRender = false;
		$id = $this->request->query['id'];
		$stock = $this->Stocklist->find('first', array('conditions'=>array('Stocklist.id' => $id)));
		$this->Stocklist->checkUpdate($stock); //Update stock
		$this->redirect(array(
                'controller' => 'stocklists',
                'action' => 'index'
            ));
    }
    public function delete($id)
    {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }
        if ($this->Stocklist->delete($id)) {
            $this->Session->setFlash(__('The stock with id: %s has been deleted.', h($id)));
            return $this->redirect(array(
                'action' => 'index'
            ));
        }
    }
    
    public function view()
    {
        $stock = $this->request->query['stock'];
        if ($this->Session->read('Auth.User')) {
            $this->set('stock', $this->Stocklist->find('all'));
            $this->set('rss', $this->getRSS($stock));
        } else {
            $this->redirect(array(
                'controller' => 'users',
                'action' => 'login'
            ));
        }
    }
    
    public function quickview()
    {
        if ($this->Session->read('Auth.User')) {
            $this->set('stock', $this->Stocklist->find('all'));
        } else {
            $this->redirect(array(
                'controller' => 'users',
                'action' => 'login'
            ));
        }
    }
    
    
    
    function getRSS($symbol)
    {
        //Example request http://finance.yahoo.com/rss/headline?s=ticker(s)
        $request = 'http://finance.yahoo.com/rss/headline?s=' . $symbol;
        $output = $xml = Xml::build($request);
        $output = Xml::toArray($output);
        //debug($output);
        return $output;
    }
    
    
}
?>
