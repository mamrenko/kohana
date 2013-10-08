<?php Cookie::$expiration = Date::WEEK;
 Cookie::$domain = 'www.packtpub.com';
 Cookie::$domain = '.packpub.com';
 Cookie::$path = '/somepath/';
 Cookie::$secure = TRUE;
 Cookie::$httponly = TRUE;

?>
<h1>Recent Messages on Egotist 1111111</h1>

<?php foreach ($messages as $message) : ?>

	<p class="message">
		<?php echo HTML::chars($message->content); ?>
		<br />
		<span class="published">
			<?php echo Date::fuzzy_span($message->date_published)?>
			by <?= HTML::anchor(("messages/get_messages/{$message->user->id}"), 
				HTML::chars($message->user->username)
			); ?>
		</span>
	</p>

	<hr />

<?php endforeach; ?>

<?php echo $pager_links; ?>