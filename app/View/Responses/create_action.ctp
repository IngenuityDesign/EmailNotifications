<div class="row">

  <div class="col-md-offset-2 col-md-8">

    <ol class="breadcrumb">
      <li><a href="/"><i class="glyphicon glyphicon-home"></i></a></li>
      <li>
        <?php
          echo $this->Html->link(
          'Responses',
          array(
            'controller' => 'responses',
            'action' => 'listAction'
          )
        );
        ?>
      </li>
      <li class="active">Create</li>
    </ol>

    <?php echo $this->Form->create('Response', array('class' => 'form')); ?>

    <h2 class="form-signin-heading">Create a response</h2>

    <div class="form-group">
      <?php echo $this->Form->input('label', array(
        'class' => 'form-control',
        'placeholder' => "",
        'required' => '',
        'autofocus' => '',
        'type' => "text",
        'label' => "Label"
      )); ?>
    </div>

    <div class="form-group">

      <?php echo $this->Form->input('clarifies', array(
        'class' => 'form-control',
        'placeholder' => "Password",
        'required' => '',
        'autofocus' => '',
        'type' => "select",
        'options' => array('Yes', 'No'),
        'label' => "Response Type"
      )); ?>

    </div>

    <button class="btn btn-lg btn-primary btn-block" type="submit">Create</button>

    <?php echo $this->Form->end(); ?>

  </div>

</div>
