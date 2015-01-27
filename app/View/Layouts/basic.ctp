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
<body class="basic">

	<!-- Begin page content -->
	<div class="container">

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
