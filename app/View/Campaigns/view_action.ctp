<div class="row">

  <div class="col-md-offset-2 col-md-8">

    <ol class="breadcrumb">
      <li><a href="/"><i class="glyphicon glyphicon-home"></i></a></li>
      <li>
        <?php
          echo $this->Html->link(
            'Listing',
            array(
              'controller' => 'Campaigns',
              'action' => 'listAction',
              'full_base' => true
            )
          );
        ?>
      </li>
      <li class="active"><?php echo $name; ?></li>
    </ol>

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
