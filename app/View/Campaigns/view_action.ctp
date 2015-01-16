<div class="row">

  <div class="col-md-offset-2 col-md-8">

    <ol class="breadcrumb">
      <li><a href="/"><i class="glyphicon glyphicon-home"></i></a></li>
      <li>
        <?php
          echo $this->Html->link(
            'Listing',
            array(
              'controller' => 'campaigns',
              'action' => 'listAction'
            )
          );
        ?>
      </li>
      <li class="active"><?php echo $name; ?></li>
    </ol>

    <div class="form-horizontal">
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-3 control-label">Yes Link</label>
        <div class="col-sm-9">
            <input readonly="" type="text" class="form-control" aria-label="Yes link" value="<?php
            echo $this->Html->url(
              array(
                'controller' => 'campaigns',
                'action' => 'submitAction',
                'id' => $id,
                'full_base' => true,
                '?' => array('response' => 'no')
              )
            ); ?>">
        </div>
      </div>
      <div class="form-group">
        <label for="inputPassword3" class="col-sm-3 control-label">No Link</label>
        <div class="col-sm-9">
            <input readonly="" type="text" class="form-control" aria-label="No link" value="<?php
            echo $this->Html->url(
              array(
                'controller' => 'campaigns',
                'action' => 'submitAction',
                'id' => $id,
                'full_base' => true,
                '?' => array('response' => 'no')
              )
            ); ?>">
        </div>
      </div>
    </div>

    <table class="table table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>IP</th>
          <th>Created</th>
          <th>Response</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($feedback as $feedbackItem): $obj = $feedbackItem['Feedback']; ?>
          <tr>
            <th scope="row"><?php echo $obj['id']; ?></th>
            <td><?php echo $obj['ip']; ?></td>
            <td><?php echo $obj['created'] ?></td>
            <td><?php echo ucwords($obj['response']) ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

  </div>

</div>
