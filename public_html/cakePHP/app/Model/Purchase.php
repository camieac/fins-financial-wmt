<?php class Purchase extends AppModel {
	public $validate = array(
'stock' => array(
'rule' => 'notEmpty'
),
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
