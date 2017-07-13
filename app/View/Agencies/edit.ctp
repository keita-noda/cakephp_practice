<h1>代理店情報変更</h1>
<?php 
echo $this->Form->create('Agency');
echo $this->Form->input('agency_name');
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->end('Submit');
 ?>