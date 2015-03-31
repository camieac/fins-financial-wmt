<?php class Meeting extends AppModel 
{

	public $useTable = 'events'; // This model uses a database table 'events'
var $user;
	
public $validate = array(
'title' => array(
'rule' => 'notEmpty'
),
'details' => array(

'rule' => 'notEmpty'
),
'customer' => array(
'rule' => 'notEmpty'
),
'fa' => array(
'rule' => 'notEmpty'
),

'start' => array(
'rule' => 'notEmpty'
),
'end' => array(

'rule' => 'notEmpty'
),
);

 public function get()
    {
		if($this->user==="admin")
		{

       return $this->query("SELECT * FROM events, clients, users WHERE events.customer = clients.id AND events.fa = users.username ORDER BY events.id;");

		}
		
		else
		{

       return $this->query("SELECT * FROM events, clients, users WHERE events.customer = clients.id AND events.fa = users.username AND users.username ='". $this->user. "' ORDER BY events.id;");

		}	
    }
    
     public function getCustomers()
    {
       return $this->query("SELECT clients.name FROM clients");
    }
    public function getCustomer($id)
    {
       return $this->query('SELECT * FROM clients WHERE clients.id = '.$id);
    }
    
     public function getFAs()
    {
		if($this->user==="admin")
		{
       return $this->query("SELECT users.name, users.username FROM users");
		}
		
		else
		{
		return $this->query("SELECT users.name, users.username FROM users WHERE users.username ='". $this->user. "';");
		}
    }
}
?>
