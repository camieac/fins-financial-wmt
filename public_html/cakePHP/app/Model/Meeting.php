<?php class Meeting extends AppModel {
public $validate = array(
'name' => array(
'rule' => 'notEmpty'
),
'description' => array(
'rule' => 'notEmpty'
),
'dateMeeting' => array(
'rule' => 'notEmpty'
),
);
}
?>
