<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */


?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->Html->meta('icon');


		echo $this->Html->css('//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css');

		echo $this->Html->css('main');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>

	<nav class="navbar navbar-default navbar-static-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="/">eBay Email Feedback</a>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li><?php
						echo $this->Html->link(
							'Lists',
							array(
								'controller' => 'campaigns',
								'action' => 'listAction'
							),
							array('class' => '', 'target' => '')
						);
					?></li>
					<li><?php
						echo $this->Html->link(
							'Archives',
							array(
								'controller' => 'campaigns',
								'action' => 'archivesAction'
							),
							array('class' => '', 'target' => '')
						);
					?></li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</nav>

	<!-- Begin page content -->
	<div class="container">

		<?php if ($flash = $this->Session->flash('success')): ?>
			<div class="alert alert-success" role="alert">
				<?php echo $flash; ?>
			</div>
		<?php endif; ?>

		<?php if ($flash = $this->Session->flash()): ?>
			<div class="alert alert-danger" role="alert">
				<?php echo $flash; ?>
			</div>
		<?php endif; ?>

		<?php echo $this->fetch('content'); ?>

		<?php //echo $this->element('sql_dump'); ?>

	</div>

	<footer class="footer">
		<div class="container">
			<p class="text-muted">
				Copyright &copy; eBay Inc.
			</p>
		</div>
	</footer>

	<?php
	echo $this->Html->script('//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js');
	echo $this->Html->script('//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js');
	?>

</body>
</html>
