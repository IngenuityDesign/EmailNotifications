<div class="row">

  <div class="col-md-offset-2 col-md-8">

    <?php
      echo $this->Html->link(
      'Create New User',
      array(
        'controller' => 'users',
        'action' => 'createAction'
      ),
      array('class' => 'btn btn-default', 'target' => '')
    );
    ?>

    <?php if (count($users) < 1): ?>
      <p>There are no users.</p>
    <?php else: ?>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Name</th>
          <th>Role</th>
          <th></th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($users as $user): $obj = $user['User']; ?>
          <tr>
          <td><?php echo $obj['username']; ?></td>
          <td><?php echo $obj['role'] ?></td>
          <td scope="row">
            <?php
              echo $this->Html->link(
              $this->Html->tag('i', '', array('class' => "glyphicon glyphicon-pencil")),
              array(
                'controller' => 'users',
                'action' => 'editAction',
                'id' => $obj['id'],
                'full_base' => true
              ),
              array('class' => '', 'target' => '', 'escape' => false)
            );
            ?>
          </td>
          <td>
            <?php
            echo $this->Html->link(
            ' ',
            array(
            'controller' => 'users',
            'action' => 'deleteAction',
            'id' => $obj['id']
            ),
            array('class' => 'glyphicon glyphicon-remove', 'target' => '')
            );
            ?>
            <a href=""></a></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <?php endif; ?>

</div>

</div>
