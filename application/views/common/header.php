<div id="logo">
	<img src="<?php echo url::base(); ?>media/images/logo.png" alt="<?php echo $site_name; ?>" />
</div>
<p id="tagline">
	<em>Because it's all about you!</em>
</p>
<ul id="main_nav">
	<li><a href="<?php echo url::site(); ?>">Home</a></li>
	<li><a href="<?php echo url::site('page/about'); ?>">About <?php echo $site_name; ?></a></li>
	<li><a href="<?php echo url::site('page/why_egotist'); ?>">Why use Egotist?</a></li>
        <li><a href="<?php echo url::site('page/debug'); ?>">Debug</a></li>
</ul>
<p id="account">

<?php if (Auth::instance()->logged_in() 
	&& $user = Auth::instance()->get_user()) : ?>
	Logged in as <?php echo HTML::chars($user->username); ?>.  <?php echo HTML::anchor('logout', 'Logout'); ?>

<?php else: ?>

	<?php echo HTML::anchor('login', 'Login'); ?> | <?php echo HTML::anchor('signup', 'Signup'); ?>

<?php endif; ?>

</p>