<h1>Edit Meeting</h1>
<?php
echo $this->Form->create('Meeting');
echo $this->Form->input('name');
echo $this->Form->input('description');
echo $this->Form->input('dateMeeting');
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->end('Save Post');
?>
