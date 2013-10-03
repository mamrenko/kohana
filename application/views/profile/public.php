<h2>Profile for <?php echo HTML::chars($user->username); ?></h2>

<h3>Your Recent Messages:</h3>
<?php if (count($messages)) : ?>
	<?php foreach($messages as $message) : ?>
		<p class="message">
			<?php echo HTML::chars($message->content); ?>
			<br />
			<span class="published"><?php echo Date::fuzzy_span($message->date_published)?></span>
		</p>
		<hr />
	<?php endforeach; ?>
<?php else: ?>
	<p><?php echo HTML::chars($user->username); ?> has no messages in the system.</p>
<?php endif; ?>

<?php echo $pager_links; ?>