<h1>Recent Messages on Egotist</h1>

<?php foreach ($messages as $message) : ?>

	<p class="message">
		<?php echo $message['content']; ?>
		<br />
		<span class="published">
			<?php echo Date::fuzzy_span($message['date_published'])?>
		</span>
	</p>

	<hr />

<?php endforeach; ?>

<?php echo $pager_links; ?>