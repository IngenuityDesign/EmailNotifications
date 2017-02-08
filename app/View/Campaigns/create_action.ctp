<div class="row">

  <div class="col-md-offset-2 col-md-8">

    <p>CREATE AN ITEM</p>

    <?php echo $this->Form->create('Campaign', array('class' => 'form-horizontal')); ?>

      <div class="form-group">
        <label for="NameField" class="col-sm-2 control-label">Name</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="NameField" placeholder="Name" name="NameField" value="<?php echo $name; ?>">
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-default">Create</button>
        </div>
      </div>

    <?php echo $this->Form->end(); ?>

  </div>

</div>
