<?php class Client extends AppModel 
{
var $id;
	
	
public $validate = array(
'name' => array(
'rule' => 'notEmpty'
),
'email' => array(
'rule' => 'email'
),
'gender' => array(
'rule' => 'notEmpty'
),
'dateOfBirth' => array(
'rule' => 'notEmpty'
),
'nis' => array(
	'notEmpty' => array(
		'rule' => 'notEmpty',
		'message' => 'Please insert your national insurance number'
	),
	'maxLength' => array(
		'rule'    => array('maxLength', 13),
        'message' => 'Between 9 to 13 characters',
	),
	'minLength' => array(
		'rule'    => array('minLength', 9),
        'message' => 'Between 9 to 13 characters',
	)
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
 'balance' => array(
    	'decimal' => array(
        	'rule' => array('decimal', 2),
        	'message' => 'Please enter a valid amount of money.'
	),
),
'address' => array(
'rule' => 'notEmpty'
),
'fa' => array(
'rule' => 'notEmpty'
),
'twitter' => array(
            'alphaNumeric' => array(
                'rule' => 'alphaNumeric',
                'required' => false,
                'allowEmpty' => true,
                'message' => 'Letters and numbers only'
            ),
            'between' => array(
                'rule'    => array('maxLength', 15),
                'message' => 'Between 5 to 15 characters',
                'allowEmpty' => true
            ),
            'exists' => array(
                'rule'    => 'twitterAccountExists',
                'message' => 'Between 5 to 15 characters',
                'allowEmpty' => true
            )
        )
);
     public function getFAs()
    {
       return $this->query('SELECT users.name, users.username FROM users WHERE role = "fa"');
    }
    
     public function getStocks()
    {
       return $this->query('SELECT * FROM purchases, stocklists WHERE customer = '. $this->id . ' AND purchases.stock = stocklists.id;');
    }
    
    public function getStockNames()
    {
       return $this->query("SELECT stocklists.id, stocklists.symbol FROM stocklists ORDER BY stocklists.id;");
    }
    public function getQuery($a)
    {
       return $this->query($a);
    }
	public function setProfileImageName(){
		//$this->query("INSERT INTO ff (clients) VALUES (imageName);");
	}
    function twitterAccountExists($data)
    { //debug($data);
	if($data == null) return false;
		$username = $data['twitter'];
        $headers = get_headers("https://twitter.com/" . $username);
        if (strpos($headers[0], '404') !== false) {
            return false; //404 found
        } else {
            return true;
        }
    }
}
?>
