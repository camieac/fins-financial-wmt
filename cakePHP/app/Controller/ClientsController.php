<?php
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
    
    
    
    
    public function uploadImage()
    {
        $this->Session->setFlash('starting uploading function...');
        // Custom
        $folderToSaveFiles = WWW_ROOT . 'img/profile_pictures/'; //removed WWW_ROOT . 
        $this->Session->setFlash('Got path');
        if (!$this->request->is('post')) {
            $this->Session->setFlash('NOT A POST');
            return false; // Not a POST data!
        }
        $this->Session->setFlash('Checked post');
        if (!empty($this->request->data)) {
            $this->Session->setFlash('Checked data');
            //Check if image has been uploaded
            if (!empty($this->request->data['Client']['profileImage'])) {
                $this->Session->setFlash('Checked image');
                $file = $this->request->data['Client']['profileImage']; //put the data into a var for easy use
                debug($file);
                $ext     = $file['type']; //pathinfo($file['name'], PATHINFO_EXTENSION);
                $ext2    = pathinfo($file['name'], PATHINFO_EXTENSION);
                $arr_ext = array(
                    'image/png',
                    'image/jpeg',
                    'image/jpg'
                ); //set allowed extensions
                //only process if the extension is valid
                $this->Session->setFlash('Type:' . $ext);
                if (in_array($ext, $arr_ext)) {
                    //$this->Session->setFlash('Checked valid extension');
                    //do the actual uploading of the file. First arg is the tmp name, second arg is 
                    //where we are putting it
                    $newFilename = sha1($this->request->data['Client']['nis']); //$file['name']; // edit/add here as you like your new filename to be.
                    $this->Client->set('imageName', $newFileName . '.' . $ext2);
                    
                    //$this->Client->setProfileImageName($newFileName . '.' . $ext2);
                    $this->Session->setFlash('new FileName:' . $newFilename);
                    
                    $newSaveDirectory = $folderToSaveFiles . $newFilename . '.' . $ext2;
                    $this->Session->setFlash('save directory:' . $newSaveDirectory);
                    if (is_dir($folderToSaveFiles)) {
                        $this->Session->setFlash('isDIr');
                    } else {
                        $this->Session->setFlash('Specifies save directory is not a directory');
                        return;
                    }
                    $isImage = getimagesize($file['tmp_name']);
                    debug($isImage);
                    if (!$isImage) {
                        $this->Session->setFlash('File was not an image.');
                        return;
                    }
                    $this->Session->setFlash('tmp name:' . $file['tmp_name']);
                    
                    $result = move_uploaded_file($file['tmp_name'], $newSaveDirectory);
                    if ($result) {
                        $this->Session->setFlash('File uploaded to ' . $newSaveDirectory);
                    } else {
                        $this->Session->setFlash('Directory: ' . $newSaveDirectory . ' name ' . $file['tmp_name']);
                    }
                    debug($result);
                    //prepare the filename for database entry (optional)
                    //$this->data['Image']['image'] = $file['name'];
                } else {
                    return false;
                }
            } else {
                $this->Session->setFlash('Image has not been uploaded');
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
        
        $this->set('listofstocks', $this->Client->getStockNames());
        
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
            $this->set('query', $this->Client->getStocks());
            if ($this->request->is('post')) {
                if (isset($this->params['data']['buy'])) {
                    $this->Purchase->create();
                    $quantity = $this->request->data['Purchase']['quantity'];
                    $stock    = $this->request->data['Purchase']['stock'];
                    $query    = $this->Client->getQuery("SELECT stocklists.symbol FROM stocklists WHERE stocklists.id = " . $stock . ";");
                    $company  = $query[0]['stocklists']['symbol'];
                    $result   = $this->getStock(array(
                        $company
                    ));
                    if (($result[0]['current']) === '0.00' || ($result[0]['current']) === 'N/A') {
                        $price = $quantity * $result[0]['close'];
                    } else {
                        $price = $quantity * $result[0]['current'];
                    }
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
                        $this->Session->setFlash(__('Your stock has been saved.'));
                        return $this->redirect(array(
                            'action' => 'view',
                            $id
                        ));
                    }
                    $this->Session->setFlash(__('Unable to add your stock.'));
                }
                
                
                if (isset($this->params['data']['sell'])) {
                    $this->Purchase->create();
                    $quantity = $this->request->data['Purchase']['quantity'];
                    $rowid    = $this->request->data['Purchase']['id'];
                    $query    = $this->Client->getQuery("SELECT purchases.quantity, stocklists.symbol FROM purchases, stocklists WHERE purchases.id = " . $rowid . " AND purchases.stock = stocklists.id;");
                    $company  = $query[0]['stocklists']['symbol'];
                    $result   = $this->getStock(array(
                        $company
                    ));
                    if (($result[0]['current']) === '0.00' || ($result[0]['current']) === 'N/A') {
                        $price = $quantity * $result[0]['close'];
                    } else {
                        $price = $quantity * $result[0]['current'];
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
                            $this->Purchase->delete(array(
                                'Purchase.id' => $rowid
                            ));
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
            $this->Client->set('imageName', 'New title for the article');
            try {
                $test = $this->Client->save($this->request->data);
            }
            catch (Exception $e) {
                $this->Session->setFlash(__('Invalid National Insurance Number'));
                // The exact error message is $e->getMessage();
                return;
            }
            if ($test) {
                $this->Session->setFlash(__('Your client has been saved.'));
                $success = $this->uploadImage();
                //$this->Session->setFlash(__('File upload:'.$success));
                
                
                
                $this->set('FAquery', $this->Client->getFAs());
                
                if ($this->request->is('post')) {
                    $this->Client->create();
                    if ($this->Client->save($this->request->data)) {
                        $this->Session->setFlash(__('Your client has been saved.'));
                        
                        return $this->redirect(array(
                            'action' => 'index'
                        ));
                    }
                    $this->Session->setFlash(__('Unable to add your client.'));
                }
            }
        }
    }
    public function edit($id = null)
    {
        
        if (!$id) {
            throw new NotFoundException(__('Invalid Client'));
        }
        $client = $this->Client->findById($id);
        if (!$client) {
            throw new NotFoundException(__('Invalid Client'));
            
        }
        
        $this->set('FAquery', $this->Client->getFAs());
        
        if ($this->request->is(array(
            'Client',
            'put'
        ))) {
            $this->Client->id = $id;
            if ($this->Client->save($this->request->data)) {
                $this->Session->setFlash(__('Your Client has been updated.'));
                
                $this->uploadImage();
                
                
                return $this->redirect(array(
                    'action' => 'index'
                ));
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
        if ($this->Client->delete($id)) {
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
    
    
    
    function getStock($symbols = array())
    {
        $limit  = 200;
        $chunks = ceil(count($symbols) / $limit);
        $stocks = array();
        for ($i = 0; $i < $chunks; $i++) {
            $offset         = (count($symbols) - ($i * $limit) > $limit) ? $limit : count($symbols) - ($i * $limit);
            $subset_symbols = array_slice($symbols, $i * $limit, $offset);
            $request        = 'http://download.finance.yahoo.com/d/quotes.csv?s=';
            foreach ($subset_symbols as $s)
                $request .= $s . '+';
            $request = substr($request, 0, strlen($request) - 1);
            $request .= '&f=nsc6b2ophgd1';
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $request);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $output = curl_exec($ch);
            curl_close($ch);
            $splits = explode("\n", $output);
            foreach ($splits as $s) {
                if (strlen($s) > 0) {
                    $s_data   = explode(',', $s);
                    $stocks[] = array(
                        'name' => $s_data[0],
                        'symbol' => $s_data[1],
                        'change' => $s_data[2],
                        'current' => $s_data[3],
                        'open' => $s_data[4],
                        'close' => $s_data[5],
                        'high' => $s_data[6],
                        'low' => $s_data[7],
                        'date' => $s_data[8]
                    );
                }
            }
        }
        return $stocks;
    }
    
    
    function twitterAccountExists($username)
    {
        $headers = get_headers("https://twitter.com/" . $username);
        if (strpos($headers[0], '404') !== false) {
            return false; //404 found
        } else {
            return true;
        }
    }
    
    
    
    
}
?>
