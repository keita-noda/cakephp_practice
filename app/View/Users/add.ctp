<h1>管理ユーザー登録</h1>
<?php 
echo $this->Form->create('User');
echo $this->Form->input('username');
echo $this->Form->input('password');
echo $this->Form->input('role',array(
    'type'=>'select','options'=> $role));
echo $this->Form->end('submit');

 ?>