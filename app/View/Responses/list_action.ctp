<div class="row">

  <div class="col-md-offset-2 col-md-8">

    <?php
      echo $this->Html->link(
      'Create New Response',
      array(
        'controller' => 'responses',
        'action' => 'createAction'
      ),
      array('class' => 'btn btn-default', 'target' => '')
    );
    ?>

    <?php if (count($responses) < 1): ?>
      <p>There are no Responses.</p>
    <?php else: ?>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Description</th>
          <th>Response</th>
          <th></th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($responses as $response): $obj = $response['Response']; ?>
          <tr>
          <td><?php echo $obj['label']; ?></td>
          <td><?php echo $obj['clarifies'] ?></td>
          <td>
            <?php
            echo $this->Html->link(
            ' ',
            array(
            'controller' => 'responses',
            'action' => 'deleteAction',
            'id' => $obj['id']
            ),
            array('class' => 'glyphicon glyphicon-trash', 'target' => '')
            );
            ?>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <?php endif; ?>

</div>

</div>
