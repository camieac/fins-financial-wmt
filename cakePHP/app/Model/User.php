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
				'rule' => 'checkPasswordStrength',
				'message' => 'Your password must incude lowercase, uppercase and numbers.'
            		),
			'maxLength' => array(
				'rule' => array('maxLength','16'),
				'message' => 'Your password is too long (16 characters max)'
            		),
			'minLength' => array(
				'rule' => array('minLength','8'),
				'message' => 'Your password is too short (8 characters min)'
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
			),
			'maxLength' => array(
				'rule' => array('maxLength','16'),
				'message' => 'Your password is too long (16 characters max)'
            		),
			'minLength' => array(
				'rule' => array('minLength','8'),
				'message' => 'Your password is too short (8 characters min)'
            		)
		),
	 	'password2' => array(
			'valid' => array(
				'rule' => 'passwordsMatch',
				'message' => 'Passwords do not match',
			)
		),
	 	'index1' => array(
			'valid' => array(
				'rule' => 'validIndex1',
				'message' => 'Not a valid index.',
			)
		),
	 	'index2' => array(
			'valid' => array(
				'rule' => 'validIndex2',
				'message' => 'Not a valid index.',
			)
		),
	 	'index3' => array(
			'valid' => array(
				'rule' => 'validIndex3',
				'message' => 'Not a valid index.',
			)
		),
	 	'index4' => array(
			'valid' => array(
				'rule' => 'validIndex4',
				'message' => 'Not a valid index.',
			)
		),
	 	'name' => array(
			'maxLength' => array(
				'rule' => array('maxLength', '40'),
            			'message' => 'Maximum 40 Characters'
           		),
			'minLength' => array(
				'rule' => array('minLength', '2'),
            			'message' => 'Minimum 2 Characters'
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
    	$password = array_values($data);
	$password = $password[0];
	$uppercase = preg_match('@[A-Z]@', $password);
	$lowercase = preg_match('@[a-z]@', $password);
	$number    = preg_match('@[0-9]@', $password);

	if(!$uppercase || !$lowercase || !$number) {
		return false;
	}else{
		return(true); }
}
public function validIndex1($data){
	return $this->validIndex($this->data[$this->alias]['index1']);
}
public function validIndex2($data){
	return $this->validIndex($this->data[$this->alias]['index2']);
}
public function validIndex3($data){
	return $this->validIndex($this->data[$this->alias]['index3']);
}
public function validIndex4($data){
	return $this->validIndex($this->data[$this->alias]['index4']);
}
public function validIndex($index){
//Example request https://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20yahoo.finance.stocks%20where%20symbol%3D%22kokok%22&format=json&diagnostics=true&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys&callback=
		$request = 'https://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20yahoo.finance.stocks%20where%20symbol%3D%22'.urlencode($index).'%22&format=json&diagnostics=true&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys&callback=';
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $request);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$output = curl_exec($ch);
		curl_close($ch);
		$exists = (strpos($output,'CompanyName') !== false);
		return $exists;
}

} ?>
