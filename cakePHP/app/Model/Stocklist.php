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
public function checkUpdates(){
$symbol = array('AAPL');
$api = new Api();

$stock = $api->get($symbol);
$stock = $stock[0];
debug($stock);
	$current = $stock['current'];
debug($current);
	$open = $stock['open'];
	$close = $stock['close'];
	$high = $stock['high'];
	$low = $stock['low'];

	$this->saveField('current', $current);
	$this->saveField('open', $open);
	$this->saveField('low', $low);
	$this->saveField('high', $high);
	$this->saveField('close', $close);
}
}
?>
