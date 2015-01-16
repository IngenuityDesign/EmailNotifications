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
          'username' => 'info@ingenuitydesign.com',
          'password' => 'password',
          'role' => 'admin'
        )
      )
    );

  }

  public function logout() {
    return $this->redirect($this->Auth->logout());
  }

  public function listAction() {
    $users = $this->User->find('all');

    $this->set('users', $users);
  }

  public function editAction($id) {
    $this->User->id = $id;

    if (!$this->User->exists())
      throw new NotFoundException();

    if ($this->request->is('post')) {

      $password = $this->request->data['User']['password_new']; //->password;
      $password_confirm = $this->request->data['User']['password_confirm'];

      if (!$password || ($password != $password_confirm)) {
        $this->Session->setFlash('Please make sure the passwords match');
      } else {
        $this->User->set(array(
          'password' => $password,
          'role' => $this->request->data['User']['role']
        ));

        $this->User->save();

        $this->Session->setFlash('User successfully edited', 'default', array(), 'success');

        return $this->redirect(
          array(
            'controller' => 'users',
            'action' => 'listAction'
          )
        );

      }

    }

    $username = $this->User->field('username');

    $validRoles = @$this->User->validate['role']['valid']['rule'][1];
    if (!$validRoles) $validRoles = array();

    $this->set('roles', $validRoles);

    $this->set('username', $username);

  }

  public function createAction() {

    $validRoles = @$this->User->validate['role']['valid']['rule'][1];
    if (!$validRoles) $validRoles = array();

    if ($this->request->is('post')) {

      $this->User->create();
      $newObj = $this->request->data;
      $newObj['User']['role'] = $validRoles[$newObj['User']['role']];
      $x = $this->User->save($newObj);

      if ($x)
        $this->Session->setFlash('User created', 'default', array(), 'success');
      else
        $this->Session->setFlash('Was unable to create user');

      return $this->redirect(
        array(
          'controller' => 'users',
          'action' => 'listAction'
        )
      );

    }

    $this->set('roles', $validRoles);
  }

  public function deleteAction($id) {
    $this->User->id = $id;

    if (!$this->User->exists())
      throw new NotFoundException();

    $this->User->delete($id);

    $this->Session->setFlash('Successfully deleted user', 'default', array(), 'success');

    return $this->redirect(
      array(
        'controller' => 'users',
        'action' => 'listAction'
      )
    );

  }

}
