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
App::uses('Response', 'Model');

/**
* Static content controller
*
* Override this controller by placing a copy in controllers directory of an application
*
* @package       app.Controller
* @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
*/
class ResponsesController extends AppController {

  /**
  * This controller does not use a model
  *
  * @var array
  */

  private $options = array('yes', 'no');

  public function listAction() {
    $this->set('responses', $this->Response->getList());
    $this->set('options', $this->options);
  }

  public function createAction() {

    $opts = $this->options;

    $this->set('label', '');
    $this->set('options', $opts);

    if ($this->request['data'] && $response = $this->request['data']['Response']) {
      if (!array_key_exists('label', $response) || !array_key_exists('clarifies', $response)) {
        $this->Session->setFlash('Something was wrong with your submission');
        return;
      }

      $label = $response['label'];

      $this->set('label', $label);

      if (!array_key_exists($response['clarifies'], $opts)) {
        $this->Session->setFlash('Please choose a proper response type');
        return;
      }

      $clarifies = $opts[$response['clarifies']];

      $this->Response->create();
      $newResponse = $this->Response->save(array(
        'Response' => array(
          'clarifies' => 'no',
          'label' => $label,
          'active' => 1
        )
      ));

      if ($newResponse) {
        $this->Session->setFlash('Successfully added your response', 'default', array(), 'success');

        return $this->redirect(
          array(
            'controller' => 'responses',
            'action' => 'listAction'
          )
        );
      } else {
        $this->Session->setFlash('There was an error adding your response.');
      }

    }

  }

  public function deleteAction($id) {
    $this->Response->id = $id;

    if (!$this->Response->exists())
      throw new NotFoundException();

    $this->Response->delete($id);

    $this->Session->setFlash('Successfully deleted response', 'default', array(), 'success');

    return $this->redirect(
      array(
        'controller' => 'responses',
        'action' => 'listAction'
      )
    );
  }



}
