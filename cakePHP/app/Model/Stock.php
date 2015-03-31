<?php App::uses('Api', 'Vendor');
class Stock extends AppModel {

public $validate = array(
'company' => array(
'rule' => 'notEmpty',
'message' => 'Company name required'
),
'symbol' => array(
'rule' => 'isUnique',
'message' => 'Stock already exists.'
)
);

}
?>
