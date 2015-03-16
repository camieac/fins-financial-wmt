<?php class Meeting extends AppModel 
{
<<<<<<< HEAD
	public $useTable = 'events'; // This model uses a database table 'events'
var $user;
	
public $validate = array(
'title' => array(
'rule' => 'notEmpty'
),
'details' => array(
=======
var $user;
	
public $validate = array(
'name' => array(
'rule' => 'notEmpty'
),
'description' => array(
>>>>>>> 9283f741b8c75a119d90aa68d0ac45998f85d375
'rule' => 'notEmpty'
),
'customer' => array(
'rule' => 'notEmpty'
),
'fa' => array(
'rule' => 'notEmpty'
),
<<<<<<< HEAD
'start' => array(
'rule' => 'notEmpty'
),
'end' => array(
=======
'meetingTime' => array(
'rule' => 'notEmpty'
),
'dateMeeting' => array(
>>>>>>> 9283f741b8c75a119d90aa68d0ac45998f85d375
'rule' => 'notEmpty'
),
);

 public function get()
    {
		if($this->user==="admin")
		{
<<<<<<< HEAD
       return $this->query("SELECT * FROM events, clients, fas WHERE events.customer = clients.id AND events.fa = fas.username ORDER BY events.id;");
=======
       return $this->query("SELECT * FROM meetings, clients, fas WHERE meetings.customer = clients.id AND meetings.fa = fas.username ORDER BY meetings.id;");
>>>>>>> 9283f741b8c75a119d90aa68d0ac45998f85d375
		}
		
		else
		{
<<<<<<< HEAD
       return $this->query("SELECT * FROM events, clients, fas WHERE events.customer = clients.id AND events.fa = fas.username AND fas.username ='". $this->user. "' ORDER BY events.id;");
=======
       return $this->query("SELECT * FROM meetings, clients, fas WHERE meetings.customer = clients.id AND meetings.fa = fas.username AND fas.username ='". $this->user. "' ORDER BY meetings.id;");
>>>>>>> 9283f741b8c75a119d90aa68d0ac45998f85d375
		}	
    }
    
     public function getCustomers()
    {
       return $this->query("SELECT clients.name FROM clients");
    }
    
     public function getFAs()
    {
		if($this->user==="admin")
		{
       return $this->query("SELECT fas.name, fas.username FROM fas");
		}
		
		else
		{
		return $this->query("SELECT fas.name, fas.username FROM fas WHERE fas.username ='". $this->user. "';");
		}
    }
}
?>
