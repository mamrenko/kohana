<h1>Sign up for Egotist.. You know you want to!</h1>

<?php if ($errors): ?>
	<h2 class="error">There were form errors.</h2>
	<ul class="errors">
	<?php foreach ($errors  as $error): ?>
		<li><?php echo $error ?></li>
	<?php endforeach; ?>
	</ul>
<?php endif; ?>

<?php echo Form::open(); ?>

	<div class="form-field">
		<?php echo Form::label('username', 'Username')?>
		<?php echo Form::input('username'); ?>	
	</div>
	
	<div class="form-field">
		<?php echo Form::label('email', 'Email Address')?>
		<?php echo Form::input('email'); ?>	
	</div>	
		
	<div class="form-field">
		<?php echo Form::label('password'); ?>
		<?php echo Form::password('password'); ?>	
	</div>
	
	<div class="form-field">
		<?php echo Form::label('password_confirm', 'Confirm Password')?>
	<?php echo Form::password('password_confirm'); ?>	
	</div>
	
	<div class="form-field">
		<?php echo Form::submit('submit', 'Create new account'); ?>	
	</div>
	
<?php echo Form::close(); ?>