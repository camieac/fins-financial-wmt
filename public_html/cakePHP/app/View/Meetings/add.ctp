<!-- File: /app/View/meetings/add.ctp -->
<h1>Add Meeting</h1>

<?php $customerarray = Set::flatten($Custquery); 
$advisorarray = Set::flatten($FAquery); 

 for ($i = 0; $i < count($customerarray); ++$i) 
 {
        $customer[$i+1] = $customerarray[$i.'.clients.name'];
 } 
 
 for ($j = 0; $j < count($advisorarray)/2; ++$j) 
 {
        $fa[$advisorarray[$j.'.fas.username']] = $advisorarray[$j.'.fas.name'];
 } 

?>

<?php
echo $this->Form->create('Meeting');
echo $this->Form->input('name');
echo $this->Form->input('description');
echo $this->Form->input('customer',array('type'=>'select','options'=>$customer)); 
echo $this->Form->input('fa',array('type'=>'select','options'=>$fa)); 
echo $this->Form->input('dateMeeting', array('dateFormat'=>'DMY', 'minYear'=>date('Y'), 'maxYear'=>date('Y')+10, 'empty'=>array('- -')));
echo $this->Form->end('Save Meeting');
?>

