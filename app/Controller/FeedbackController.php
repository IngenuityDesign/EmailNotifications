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
class FeedbackController extends AppController {

  /**
  * This controller does not use a model
  *
  * @var array
  */
  public $uses = array('Campaign');

  private $validResponses = array('yes', 'no');

  public function submit($id) {
    $response = isset($this->params['url']['response']) ? $this->params['url']['response'] : false;

    if ($response && !in_array($response, $this->validResponses)) {
      $response = false;
    }

    if ($response) {

      $campaign = $this->Campaign->findById($id);
      if (!$campaign) throw new NotFoundException();

      print_r($campaign);

    } else {
      // 404
      throw new NotFoundException();
    }

  }

  public function index() {

  }

  public function all() {
    $campaigns = $this->Campaign->findAll();

    $this->set('campaigns', $campaigns);
  }

}
