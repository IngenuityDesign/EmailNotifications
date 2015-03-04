<div class="row">

  <div class="col-md-12">

    <?php
      echo $this->Html->link(
      'Create New Campaign',
      array(
        'controller' => 'campaigns',
        'action' => 'createAction'
      ),
      array('class' => 'btn btn-default', 'target' => '')
    );
    ?>

    <?php if (count($campaigns) < 1): ?>
      <p>There are no active campaigns</p>
    <?php else: ?>
      
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Email</th>
          <th>Yes</th>
          <th>No</th>
          <!-- Dynamic -->
          <?php foreach ($response_types as $response_type): $obj = $response_type['ResponseType'];
            if (!$obj) continue; ?>
            <th><?php echo $obj['label']; ?></th>
          <?php endforeach; ?>
          <!-- End Dynamic -->
          <th>Comments</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($campaigns as $obj): ?>
          <tr>
            <td scope="row">
              <?php
              echo $this->Html->link(
                $obj['name'],
                array(
                  'controller' => 'campaigns',
                  'action' => 'viewAction',
                  'id' => $obj['id'],
                  'full_base' => true
                ),
                array('class' => '', 'target' => '')
              );
              ?>
            </td>
            <td>
              <?php echo $obj['yes']; ?>
            </td>
            <td>
              <?php echo $obj['no']; ?>
            </td>
            <?php foreach ($response_types as $response_type): $rObj = $response_type['ResponseType'];
              if (!$rObj) continue; ?>
              <td>
              <?php
              $types = $obj['types'];
              if (array_key_exists($rObj['id'], $types)) {
                echo $types[$rObj['id']];
              } else {
                echo 0;
              }
              ?>
              </td>
            <?php endforeach; ?>
            <!--td>
              <?php
                echo $this->Html->link(
                ' ',
                array(
                  'controller' => 'campaigns',
                  'action' => 'disableAction',
                  'id' => $obj['id']
                ),
                array('class' => 'glyphicon glyphicon-ok', 'target' => '')
              );
              ?>
            </td-->
            <td>
              <?php $numComments = count($obj['comments']); ?>
              <?php if ($numComments < 1): ?>
                0
              <?php else: ?>
              <a data-toggle="collapse" href="#collapse-comments-<?php echo $obj['id']; ?>">
              <?php echo $numComments; ?> <i class="glyphicon glyphicon-chevron-right"></i></a>
              <?php endif; ?>
            </td>
          </tr>
          <?php if (count($obj['comments'] > 0)): ?>
          <tr class="subtable-wrapper">
            <td colspan="6" width="100%">
              <div class="collapse" id="collapse-comments-<?php echo $obj['id']; ?>">
                <table class="table table-striped">
                  <?php foreach($obj['comments'] as $k => $comment): ?>
                  <tr>
                    <td><?php echo $k + 1; ?></td>
                    <td><?php echo $comment; ?></td>
                  </tr>
                  <?php endforeach; ?>
                </table>
              </div>
            </td>
          </tr>
          <?php endif; ?>
        <?php endforeach; ?>
      </tbody>
    </table>
    <?php endif; ?>

  </div>

</div>
