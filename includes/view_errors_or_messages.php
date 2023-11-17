<?php if(!empty($errors)): ?>
	<div class="alert alert-danger">
		<h3>Error(s)</h3><hr>
		<?php foreach($errors as $error): ?>
			<p><?php echo $error; ?></p>
		<?php endforeach; ?>
	</div>
<?php elseif(!empty($messages)): ?>
	<div class="alert alert-success">
		<h3>Message(s)</h3><hr>
		<?php foreach($messages as $message): ?>
			<p><?php echo $message; ?></p>
		<?php endforeach; ?>
	</div>
<?php endif; ?>