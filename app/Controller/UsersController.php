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
class UsersController extends AppController {

  public function beforeFilter() {
    parent::beforeFilter();
    $this->Auth->allow('add');
  }

  public function login() {

    if ($this->request->is('post')) {
      if ($this->Auth->login()) {
        return $this->redirect($this->Auth->redirectUrl());
      }

      $this->Session->setFlash('Username or password is incorrect');

    }

  }

  public function seedAction() {
    throw new NotFoundException();
    $this->User->create();
    $this->User->save(
      array(
        'User' => array(
          'username' => 'stephen@ingenuitydesign.com',
          'password' => 'password',
          'role' => 'admin'
        )
      )
    );

  }

  public function logout() {
    return $this->redirect($this->Auth->logout());
  }

}
