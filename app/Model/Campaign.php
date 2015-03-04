<?php
App::uses('AppModel', 'Model');

class Campaign extends AppModel {

  public $id, $created, $open, $name;

  public $hasMany = array(
    'Feedback' => array(
      'className' => 'Feedback',
      'foreignKey' => 'campaign_id'
    )
  );

  private function responseCategories($feedback) {

    $yes = 0;
    $no = 0;

    $comments = array();
    $types = array();

    foreach($feedback as $feedbackItem) {
      if ($feedbackItem['response'] == 'yes') $yes++;
      else $no++;

      $comment = $feedbackItem['Comment'];

      if ($comment && $comment['comment']) {
        $comment_text = $comment['comment'];
        $comments[] = $comment_text;
      } else {
        $comment_text = '';
      }

      

      $response = $feedbackItem['Response'];

      if (count($response) > 0) {
        foreach($response as $k => $res) {
          $rId = $res['id'];
          if (!array_key_exists($rId, $types)) $types[$rId] = 0;
          $types[$rId]++; // = $types[$rId]++;
        }
      }
      
    }

    return array(
      'yes' => $yes,
      'no' => $no,
      'comments' => $comments,
      'types' => $types
    );
  }

  public function getList($archives = false) {

    if ($archives) $campaigns = $this->find('all', array(
      'order' => array('Campaign.created' => 'desc'),
      'recursive' => 2
    ));
    else $campaigns = $this->find('all', array(
      'order' => array('Campaign.created' => 'desc'),
      'conditions' => array('Campaign.open' => '1'),
      'recursive' => 2
    ));

    $returnObject = array();

    foreach($campaigns as $campaign) {
      // Get some associations
      $theCampaign = $campaign['Campaign'];
      $theFeedback = $campaign['Feedback'];

      $responses = $this->responseCategories($theFeedback);


      $theCampaign['yes'] = $responses['yes'];
      $theCampaign['no'] = $responses['no'];
      $theCampaign['comments'] = $responses['comments'];
      $theCampaign['types'] = $responses['types'];

      // Now we need to do it for the custom types

      $returnObject[] = $theCampaign;

    }

    return $returnObject;

  }

}

/*
CREATE TABLE `campaigns` (
id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
open TINYINT(1) NOT NULL,
name VARCHAR(100) NOT NULL
);
*/
