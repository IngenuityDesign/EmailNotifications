<div class="row">

  <div class="col-md-offset-2 col-md-8">

    <?php if (count($campaigns) < 1): ?>
      <p>There are no archived campaigns</p>
    <?php else: ?>
      <table class="table table-striped">
        <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Created</th>
            <th><i class="glyphicon glyphicon-thumbs-up"></i></th>
            <th><i class="glyphicon glyphicon-thumbs-down"></i></th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($campaigns as $obj): ?>
            <tr>
              <th scope="row">
                <?php
                echo $this->Html->link(
                $obj['id'],
                array(
                  'controller' => 'Campaigns',
                  'action' => 'viewAction',
                  $obj['id'],
                  'full_base' => true
                ),
                array('class' => '', 'target' => '')
              );
              ?>
            </th>
            <td><?php echo $obj['name']; ?></td>
            <td><?php echo $obj['created'] ?></td>
            <td>
              <?php
              echo $this->Html->link(
              $obj['yes'],
              array(
                'controller' => 'Campaigns',
                'action' => 'submitAction',
                $obj['id'],
                'full_base' => true,
                '?' => array('response' => 'yes')
              ),
              array('class' => '', 'target' => '')
            );
            ?>
          </td>
          <td>
            <?php
            echo $this->Html->link(
            $obj['no'],
            array(
            'controller' => 'Campaigns',
            'action' => 'submitAction',
            $obj['id'],
            'full_base' => true,
            '?' => array('response' => 'no')
            ),
            array('class' => '', 'target' => '')
            );
            ?>
          </td>
          <td>
            <?php
            if ($obj['open'] == 1) {
              echo $this->Html->link(
                ' ',
                array(
                  'controller' => 'Campaigns',
                  'action' => 'disableAction',
                  $obj['id'],
                  'full_base' => true
                ),
                array('class' => 'glyphicon glyphicon-ok', 'target' => '')
              );
            } else {
              echo $this->Html->link(
                ' ',
                array(
                'controller' => 'Campaigns',
                'action' => 'enableAction',
                $obj['id'],
                'full_base' => true
                ),
                array('class' => 'glyphicon glyphicon-remove', 'target' => '')
              );
            }
            ?>
            <a href=""></a></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <?php endif; ?>

</div>

</div>
