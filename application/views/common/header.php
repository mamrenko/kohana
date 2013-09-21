<div id="logo">
	<img src="<?= url::base(); ?>media/images/logo.png" alt="<?= $site_name; ?>" />
</div>
<p id="tagline">
	<em>Because it's all about you!</em>
</p>
<ul id="main_nav">
	<li><a href="<?= url::site(); ?>">Home</a></li>
	<li><a href="<?= url::site('page/about'); ?>">About <?= $site_name; ?></a></li>
	<li><a href="<?= url::site('page/why_egotist'); ?>">Why use Egotist?</a></li>
</ul

