<?php
App::uses('AppModel', 'Model');

class Response extends AppModel {

  public $id, $created, $active, $label, $clarifies;

  public function getList() {
    $responses = $this->findAllByActive('1');
    return $responses;
  }

}

/*
CREATE TABLE `responses` (
id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
active TINYINT(1) NOT NULL,
clarifies VARCHAR(5) NOT NULL,
label VARCHAR(100) NOT NULL
);
*/
