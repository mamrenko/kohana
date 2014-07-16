<?php defined('SYSPATH') or die('No direct script access.');

$form_type = Request::instance()->action == 'add' ? 'Create New' : 'Edit' ?>

<?php if ($errors): ?>
	<h2 class="error">There were form errors.</h2>
	<ul class="errors">
	<?php foreach ($errors as $error): ?>
		<li><?php echo $error ?></li>
	<?php endforeach; ?>
	</ul>
<?php endif; ?>

<h2><?php echo $form_type; ?> Message</h2>
<?php echo Form::open(); ?>
	<div class="field">
		<?php $body = isset($value) ? $value : ''; ?>
		<?php echo Form::textarea('content', $body); ?>
	</div>
	<div class="field">
		<?php echo Form::submit('message_form', "$form_type Message"); ?>
	</div>

<?php echo Form::close(); ?>