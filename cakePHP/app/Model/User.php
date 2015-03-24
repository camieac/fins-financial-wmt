<?php // app/Model/User.php
App::uses('AppModel', 'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

class User extends AppModel {
	public $validate = array(
		'username' => array(
			'required' => array(
				'rule' => array('notEmpty'),
				'message' => 'A username is required'
           		)
        	),
		'password' => array(
			'required' => array(
				'rule' => array('notEmpty'),
				'message' => 'A password is required'
            		)
       		),
        	'role' => array(
            		'valid' => array(
                		'rule' => array('inList', array('admin', 'fa')),
                		'message' => 'Please enter a valid role',
                		'allowEmpty' => false
            		)
        	),
		'current_password' => array(
			'valid' => array(
        			'rule' => 'checkCurrentPassword',
        			'message' => 'Password invalid'
			)
		),
		'password1' => array(
			'valid' => array(
				'rule' => 'checkPasswordStrength',
				'message' => 'Your password is too weak',
			)
		),
	 	'password2' => array(
			'valid' => array(
				'rule' => 'passwordsMatch',
				'message' => 'Passwords do not match',
			)
		)
    );
    
    public function beforeSave($options = array()) {
    if (isset($this->data[$this->alias]['password1'])) {
        $passwordHasher = new BlowfishPasswordHasher();
        $this->data[$this->alias]['password'] = $passwordHasher->hash(
            $this->data[$this->alias]['password1']
        );
    }
    else if (isset($this->data[$this->alias]['password'])) {
        $passwordHasher = new BlowfishPasswordHasher();
        $this->data[$this->alias]['password'] = $passwordHasher->hash(
            $this->data[$this->alias]['password']
        );
    }
    return true;
}

public function checkCurrentPassword($data) {
    $password = $this->field('password');
    $passwordHasher = new BlowfishPasswordHasher();
    $entered = $passwordHasher->check($data['current_password'],$password);
    return($entered);
}
public function passwordsMatch($data) {
    $password1 = $this->data[$this->alias]['password1'];
    $password2 = $this->data[$this->alias]['password2'];
    return($password1 == $password2);
}
public function checkPasswordStrength($data) {
    $password = $this->data[$this->alias]['password1'];
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number    = preg_match('@[0-9]@', $password);

    if(!$uppercase || !$lowercase || !$number || strlen($password) < 8) {
  	return false;
    }else{
    return(true); }
}

} ?>
