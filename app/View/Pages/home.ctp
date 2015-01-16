<?php
/**
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Pages
 * @since         CakePHP(tm) v 0.10.0.1076
 */

?>

<div class="row">

	<div class="col-md-offset-2 col-md-8">

		<?php echo $this->Form->create('User', array('class' => 'form-horizontal')); ?>
			<h2 class="form-signin-heading">Please sign in</h2>

			<div class="form-group">
				<label for="inputEmail" class="sr-only">Email address</label>
				<input type="email" id="inputEmail" class="form-control" placeholder="Email address" required="" autofocus="">
			</div>

			<div class="form-group">

				<label for="inputPassword" class="sr-only">Password</label>
				<input type="password" id="inputPassword" class="form-control" placeholder="Password" required="">

			</div>
			
			<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
		<?php echo $this->Form->end(__('Login')); ?>

	</div>

</div>
