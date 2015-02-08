<h1>Edit Client</h1>

<?php $advisorarray = Set::flatten($FAquery); 

 for ($j = 0; $j < count($advisorarray)/2; ++$j) 
 {
        $fa[$advisorarray[$j.'.fas.username']] = $advisorarray[$j.'.fas.name'];
 } 

?>

<?php
echo $this->Form->create('Client');
echo $this->Form->input('name');
echo $this->Form->input('gender');
echo $this->Form->input('dateOfBirth', array('dateFormat'=>'DMY', 'minYear'=>date('Y')-99, 'maxYear'=>date('Y')-9, 'empty'=>array('- -')));
echo $this->Form->input('nis', array('label' => array('text' => 'National Insurance Number')));
echo $this->Form->input('phoneNo');
echo $this->Form->input('address');
echo $this->Form->input('balance');
echo $this->Form->input('fa',array('type'=>'select','options'=>$fa)); 
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->end('Save Post');
?>
