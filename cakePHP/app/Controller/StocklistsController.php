<?php
App::uses('StocksHelper', 'View/Helper');
App::uses('Api', 'Vendor');
// File: /app/Controller/StocklistsController.php

class StocksController extends AppController
{
    public $helpers = array('Html', 'Form');
    
    public function scrape() {
ini_set('max_execution_time', 300);
		/*https://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20yahoo.finance.industry%20where%20id%3D%22113%22&format=json&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys&callback=
	*/
			$data = array();
			$api = new Api();
			$r ='https://query.yahooapis.com/v1/public/yql?q=';
			$b = 'select%20*%20from%20yahoo.finance.industry%20where%20id%3D%22';
			$a = '%22&format=json&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys&callback=';
			for ($id = 110; $id <= 210; $id++) {
				$request = $r.$b.$id.$a;
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, $request);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				$output = curl_exec($ch);
				
				$idata = array_shift(json_decode($output,true));
				$idata = $idata['results']['industry']['company'];
				foreach($idata as $stock){
					$findTest = $this->Stock->find('first', array(
					'conditions' => array('Stock.symbol' => $stock['symbol'])
					));
					if(empty($findTest)){
						if($api->checkExists($stock['symbol'])){
							$this->Stock->create();
							try{
								$this->Stock->save(array('company'=>$stock['name'],'symbol' =>$stock['symbol']));
							}catch(Exception $e){
								echo 'Database error'.PHP_EOL;
							}
						echo '********'.$stock['name']. ' added********<br/>'.PHP_EOL;
						}
					}else{
						//echo $stock['name']. 'skipped, already exists'.PHP_EOL;
					}
				
				}
				curl_close($ch);
				
			}
			
		
		
		//return $stocks;
	}
    public function index()
    {
        if ($this->Session->read('Auth.User')) {
            
            
            $this->loadModel('User');
            
            $this->set('stocklists', $this->Stocklist->find('all'));
            //$this->Stocklist->checkUpdates(); //Update stocks 
            
            if ($this->request->is('post')) {
                $value = $this->request->data['Stocklist']['symbol'];
                
                $this->set('companySym', $value);
                
                $this->Stocklist->create();
                if ($this->checkExists($value)) {
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
    
    
    
}
?>
