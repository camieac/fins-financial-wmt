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

echo $this->Form->input('title');
echo $this->Form->input('details');
echo $this->Form->input('customer',array('type'=>'select','options'=>$customer)); 

if($user==="admin")
{
echo $this->Form->input('fa',array('type'=>'select','options'=>$fa)); 
}
else
{
echo $this->Form->input('fa',array('type'=>'select','options'=>$fa, 'default'=>$user, 'type' => 'hidden')); 
}


echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->input('status', array('options' => array(
					'Scheduled' => 'Scheduled','Confirmed' => 'Confirmed','In Progress' => 'In Progress',
					'Rescheduled' => 'Rescheduled','Completed' => 'Completed'
				)
			)
		);
echo $this->Form->input('start', array('class'=>'datepicker','type'=>'text'));
echo $this->Form->input('end', array('class'=>'datepicker','type'=>'text'));
echo $this->Form->input('all_day', array('checked' => 'checked'));
echo $this->Form->end('Save Meeting');

?></div>

