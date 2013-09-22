<h1>Welcome to <?= isset($site_name) ? $site_name : 'Egotist'; ?></h1>
<p><?= $random; ?> is a number between 1 and 10</p>
<?foreach($datar as $data): ?>
<p><?= $data?></p>
<?endforeach?>
<h2><?=Date::fuzzy_span(time() -5000);?></h2>
<?=HTML::anchor('/welcome', 'Welcome_page', array(
    'class' => 'foobar',
    
));?>
<p><?= URL::title('Narwayls are real, - "Breaking News"');?></p>
