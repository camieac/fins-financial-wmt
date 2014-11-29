<?php class Client extends AppModel {
public $validate = array(
'name' => array(
'rule' => 'notEmpty'
),
'gender' => array(
'rule' => 'notEmpty'
),
'dateOfBirth' => array(
'rule' => 'notEmpty'
),
'phoneNo' => array(
'rule' => 'notEmpty'
),
'address' => array(
'rule' => 'notEmpty'
),
'fa' => array(
'rule' => 'notEmpty'
)
);
}
?>
