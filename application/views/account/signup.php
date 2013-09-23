<h1>Sign up  for Egotist! You know you want to!</h1>

    
    
 <?= Form::open();?>
    <div class="form-field">

        <?= Form::label('first_name');?>
        <?= Form::input('first_name');?>
        
   </div>

   <div class="form-field">
       
        <?= Form::label('last_name');?>
        <?= Form::input('last_name');?>
    
   </div> 

 <div class="form-field">
       
        <?= Form::label('email', 'Email Address');?>
        <?= Form::input('email');?>
    
   </div> 
 <div class="form-field">
       
        <?= Form::label('password');?>
        <?= Form::input('password');?>
    
   </div> 
 <div class="form-field">
       
        <?= Form::label('password_confirm');?>
        <?= Form::input('password_confirm');?>
    
   </div>

 <div class="form-field">
       
        <?= Form::submit('submit', 'Create New Account');?>
    
   </div> 

<?= Form::close()?>

