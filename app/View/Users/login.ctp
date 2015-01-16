<?php
/**
* @link          http://cakephp.org CakePHP(tm) Project
* @package       app.View.Pages
* @since         CakePHP(tm) v 0.10.0.1076
*/

?>

<div class="row">

  <div class="col-md-offset-2 col-md-8">

    <?php echo $this->Form->create('User', array('class' => 'form')); ?>
    <h2 class="form-signin-heading">Please sign in</h2>

    <div class="form-group">
      <?php echo $this->Form->input('username', array(
        'class' => 'form-control',
        'placeholder' => "john@ebay.com",
        'required' => '',
        'autofocus' => '',
        'type' => "email"
      )); ?>
    </div>

    <div class="form-group">

      <?php echo $this->Form->input('password', array(
        'class' => 'form-control',
        'placeholder' => "Password",
        'required' => '',
        'autofocus' => '',
        'type' => "password",
        'value' => ""
      )); ?>

    </div>

    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    <?php echo $this->Form->end(); ?>

  </div>

</div>
