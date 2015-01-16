<?php
/**
* @link          http://cakephp.org CakePHP(tm) Project
* @package       app.View.Pages
* @since         CakePHP(tm) v 0.10.0.1076
*/

?>

<div class="row">

  <div class="col-md-offset-2 col-md-8">

    <ol class="breadcrumb">
      <li><a href="/"><i class="glyphicon glyphicon-home"></i></a></li>
      <li>
        <?php
        echo $this->Html->link(
        'Users',
        array(
          'controller' => 'users',
          'action' => 'listAction'
          )
        );
        ?>
      </li>
      <li class="active"><?php echo $username; ?></li>
    </ol>

    <?php echo $this->Form->create('User', array('class' => 'form')); ?>
    <h2 class="form-signin-heading"><?php echo $username; ?></h2>

    <div class="form-group">

      <?php echo $this->Form->input('role', array(
        'class' => 'form-control',
        'required' => '',
        'autofocus' => '',
        'type' => "select",
        'value' => ""
      )); ?>

    </div>

    <div class="form-group">

      <?php echo $this->Form->input('password_new', array(
        'class' => 'form-control',
        'placeholder' => "Password",
        'required' => '',
        'autofocus' => '',
        'type' => "password",
        'value' => ""
      )); ?>

    </div>

    <div class="form-group">

      <?php echo $this->Form->input('password_confirm', array(
        'class' => 'form-control',
        'placeholder' => "Password",
        'required' => '',
        'autofocus' => '',
        'type' => "password",
        'value' => ""
      )); ?>

    </div>

    <button class="btn btn-lg btn-primary btn-block" type="submit">Edit</button>
    <?php echo $this->Form->end(); ?>

  </div>

</div>
