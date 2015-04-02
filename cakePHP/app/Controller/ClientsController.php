<?php
App::uses('Api', 'Vendor');
//require_once(APP . 'Vendor/twitteroauth/src/TwitterOAuth.php');
require_once(APP . 'Vendor/twitteroauth/autoload.php');
require_once(APP . 'Vendor/twitteroauth/src/TwitterOAuth.php');
use Abraham\TwitterOAuth\TwitterOAuth;
// File: /app/Controller/clientsController.php
//	App::uses('Api', 'Vendor');

class ClientsController extends AppController
{
    public $helpers = array('Html', 'Form');
    
    public function index()
    {
        $this->set('isAdmin',$this->Auth->user('role') == 'admin');
        if ($this->Session->read('Auth.User')) {
            $user = AuthComponent::user('username');
            
            $conditions = array(
                "username" => $user,
                "role" => 'admin'
            );
            
            $this->loadModel('User');
            if ($this->User->hasAny($conditions)) {
                $this->set('clients', $this->Client->find('all'));
            } else {
                $this->set('clients', $this->Client->find('all', array(
                    'conditions' => array(
                        "'$user' = fa"
                    )
                )));
            }
            
            
        } else {
            $this->redirect(array(
                'controller' => 'users',
                'action' => 'login'
            ));
        }
    }
    
    
    
    
    public function uploadImage($id)
    {
        
        // Custom
        $folderToSaveFiles = WWW_ROOT . 'img/profile_pictures/'; //removed WWW_ROOT . 
        
        if (!$this->request->is('post')) {
            $this->Session->setFlash('Image could not be uploaded, please contact your system administrator.');
            return false; // Not a POST data!
        }
        
        if (!empty($this->request->data)) {
            
            //Check if image has been uploaded
            if (!empty($this->request->data['Client']['profileImage'])) {
                
                $file = $this->request->data['Client']['profileImage']; //put the data into a var for easy use
                //debug($file);
                $ext     = $file['type']; //pathinfo($file['name'], PATHINFO_EXTENSION);
                $ext2    = pathinfo($file['name'], PATHINFO_EXTENSION);
                $arr_ext = array(
                    'image/png',
                    'image/jpeg',
                    'image/jpg'
                ); //set allowed extensions
                //only process if the extension is valid
                
                if (in_array($ext, $arr_ext)) {
                    //$this->Session->setFlash('Checked valid extension');
                    //do the actual uploading of the file. First arg is the tmp name, second arg is 
                    //where we are putting it
                    $newFilename = sha1($this->request->data['Client']['nis']); //$file['name']; // edit/add here as you like your new filename to be.

              
                    $data = array('id' => $id, 'imageName' => $newFilename. '.'.$ext2);
                    //debug($data);
					// This will update Recipe with id 10
debug($data);	try{
					$this->Client->save($data);
		}catch(Exception $e){
echo 'FAILED TO SAVE';
return false;
}
			//$user = $this->Client->read();
                   	//$id = $user['Client']['id'];

                  	// $data = array('id' => $id, 'imageName' => $newFilename. '.'.$ext2);
			//if($this->Client->save($data)){ echo 'SAVED IMAGENAME TO CLIENT';}
		   	//else { echo 'FAILED TO SAVE IMAGENAME TO CLIENT';}
                   // $user = $this->Client->read();
		    //$id = $user['Client']['id'];
		    //$user['Client']['imageName'] = $newFilename. '.'.$ext2;
	            //debug($user);
		   // if($this->Client->save($user)){ echo 'SAVED IMAGENAME TO CLIENT';}
		   // else { echo 'FAILED TO SAVE IMAGENAME TO CLIENT';}
		    //$this->Client->id = $id;
                    //$data = array('imageName' => $newFilename. '.'.$ext2);
		    //debug($data);		
		    //$this->Client->save($data);
                  
                    
                    
                    $newSaveDirectory = $folderToSaveFiles . $newFilename . '.' . $ext2;
                    
                    if (is_dir($folderToSaveFiles)) {
                        
                    } else {
                        $this->Session->setFlash('Image could not be uploaded, please contact your system administrator.');
                        return;
                    }
                    $isImage = getimagesize($file['tmp_name']);
                    
                    if (!$isImage) {
                        $this->Session->setFlash('Image could not be uploaded, please contact your system administrator.');
                        return false;
                    }
                    
                    
                    $result = move_uploaded_file($file['tmp_name'], $newSaveDirectory);
                    if ($result) {
                       //IMage has been uploaded succesfully
                        return true;
                    } else {
                        $this->Session->setFlash('Image could not be uploaded, please contact your system administrator.');
                        return false;
                    }
                    
                } else {
                    return false;
                }
            } else {
                $this->Session->setFlash('Image could not be uploaded, please contact your system administrator.');
                return false;
            }
            
            //now do the save (optional)
            //if($this->Image->save($this->data)) {
            //$this->Session->setFlash('Image saved');
            //} else {
            //$this->Session->setFlash('Image not saved');
            //}
        }
    }
    
    
    public function view($id = null)
    {
	$this->set('isAdmin',$this->Auth->user('role') == 'admin');
	$this->set('id',$id);
        $api = new Api();
        $this->set('listofstocks', $this->Client->getStockNames());
        $this->loadModel('Stocklist');
        $stocks = $this->Stocklist->find('all');
        $stocksymbols = array_column($stocks,'Stocklist');
        $stocksymbols = array_column($stocksymbols,'symbol');
        
        $stockids = array_column($stocks,'Stocklist');
        $stockids = array_column($stockids,'id');
        
        $stockdata = array_combine($stockids,$stocksymbols);
       
         $this->set('stockoptions', $stockdata);
        if ($this->Session->read('Auth.User')) {
            if (!$id) {
                throw new NotFoundException(__('Invalid client'));
            }
            $client = $this->Client->findById($id);
            if (!$client) {
                throw new NotFoundException(__('Invalid client'));
            }
            $this->loadModel('Purchase');
            $this->set('client', $client);
            $this->Client->id = $id;
	    $twitterExists = $this->Client->twitterAccountExists($this->Client->twitter);
	    $this->set('twitterExists',$twitterExists);
            $this->set('clientStocks', $this->Client->getStocks());
            if ($this->request->is('post')) {
                if (isset($this->params['data']['buy'])) {		//Buying stocks
                    $this->Purchase->create();
                    $quantity = $this->request->data['Purchase']['quantity'];
                    $stock    = $this->request->data['Purchase']['stock'];
                    $query    = $this->Client->getQuery("SELECT stocklists.symbol FROM stocklists WHERE stocklists.id = " . $stock . ";");
                    $company  = $query[0]['stocklists']['symbol'];
                    //$result   = $this->$api->getStock(array($company));
			$this->loadModel('Stocklist');
			$result = $this->Stocklist->find('first', array('conditions' => array('Stocklist.symbol' => $company)));
			$result = array_shift($result);
			//debug($result);
                    if (($result['current']) == 0 || ($result['current']) == 'N/A') {
                        $price = $quantity * $result['close'];
                    } else {
                        $price = $quantity * $result['current'];
                    }
echo 'PRICE'.$price;
debug($price);
                    if ($client['Client']['balance'] < $price) {
                        $this->Session->setFlash(__('Client does not have enough money to buy this stock.'));
                        return $this->redirect(array(
                            'action' => 'view',
                            $id
                        ));
                    }
                    if ($this->Purchase->save($this->request->data)) {
                        $this->Client->updateAll(array(
                            'Client.balance' => 'Client.balance - ' . $price
                        ), array(
                            'Client.id' => $id
                        ));
                        $pid = $this->Purchase->getLastInsertID();
                        $this->Purchase->updateAll(array(
                            'Purchase.price' => $price
                        ), array(
                            'Purchase.id' => $pid
                        ));
                        $this->Session->setFlash(__('Your transaction has been processed.'));
                        return $this->redirect(array(
                            'action' => 'view',
                            $id
                        ));
                    }
                    $this->Session->setFlash(__('Unable to add your stock.'));
                }
                
                
                if (isset($this->params['data']['sell'])) {	//Selling a stock                    $this->Purchase->create();
                    $quantity = $this->request->data['Purchase']['quantity'];
                    $rowid    = $this->request->data['Purchase']['id'];
                    $query    = $this->Client->getQuery("SELECT purchases.quantity, stocklists.symbol FROM purchases, stocklists WHERE purchases.id = " . $rowid . " AND purchases.stock = stocklists.id;");
                    $company  = $query[0]['stocklists']['symbol'];
		    $this->loadModel('Stocklist');
                    $result = $this->Stocklist->find('first', array('conditions' => array('Stocklist.symbol' => $company)));
		    $result = array_shift($result);
                    if (($result['current']) == 0 || ($result['current']) === 'N/A') {
                        $price = $quantity * $result['close'];
                    } else {
                        $price = $quantity * $result['current'];
                    }
                    if ($quantity > $query[0]['purchases']['quantity']) {
                        $this->Session->setFlash(__('Client does not have this many stocks.'));
                        return $this->redirect(array(
                            'action' => 'view',
                            $id
                        ));
                    }
                    
                    if ($this->Purchase->save($this->request->data)) {
                        if ($quantity < $query[0]['purchases']['quantity']) {
                            $newQuan = $query[0]['purchases']['quantity'] - $quantity;
                            $this->Client->updateAll(array(
                                'Client.balance' => 'Client.balance + ' . $price
                            ), array(
                                'Client.id' => $id
                            ));
                            $this->Purchase->updateAll(array(
                                'Purchase.quantity' => $newQuan
                            ), array(
                                'Purchase.id' => $rowid
                            ));
                            return $this->redirect(array(
                                'action' => 'view',
                                $id
                            ));
                        }
                        
                        
                        if ($quantity == $query[0]['purchases']['quantity']) {
                            $this->Client->updateAll(array(
                                'Client.balance' => 'Client.balance + ' . $price
                            ), array(
                                'Client.id' => $id
                            ));
                            /*$this->Purchase->delete(array(
                                'Purchase.id' => $rowid
                            ));*/
                            return $this->redirect(array(
                                'action' => 'view',
                                $id
                            ));
                        }
                    }
                    
                    
                }
            }
            
            
            $twitteruser = $client['Client']['twitter'];
            
            $notweets          = 10;
            $consumerkey       = 'TesESdfreMqIMbSoiVxcRXrhv';
            $consumersecret    = 'b6RZHOVRzkaGLglmzJ7bVxYiw3E0EZmQYpvnXrWJtschBeiSWi';
            $accesstoken       = '47281927-E5iae83zOv2Pa5Sp7SohUZzvFFepFMwmvnobHOGjZ';
            $accesstokensecret = 'YODdoXXkQpziThq9synzUhMRjpuonVWPAlhyXCf5psIVS';
            $connection        = new TwitterOAuth($consumerkey, $consumersecret, $accesstoken, $accesstokensecret);
            $requestURL        = 'https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=' . $twitteruser . '&count=' . $notweets;
            
            $usertime = $connection->get("statuses/user_timeline", array(
                "screen_name" => $twitteruser,
                "count" => 25,
                "exclude_replies" => true
            ));
            
            $this->set('twitter_timeline', json_encode($usertime));
            ;
            
        }
    }
    
    
    public function add()
    {
        
        $this->set('FAquery', $this->Client->getFAs());
        if ($this->request->is('post')) {
            $this->Client->create();
            //$date = date('Y-m-d H:i:s');
		//$this->request->data = array_push($this->request->data,array('created' => $date));
            //$this->Client->set('imageName', 'New title for the article');
//debug($this->request->data);
            try {
                $test = $this->Client->save($this->request->data);
	$this->uploadImage($this->Client->id);
            }
            catch (Exception $e) {
                $this->Session->setFlash(__('Invalid National Insurance Number'));
		echo $e->getMessage();
                // The exact error message is $e->getMessage();
                return;
            }
            if ($test) {
                $this->Session->setFlash(__('Your client has been saved.'));
                
                //$this->Session->setFlash(__('File upload:'.$success));
                
                return $this->redirect(array(
                            'action' => 'index'
                        ));
                
                $this->set('FAquery', $this->Client->getFAs());
                
                
            }
        }
	
    }
public function edit($id = null) {
	
if (!$id) {
throw new NotFoundException(__('Invalid Client'));
}
$client = $this->Client->findById($id);
if (!$client) {
throw new NotFoundException(__('Invalid Client'));
}
$this->set('FAquery', $this->Client->getFAs());
if ($this->request->is(array('Client', 'put'))) {
$this->Client->id = $id;
$success = $this->Client->save($this->request->data);
//$this->uploadImage($id);
if ($success) {

$this->Session->setFlash(__('Your Client has been updated.'));

return $this->redirect(array('action' => 'index'));
}
$this->Session->setFlash(__('Unable to update your Client.'));
}
if (!$this->request->data) {
$this->request->data = $client;
}
}
    
    
    public function delete($id, $name)
    {
        
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }
	$data = array('id' => $id, 'fa' => 0);
        if ($this->Client->save($data)) {
            $this->Session->setFlash(__('%s has been deleted.', h($name)));
            return $this->redirect(array(
                'action' => 'index'
            ));
        }
    }
    
    
    public function deleteStock($id, $custid)
    {
        
        $this->loadModel('Purchase');
        
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }
        if ($this->Purchase->delete($id)) {
            $this->Session->setFlash(__('The Stock with id: %s has been deleted.', h($id)));
            return $this->redirect(array(
                'action' => 'view',
                $custid
            ));
        }
    }
    
    
    
    
    
    
    
    
    
    
    
}
?>
