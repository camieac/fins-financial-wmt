<!-- File: /app/View/Clients/view.ctp -->
<h1>Add Client</h1>
<?php
echo $this->Form->create('Client');
echo $this->Form->input('name');
echo $this->Form->input('gender');
echo $this->Form->input('dateOfBirth');
echo $this->Form->input('phoneNo');
echo $this->Form->input('address');
echo $this->Form->input('fa');
echo $this->Form->end('Save Client');
?>
