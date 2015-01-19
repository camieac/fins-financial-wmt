<?php class Meeting extends AppModel {
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
'dateMeeting' => array(
'rule' => 'notEmpty'
),
);

 public function get()
    {
       return $this->query("SELECT * FROM meetings, clients, fas WHERE meetings.customer = clients.id AND meetings.fa = fas.username;");
    }
    
     public function getCustomers()
    {
       return $this->query("SELECT clients.name FROM clients");
    }
    
     public function getFAs()
    {
       return $this->query("SELECT fas.name, fas.username FROM fas");
    }
}
?>
