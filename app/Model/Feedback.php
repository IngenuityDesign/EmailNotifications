<?php
App::uses('AppModel', 'Model');

class Feedback extends AppModel {

  public $id, $ip, $response, $created;

  public $belongsTo = array(
    'Campaign' => array(
      'className' => 'Campaign',
      'foreignKey' => 'campaign_id'
    )
  );

}

/*
CREATE TABLE `feedback` (
id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
ip VARCHAR(255) NOT NULL,
response VARCHAR(5) NOT NULL,
created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
campaign_id INT(30) NOT NULL
);
*/
