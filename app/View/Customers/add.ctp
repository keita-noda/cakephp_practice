<h1>新規顧客登録</h1>
<?php 
echo $this->Form->create('Customer');
echo $this->Form->input('name');
echo $this->Form->input('line_type', array(
    'type' => 'select', 'options' => $line_type));
echo $this->Form->input('contract_type', array(
    'type' => 'select', 'options' => $contract_type));
echo $this->Form->input('agency_id', array('type' => 'select', 'options' => $agency));
echo $this->Form->input('status', array(
    'type' => 'select', 'options' => $status));
echo $this->Form->input('contract_day', array(
    'type' => 'datetime',
    'dateFormat' => 'YMD',
    'monthNames' => false
    ));
echo $this->Form->end('登録');

 ?>