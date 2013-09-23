<?php echo Form::open();?>

<?= Form::label('username','Username');?>
<?= Form::input('username');?>

<?= Form::label('password','Password');?>
<?= Form::input('password');?>
<?= Form::submit('submit', 'Login');?>

<?= Form::close()?>

