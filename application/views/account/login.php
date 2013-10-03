<?php if ($errors): ?>
	<h2 class="error">There were form errors.</h2>
	<ul class="errors">
	<?php foreach ($errors  as $error): ?>
		<li><?php echo $error ?></li>
	<?php endforeach; ?>
	</ul>
<?php endif; ?>

<?php echo Form::open(); ?>
	
	<?php echo Form::label('username')?>
	<?php echo Form::input('username'); ?>
	
	<?php echo Form::label('password')?>
	<?php echo Form::password('password'); ?>
	
	<?php echo Form::submit('submit', 'Login'); ?>
	
<?php echo Form::close(); ?>