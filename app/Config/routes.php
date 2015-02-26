<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
	Router::connect('/', array('controller' => 'campaigns', 'action' => 'listAction'));
/**
 * ...and connect the rest of 'Pages' controller's URLs.
 */
	Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));

/**
	* ...and connect the rest of 'Pages' controller's URLs.
	*/
	Router::connect('/campaigns', array('controller' => 'campaigns', 'action' => 'listAction'));
	Router::connect('/campaigns/archives', array('controller' => 'campaigns', 'action' => 'archivesAction'));
	Router::connect('/campaigns/create', array('controller' => 'campaigns', 'action' => 'createAction'));

	Router::connect('/campaigns/:id', array('controller' => 'campaigns', 'action' => 'viewAction'),
		array(
			'pass' => array('id'),
			'id' => '[0-9]+')
	);

	Router::connect('/campaigns/:id/disable', array('controller' => 'campaigns', 'action' => 'disableAction'),
	array(
		'pass' => array('id'),
		'id' => '[0-9]+')
	);

	Router::connect('/campaigns/:id/enable', array('controller' => 'campaigns', 'action' => 'enableAction'),
	array(
		'pass' => array('id'),
		'id' => '[0-9]+')
	);

	Router::connect('/campaigns/:id/delete', array('controller' => 'campaigns', 'action' => 'deleteAction'),
	array(
		'pass' => array('id'),
		'id' => '[0-9]+')
	);

	Router::connect('/feedback/:id', array('controller' => 'campaigns', 'action' => 'submitAction'),
	array(
		'pass' => array('id'),
		'id' => '[0-9]+')
	);

	Router::connect('/feedback/clarify', array('controller' => 'campaigns', 'action' => 'updateFeedbackAction'));


	Router::connect('/users', array('controller' => 'users', 'action' => 'listAction'));
	Router::connect('/users/create', array('controller' => 'users', 'action' => 'createAction'));

	Router::connect('/users/:id', array('controller' => 'users', 'action' => 'editAction'),
	array(
		'pass' => array('id'),
		'id' => '[0-9]+')
	);

	Router::connect('/users/:id/delete', array('controller' => 'users', 'action' => 'deleteAction'),
	array(
		'pass' => array('id'),
		'id' => '[0-9]+')
	);

	Router::connect('/responses', array('controller' => 'responses', 'action' => 'listAction'));
	Router::connect('/responses/create', array('controller' => 'responses', 'action' => 'createAction'));
	Router::connect('/responses/:id/delete', array('controller' => 'responses', 'action' => 'deleteAction'),
	array(
		'pass' => array('id'),
		'id' => '[0-9]+')
	);

	//Router::connect('/login', array('controller' => 'users', 'action' => 'loginAction'));
	//Router::connect('/logout', array('controller' => 'users', 'action' => 'logoutAction'));


/**
 * Load all plugin routes. See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';
