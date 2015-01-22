<?php class Stocklist extends AppModel {
public $validate = array(
'symbol' => array(
'rule' => 'notEmpty'
),
'name' => array(
'rule' => 'notEmpty'
)
);

}
?>
