<?php
App::uses('AppModel', 'Model');

class ResponseComment extends AppModel {

  public $belongsTo = array(
  		'Feedback' => array(
  			'className' => 'Feedback',
  			'foreignKey' => 'feedback_id')
  	);

  public $validate = array(
	    'feedback_id' => array(
	        'rule' => 'isUnique',
	        'message' => 'This feedback has already been commented on.'
	    )
	);

  public $id, $created, $comment, $feedback_id;

}

/*
CREATE TABLE `response_comments` (
id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
comment TEXT NOT NULL,
feedback_id INT(50) NOT NULL
);
*/
