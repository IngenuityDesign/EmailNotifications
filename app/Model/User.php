<?php

// app/Model/User.php
App::uses('AppModel', 'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

class User extends AppModel {
  public $validate = array(
    'username' => array(
      'required' => array(
        'rule' => array('notEmpty'),
        'message' => 'A username is required'
      )
    ),
    'password' => array(
      'required' => array(
        'rule' => array('notEmpty'),
        'message' => 'A password is required'
      )
    ),
    'role' => array(
      'valid' => array(
        'rule' => array('inList', array('admin')),
        'message' => 'Please enter a valid role',
        'allowEmpty' => false
      )
    )
  );

  // public function beforeSave($options = array()) {
  //   if (isset($this->data[$this->alias]['password'])) {
  //     $passwordHasher = new BlowfishPasswordHasher();
  //     $this->data[$this->alias]['password'] = $passwordHasher->hash(
  //       $this->data[$this->alias]['password']
  //     );
  //   }
  //   return true;
  // }
}

/*
CREATE TABLE users (
id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(50),
password VARCHAR(255),
role VARCHAR(20),
created TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
*/
