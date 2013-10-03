<h2>Private Profile for <?php echo HTML::chars($user->username); ?></h2>

<h3>Your Recent Messages:</h3>
<?php if (count($messages)) : ?>
	<?php foreach($messages as $message) : ?>
		<p class="message">
			<?php echo HTML::chars($message->content); ?>
			<br />
			<span class="published"><?php echo Date::fuzzy_span($message->date_published)?></span>
			<?php if (time() - $message->date_published < 900) : ?>
				<div class="options">
					<a href="<?php echo url::site("messages/edit/{$message->user_id}/{$message->id}") ?>">Edit Message</a> | 
					<a href="<?php echo url::site("messages/delete/{$message->user_id}/{$message->id}") ?>">Delete Message</a>
				</div>
			<?php endif; ?>
		</p>
		<hr />
	<?php endforeach; ?>
<?php else: ?>
	<p>You have no messages in the system.</p>
<?php endif; ?>
<p><?php echo HTML::anchor('messages/add', 'Create New Message'); ?></p>

<?php echo $pager_links; ?>