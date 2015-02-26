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

    foreach($feedback as $feedbackItem) {
      if ($feedbackItem['response'] == 'yes') $yes++;
      else $no++;
    }

    return array($yes,$no);
  }

  public function getList($archives = false) {

    if ($archives) $campaigns = $this->find('all', array(
      'order' => array('Campaign.created' => 'desc')
    ));
    else $campaigns = $this->find('all', array(
      'order' => array('Campaign.created' => 'desc'),
      'conditions' => array('Campaign.open' => '1')
    ));

    $returnObject = array();

    foreach($campaigns as $campaign) {
      // Get some associations
      $theCampaign = $campaign['Campaign'];
      $theFeedback = $campaign['Feedback'];

      list($yes, $no) = $this->responseCategories($theFeedback);

      $theCampaign['yes'] = $yes;
      $theCampaign['no'] = $no;

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
