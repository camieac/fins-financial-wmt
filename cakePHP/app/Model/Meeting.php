<?php class Meeting extends AppModel 
{
var $user;
	
public $validate = array(
'name' => array(
'rule' => 'notEmpty'
),
'description' => array(
'rule' => 'notEmpty'
),
'customer' => array(
'rule' => 'notEmpty'
),
'fa' => array(
'rule' => 'notEmpty'
),
'meetingTime' => array(
'rule' => 'notEmpty'
),
'dateMeeting' => array(
'rule' => 'notEmpty'
),
);

 public function get()
    {
		if($this->user==="admin")
		{
       return $this->query("SELECT * FROM meetings, clients, fas WHERE meetings.customer = clients.id AND meetings.fa = fas.username ORDER BY meetings.id;");
		}
		
		else
		{
       return $this->query("SELECT * FROM meetings, clients, fas WHERE meetings.customer = clients.id AND meetings.fa = fas.username AND fas.username ='". $this->user. "' ORDER BY meetings.id;");
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
