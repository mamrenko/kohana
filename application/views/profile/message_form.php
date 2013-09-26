<h2>Add New message</h2>
<?=Form::open();?>
<div classes="field">
    <?=Form::textarea('content');?>
</div>
<div class="field">
    <?=Form::submit('add_message', 'Create New Message');?>
</div>

<?=Form::close()?>
