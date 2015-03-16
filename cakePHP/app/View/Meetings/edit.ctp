<h1>Edit Meeting</h1>

<div class="dRoundedBox">



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

echo $this->Form->create('Meeting', array('class' => 'fForm'));

echo $this->Form->input('name');
echo $this->Form->input('description');
echo $this->Form->input('customer',array('type'=>'select','options'=>$customer)); 

if($user==="admin")
{
echo $this->Form->input('fa',array('type'=>'select','options'=>$fa)); 
}
else
{
echo $this->Form->input('fa',array('type'=>'select','options'=>$fa, 'default'=>$user, 'type' => 'hidden')); 
}

echo $this->Form->input('meetingTime');
echo $this->Form->input('dateMeeting', array('dateFormat'=>'DMY', 'minYear'=>date('Y'), 'maxYear'=>date('Y')+10, 'empty'=>array('- -')));
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->end('Save Post');

?></div>

