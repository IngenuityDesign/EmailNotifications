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

	<p>Please help us improve by answering the following:</p>

	<?php echo $this->Form->create('Feedback', array('class' => 'form')); ?>
	
		<?php echo $this->Form->input('feedbackId', array(
			'value' => $feedback->id,
			'type' => "hidden"
		)); ?>

		<div class="response-wrapper">
			
			<div class="input-group">
		      <span class="input-group-addon">
		        <input name="Feedback[Message]" type="radio" value="1">
		      </span>
		      <label class="form-control">Email was too long</label>
		    </div><!-- /input-group -->

		    <div class="input-group">
		      <span class="input-group-addon">
		        <input name="Feedback[Message]" type="radio" value="2">
		      </span>
		      <label class="form-control">Email was of little importance</label>
		    </div><!-- /input-group -->

		    <div class="input-group">
		      <span class="input-group-addon">
		        <input name="Feedback[Message]" type="radio" value="3">
		      </span>
		      <label class="form-control">Email was too confusing / did not provide clear action</label>
		    </div><!-- /input-group -->


		    <div class="input-group">
		      <span class="input-group-addon">
		        <input name="Feedback[Message]" type="radio" value="4">
		      </span>
		      <label class="form-control">Email had an error</label>
		    </div><!-- /input-group -->

		    <div class="input-group">
		      <span class="input-group-addon">
		        <input name="Feedback[Message]" type="radio" value="0">
		      </span>
		      <label class="">
		      	<div class="row">
		      		<div class="col-sm-1">
		      			Other
	      			</div>
	      			<div class="col-sm-11">
	      				<textarea class="form-control" name="Feedback[CustomMessage]"></textarea>
	      			</div>
		      	</div>
		      </label>
		    </div><!-- /input-group -->
		</div>

		<button type="submit" class="btn btn-lg">Send <i class="glyphicon glyphicon-chevron-right"></i></button>

	<?php echo $this->Form->end(); ?>



<?php endif; ?>
</div>
