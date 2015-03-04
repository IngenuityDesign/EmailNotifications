<div class="feedback-wrapper">
<?php if ($response == 'yes'): ?>
  <h3><img src="/img/check.png"></h3>
  <h1>We’re glad this email was helpful.</h1>
  <h2>Thanks for your feedback!</h2>
<?php else: ?>
  <h3><img src="/img/x.png"></h3>
  <h1>We appreciate your feedback.</h1>
  <h2>We will continue to improve our emails and<br>
your response gets us one step closer.</h2>
<?php endif; ?>

<?php if ($custom_responses && count($custom_responses) > 0): ?>
	<p>Please help us improve by answering the following:</p>

	<?php echo $this->Form->create('Feedback', array(
		'class' => 'form',
		'url' => array('controller' => 'campaigns', 'action' => 'updateFeedbackAction')
	)); ?>

	<?php echo $this->Form->input('FeedbackID', array(
		'value' => $feedback->id,
		'type' => "hidden"
	)); ?>

	<div class="response-wrapper">

		<?php foreach($custom_responses as $cresponse): $obj = $cresponse['ResponseType']; ?>
			<div class="input-group">
		      <span class="input-group-addon">
		        <input name="Feedback[ResponseType][<?php echo $obj['id']; ?>]" type="checkbox" value="1">
		      </span>
		      <label class="form-control"><?php echo $obj['label']; ?></label>
		    </div><!-- /input-group -->

		<?php endforeach; ?>
	</div>

	<div class="form-group" style="text-align: left;">
	    <label>Other Comments</label>
	    <textarea class="form-control" name="Feedback[CustomMessage]"></textarea>
	</div>

	<button style="margin-top: 26px;" type="submit" class="btn btn-lg">Send <i class="glyphicon glyphicon-chevron-right"></i></button>

	<?php echo $this->Form->end(); ?>

<?php endif; ?>

</div>
