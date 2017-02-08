<div class="row">

  <div class="col-md-12">
    <h2 style=""><img src="/img/dialogue.png"></h2>
    <h1>Feedback</h1>

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
      
    <table class="table table-striped table-main" id="table-main">
      <thead>
        <tr>
          <th class="email">Email</th>
          <th class="yes">Yes</th>
          <th class="no">No</th>
          <!-- Dynamic -->
          <?php foreach ($response_types as $response_type): $obj = $response_type['ResponseType'];
            if (!$obj) continue; ?>
            <th class="response-type"><?php echo $obj['label']; ?></th>
          <?php endforeach; ?>
          <!-- End Dynamic -->
          <th class="comments">Comments</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($campaigns as $k => $obj): ?>
          <tr class="<?php echo $k%2 == 0 ? 'white' : 'gray'; ?>">
            <td scope="row" class="email">
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
            <td class="yes">
              <?php echo $obj['yes']; ?>
            </td>
            <td class="no">
              <?php echo $obj['no']; ?>
            </td>
            <?php foreach ($response_types as $response_type): $rObj = $response_type['ResponseType'];
              if (!$rObj) continue; ?>
              <td class="response-type">
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
            <td class="comments">
              <?php $numComments = count($obj['comments']); ?>
              <?php if ($numComments < 1): ?>
                0
              <?php else: ?>
              <a data-toggle="collapse" class="collapsed" href="#collapse-comments-<?php echo $obj['id']; ?>">
              <?php echo $numComments; ?> <i class="glyphicon glyphicon-chevron-down open"></i><i class="glyphicon glyphicon-chevron-right closed"></i>
              </a>
              <?php endif; ?>
            </td>
          </tr>
          <?php if (count($obj['comments'] > 0)): ?>
          <tr class="subtable-wrapper">
            <td colspan="<?php echo (4 + count($response_types)); ?>" width="100%">
              <div class="collapse" id="collapse-comments-<?php echo $obj['id']; ?>">
                <table class="table table-striped comments-table">
                  <?php foreach($obj['comments'] as $k => $comment): ?>
                  <tr>
                    <td class="comment-id"><div><?php echo $k + 1; ?></div></td>
                    <td class="comment-text"><p><?php echo $comment; ?></p></td>
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
