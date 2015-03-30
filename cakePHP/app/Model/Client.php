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
 'balance' => array(
    	'Numeric' => array(
        	'rule' => 'numeric',
        	'message' => 'Please use only numbers.'
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
                'message' => 'Letters and numbers only'
            ),
            'between' => array(
                'rule'    => array('maxLength', 15),
                'message' => 'Between 5 to 15 characters'
            )
        )
);


     public function getFAs()
    {
       return $this->query('SELECT users.name, users.username FROM users WHERE role = "fa"');
    }
    
     public function getStocks()
    {
       return $this->query("SELECT * FROM purchases, stocklists WHERE customer = ". $this->id . " AND purchases.stock = stocklists.id;");
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
    

}
?>
