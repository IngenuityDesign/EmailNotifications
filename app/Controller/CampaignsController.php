<?php
/**
* Dynamic content controller.
*
* This file will render views from views/pages/
*
* @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
* @link          http://cakephp.org CakePHP(tm) Project
* @package       app.Controller
* @since         CakePHP(tm) v 0.2.9
* @license       http://www.opensource.org/licenses/mit-license.php MIT License
*/

App::uses('AppController', 'Controller');

/**
* Static content controller
*
* Override this controller by placing a copy in controllers directory of an application
*
* @package       app.Controller
* @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
*/
class CampaignsController extends AppController {

  /**
  * This controller does not use a model
  *
  * @var array
  */

  private $validResponses = array('yes', 'no');
  public $uses = array('Campaign', 'Response', 'ResponseType', 'ResponseComment');

  public function clarifyAction($id) {
    $this->layout = 'basic';


  }

  private function filterResponseArray( $array, $clarifies ) {
    
    return array_filter($array, function($v) use ($clarifies) {

      $x = strcasecmp($clarifies, $v['ResponseType']['clarifies']);
      
      return $x === 0;

    });
  }

  public function submitAction($id) {

    $this->layout = 'basic';

    $response = isset($this->params['url']['response']) ? $this->params['url']['response'] : false;

    if ($response && !in_array($response, $this->validResponses)) {
      $response = false;
    }

    if ($response) {

      $this->Campaign->id = $id;
      if (!$this->Campaign->exists() || $this->Campaign->field('open') == 0) {
        throw new NotFoundException();
      }

      $this->Campaign->Feedback->create();
      $this->Campaign->Feedback->save(array(
        'Feedback' => array(
          'response' => $response,
          'ip' => $_SERVER['REMOTE_ADDR'],
          'campaign_id' => $id
        )
      ));

      // We need to filter them out based on the response
      $custom_responses = $this->filterResponseArray($this->ResponseType->getList(), $response);

      $this->set('custom_responses', $custom_responses);
      $this->set('response', $response);
      $this->set('feedback', $this->Campaign->Feedback);

    } else {
      // 404
      throw new NotFoundException();
    }

  }

  public function index() {
    throw new NotFoundException();
  }

  public function listAction() {

    $this->set('response_types', $this->ResponseType->getList());
    $this->set('campaigns', $this->Campaign->getList());
  }

  public function archivesAction() {
    $this->set('campaigns', $this->Campaign->getList(true));
  }

  public function viewAction($id) {

    $this->Campaign->id = $id;

    if (!$this->Campaign->exists()) {
      throw new NotFoundException();
    }

    $name = $this->Campaign->field('name');
    $feedback = $this->Campaign->Feedback->find('all', array(
      'order' => array('Feedback.created' => 'desc'),
      'conditions' => array('Feedback.campaign_id' => $id)
    )); //findAllByCampaignId($id);

    $this->set('feedback', $feedback);
    $this->set('name', $name);
    $this->set('id', $id);
    //$feedback = $this->Campaign->Feedback->find('all');

  }

  public function disableAction($id) {
    $this->Campaign->id = $id;

    if (!$this->Campaign->exists()) {
      throw new NotFoundException();
    }

    $this->Campaign->set('open', 0);
    $this->Campaign->save();

    $this->Session->setFlash(
      sprintf("Disabled the '%s' campaign.", $this->Campaign->field('name')),
      'default', array(), 'good'
    );

    return $this->redirect(
      array(
        'controller' => 'campaigns',
        'action' => 'archivesAction'
      )
    );

  }

  public function enableAction($id) {
    $this->Campaign->id = $id;

    if (!$this->Campaign->exists()) {
      throw new NotFoundException();
    }

    $this->Campaign->set('open', 1);
    $this->Campaign->save();

    $this->Session->setFlash(
      sprintf("Enabled the '%s' campaign.", $this->Campaign->field('name')),
      'default', array(), 'success'
    );

    return $this->redirect(
      array(
        'controller' => 'campaigns',
        'action' => 'archivesAction'
      )
    );

  }

  public function deleteAction($id) {
    $this->Campaign->id = $id;

    if (!$this->Campaign->exists())
      throw new NotFoundException();

    $this->Campaign->delete($id);

    $this->Session->setFlash('Successfully campaign', 'default', array(), 'success');

    return $this->redirect(
      array(
        'controller' => 'campaigns',
        'action' => 'archivesAction'
      )
    );

  }

  public function createAction() {

    $this->set('name', '');

    if ($this->request['data']) {
      $name = $this->request['data']['NameField'];

      $this->set('name', $name);

      if (strlen($name) < 4) {
          $this->Session->setFlash('Your name is too short.');
          return;
      }

      $this->Campaign->create();
      $newCampaign = $this->Campaign->save(array(
        'Campaign' => array(
        'name' => $name,
        'open' => 1
        )
      ));

      if ($newCampaign) {
        $this->Session->setFlash('Successfully added your campaign', 'default', array(), 'success');

        return $this->redirect(
          array(
            'controller' => 'campaigns',
            'action' => 'viewAction',
            'id' => $newCampaign['Campaign']['id']
          )
        );
      } else {
        $this->Session->setFlash('There was an error adding your campaign.');
      }

    }

  }

  public function updateFeedbackAction() {

    $this->layout = 'basic';
    
    $feedback = $this->request['data']['Feedback'];
    $id = $feedback['FeedbackID'];

    // FeedbackID is the id of the feedback
    // ResponseType is an array of key value pairs. Keys are ResponseType ids. value is 1 if on, 0 if off
    // CustomMessage is the comment if it exists

    $theFeedback = $this->Campaign->Feedback;
    $theFeedback->id = $id;

    if (!$theFeedback->exists()) {
      return BadRequestException();
    }

    $comment = $feedback['CustomMessage'] ? $feedback['CustomMessage'] : false;

    $types = array();
    // in here
    if (isset($feedback['ResponseType']) && count($feedback['ResponseType']) > 0) {
      foreach ($feedback['ResponseType'] as $typeId => $yepnope): 
        if ($yepnope == 1) {
          $aResponseType = $this->ResponseType;
          $aResponseType->id = $typeId;

          if (!$aResponseType->exists()) {
            throw new BadRequestException();
          }

          $this->Response->create();
          $this->Response->save(array(
            'Response' => array(
              'response_type' => $typeId,
              'feedback_id' => $id
            )
          ));

        }
      endforeach; 
    }

    if ($comment) {
      $this->ResponseComment->create();
      $this->ResponseComment->save(array(
        'ResponseComment' => array(
          'comment' => $comment,
          'feedback_id' => $id
        )
      ));
    }
    
    $theFeedback->save();

  }

}
