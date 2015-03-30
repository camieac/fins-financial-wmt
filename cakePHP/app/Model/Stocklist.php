<?php App::uses('Api', 'Vendor');
class Stocklist extends AppModel {

public $validate = array(
'symbol' => array(
'rule' => 'isUnique',
'message' => 'Stock already exists'
),
'name' => array(
'rule' => 'notEmpty'
)
);
public function checkId(){
	$id = $this->id;
	$this->autoRender = false;
	$stock = $this->find('first', array('conditions'=>array('Stocklist.id' => $id)));
	$this->checkUpdate($stock); //Update stocks 
}
public function checkUpdates(){
	$allStocks = $this->find('all');
	foreach($allStocks as $s){
		$this->checkUpdate($s);
	}
}

public function checkUpdate($s){ //Input parameter is the stock array
		$id = $s['Stocklist']['id'];
		$symbol = $s['Stocklist']['symbol'];
		$api = new Api();
		$stock = $api->get(array($symbol));
		unset($api); //Free variable to prevent memory leak.
			
		$stock = $stock[0];

		$name = $stock['name'];
		$symbol = $stock['symbol'];
		$change = $stock['change'];
		$current = $stock['current'];
		$open = $stock['open'];
		$close = $stock['close'];
		$high = $stock['high'];
		$low = $stock['low'];
		$date = $stock['date'];

		//Input validation
		$name = str_replace('"','',$name);
		$name = str_replace(',','',$name);
		$symbol = str_replace('"','',$symbol);
		if($change == 'N/A'){ $change = 0;}
		if($current == 'N/A'){ $current = 0;}
		if($open == 'N/A'){ $open = 0;}
		if($close == 'N/A'){ $close = 0;}
		if($high == 'N/A'){ $high = 0;}
		if($low == 'N/A'){ $low = 0;}
		$date = str_replace('"','',$date);
		$this->clear(); //reset model state and clear out any unsaved data and validation errors.
		//Construct array of stock data
		$data = array('id' => $id,'name' => $name,'symbol' => $symbol,'change' => $change, 'current' => $current,'open' => $open,'close' => $close,'high' => $high,'low' => $low,'date' => $date);
		
		//Only update data if new data is available.
		if($date != $s['Stocklist']['date']){ $this->save($data);}
}
}
?>
