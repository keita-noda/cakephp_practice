<?php 

class User extends AppModel{
    public $validate = array(
        'username' => array(
            'rule' => 'notBlank'
        ),
        'password' => array(
            'rule' => 'notBlank'
        )
    );
}