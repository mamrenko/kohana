<!doctype html>
<html>

<head>
<? foreach ($styles as $style) : ?>
	<link rel="stylesheet" href="<?= url::base(); ?>media/css/<?= $style; ?>.css" type="text/css" media="screen" />
<? endforeach; ?>
<? foreach ($scripts as $script) : ?>
	<script src="<?= url::base(); ?>media/js/<?= $script; ?>.js" /></script>
<? endforeach; ?>
<title><?= $site_name; ?></title>
</head>

<body>
	<div id="container">
		<div id="header">
		    <?= View::factory('common/header')->render(); ?>
		</div>
		<div id="content">
		    <?= $content; ?>
		</div>
		<div id="footer">
		    <?= View::factory('common/footer')->render(); ?>
		</div>
	</div>
</body>

</html>