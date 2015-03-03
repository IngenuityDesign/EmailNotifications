<?php
App::uses('AppModel', 'Model');

class Response extends AppModel {

  public $belongsTo = array(
  		'Feedback' => array(
  			'className' => 'Feedback',
  			'foreignKey' => 'feedback_id'),
  		'Type' => array(
  			'className' => 'ResponseType',
  			'foreignKey' => 'response_type')
  	);

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
response_type INT UNSIGNED NOT NULL,
feedback_id INT UNSIGNED NOT NULL
);
*/
