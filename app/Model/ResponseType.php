<?php
App::uses('AppModel', 'Model');

class ResponseType extends AppModel {

  public $id, $created, $active, $label, $clarifies, $response_order;

  public function getList() {
    $responses = $this->findAllByActive('1');
    return $responses;
  }

}

/*
CREATE TABLE `response_types` (
id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
active TINYINT(1) NOT NULL,
clarifies VARCHAR(5) NOT NULL,
label VARCHAR(100) NOT NULL,
message VARCHAR(100) NOT NULL,
response_order TINYINT NOT NULL DEFAULT 0
);
*/
