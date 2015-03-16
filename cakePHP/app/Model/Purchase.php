<?php class Purchase extends AppModel {
	public $validate = array(
'stock' => array(
'rule' => 'notEmpty'
),
<<<<<<< HEAD
=======
'quantity' => array(
'Numeric' => array(
			'rule' => array('range', 0, 999999999999999999),
        	'message' => 'Please use only positive numbers.'),
        	),
>>>>>>> 9283f741b8c75a119d90aa68d0ac45998f85d375
 'balance' => array(
    	'Numeric' => array(
        	'rule' => 'numeric',
        	'message' => 'Please use only numbers.'
	),
)
);
	
	   public function get()
    {
       return $this->query("SELECT * FROM purchases, stocklists, clients WHERE purchases.stock = stocklists.id AND purchases.customer = clients.id;");
    }
}
?>
