<!-- File: /app/View/meetings/view.ctp -->
<h1>Add Client</h1>
<?php
echo $this->Form->create('Meeting');
echo $this->Form->input('name');
echo $this->Form->input('description');
echo $this->Form->input('dateMeeting', array('dateFormat'=>'DMY'));
echo $this->Form->end('Save Meeting');
?>
