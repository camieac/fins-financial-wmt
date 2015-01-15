<h1>Edit Client</h1>
<?php
echo $this->Form->create('Client');
echo $this->Form->input('name');
echo $this->Form->input('gender');
echo $this->Form->input('dateOfBirth');
echo $this->Form->input('phoneNo');
echo $this->Form->input('address');
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->end('Save Post');
?>
