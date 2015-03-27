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
public function checkUpdates($id){
	$symbol = array('AAPL');
	$api = new Api();

	$stock = $api->get($symbol);
	$stock = $stock[0];

	foreach ($stock as $item){
		if(strcmp($item,'N/A') != 0){
			 $item = null;
		}
	}
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
	$symbol = str_replace('"','',$symbol);
	$date = str_replace('"','',$date);
	if($current == 'N/A'){ $current = 0;}
	if($change == 'N/A'){ $change = 0;}
	

	$data = array('id' => $id,'name' => $name,'symbol' => $symbol,'change' => $change, 'current' => $current,'open' => $open,'close' => $close,'high' => $high,'low' => $low,'date' => $date);
debug($data);
	$this->save($data);

	//$this->saveField('current', $current);
	//$this->saveField('open', $open);
	//$this->saveField('low', $low);
	//$this->saveField('high', $high);
	//$this->saveField('close', $close);
}
}
?>
