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
'nis' => array(
'rule' => 'notEmpty'
),
'phoneNo' => array(
    'Numeric' => array(
        'rule' => 'numeric',
        'message' => 'Please use only numbers.'
    ),
    'Not empty' => array(
        'rule' => 'notEmpty',
        'message' => 'Please enter your phonenumber.'
    ),
),
'address' => array(
'rule' => 'notEmpty'
),
'fa' => array(
'rule' => 'notEmpty'
)
);

     public function getFAs()
    {
       return $this->query("SELECT fas.name, fas.username FROM fas");
    }

}
?>
