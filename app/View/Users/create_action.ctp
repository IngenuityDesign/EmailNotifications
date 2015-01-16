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
      <li class="active">Create</li>
    </ol>

    <?php echo $this->Form->create('User', array('class' => 'form')); ?>

    <h2 class="form-signin-heading">Create a user</h2>

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

    <div class="form-group">

      <?php echo $this->Form->input('role', array(
        'class' => 'form-control',
        'required' => '',
        'autofocus' => '',
        'type' => "select",
        'value' => ""
      )); ?>

    </div>

    <button class="btn btn-lg btn-primary btn-block" type="submit">Create</button>

    <?php echo $this->Form->end(); ?>

  </div>

</div>
