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
<?=var_dump($first)?>
 The Arr::merge[] method
 <?php
    $array_01 = array(
        'id' => 1,
        'favorite_foods' => array(
            'bacon', 'chessburgers', 'pizza'
        )
        
    );
    
    $array_02 = array(
        'id' => 2,
        'favorite_foods' => array(
            'bacon', 'bananas', 'apples'
        )
        
    );
$merged = Arr::merge($array_02, $array_01);
?>
 <p><?var_dump($merged);?></p>
 <h2>The Arr::overwrite[] method</h2>
 
 <?php
 $defaults = array(
   'page' => '1',
   'keywords' => null,
   'sort_order' => 'asc',
   'order_by' => 'name'
    
 );
 $new_defaults = array(
   'page' => '11',
   'keywords' => 'bacon, narwal',
   'sort_order' => 'rank',
   'user_name' => 'user_name'
    
 );
 $values = Arr::overwrite($defaults, $new_defaults);
 ?>
<?
  var_dump($values)?>
 <h2>The Arr::flatten</h2>   
     <?php
$multi = array(
    'id' => array(
        'favorite_foods' => array(
            'bacon', 'cheesburgers', 'pizza','bananas','apples'
        )
    )
    
    
);
$flat = Arr::flatten($multi);
var_dump($flat);


?>
<?foreach($flat as $fla):?>
 <p><?=$fla?></p>
<? endforeach; ?>
 <h2>The Arr::unshift[] method</h2>
 <?php $user = array(
     'first_name' => 'Jason',
     'last_name' => "Mamrenko",
     'user_name' => 'dseavsxxx'
 );
$user = Arr::unshift($user, 'id', 42);
var_dump($user);
?>

 <h2>The Arr::map[] method</h2>
 <?php
    $user2 = array(
        'id' => 42,
        'userinfo' =>  array(
            'first_name' => 'Aleksandra',
            'last_name' => 'Mamrenko',
            'user_name' => 'brsdera',
        )
    );
    $big_user = Arr::map('strtoupper', $user2);
    var_dump($big_user);
    ?>

 <h2>The Arr::is_array[] method</h2>
 <?php 
 $a = Arr::is_array(array());
 var_dump($a);
 ?>
 <h2>The Arr::is_range[] method</h2>
 <?php 
 $range = Arr::range(1,10);
 var_dump($range);
 ?>

 <h2>The Cookie Class</h2>
 <?php
 Cookie::set('username', 'gftrhdhdjueueej');
 $username = Cookie::get('username');
 
 ?>
 <p><?  var_dump($username);?></p>
 <?php Cookie::delete('username');?>
 
 <h2>The Encrypt Class</h2>
 
 <?php 
 $encrypt = Encrypt::instance();
 $email = $encrypt->encode('admin@ass.ru');
 echo $email;
 
 $decrypted_email = $encrypt->decode($email);
 echo $decrypted_email;
 ?>
 <h2>The Feed Class</h2>
 <?php 
 $info = array(
     'title' => 'Test Feed',
     'link' => URL::site('some/link/location'),
     'generator' => 'Egotist Beta'
 );
 $items = array(
     array(
         'title' => 'Test Feed Item One...',
         'summay' => 'This is a test feed item...',
         'putdate' => date('r', time())
     ),
     array(
         'title' => 'Test Feed Item Two...',
         'summay' => 'This is a test feed item...',
         'putdate' => date('r', time() -2500)
     )
     
 );
  $feed =  Feed::create($info, $items, 'atom');
  $parsed = Feed::parse($feed);
  var_dump($parsed);
 ?> 
  
  <h2>The Form Class</h2>
  <?php 
  echo Form::open(URL::site('form/submit-to-page'),
          array(
              'enctype' =>'multipart/form-data',
              'class' => 'form1'
              
          ));?>
  