<?php
// File: /app/Controller/EventsController.php

class EventsController extends AppController {
public $helpers = array('Html', 'Form')

public function index() {

// get all the events from the database.
$events = $this->Event->find('all');

// insert rows to an array.
for ($a=0; count($events)> $a; $a++){

$rows[]= '{"id":'.$events[$a]['Event']['id'].', "title":"'.events[$a]['Event']['name'].'", "start":"'.$events[$a]['Event']['event_date'].'", "className":"'.$events[$a]['Event']['type'].'","type":"'.$events[$a]['Event']['type'].'"}';

}

// convert the array to a string.
if ($rows){
$convertojson = implode(",", $rows);
}

// pass the string to the json variable. this will then be passed  and printed to the javascript code.
$this->set('json',"[".$convertojson."]"); 

}
}
?>