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
<p><?= URL::base()?></p>
<?php
$array_1 = array(
'first_name' => 'Joe',
'last_name' => 'User',
);

$array_2 = array(
'first_name' => 'Jason',
'last_name' => 'User2',
);

$array_3 = array(
'first_name' => 'Joerea',
'last_name' => 'User3',
);
$arrayList = array($array_1, $array_2, $array_3);
$first_name = Arr::pluck($arrayList, 'first_name');

?>
<?foreach($first_name as $first):?>
<p><?=$first?></p>
<?endforeach?>

