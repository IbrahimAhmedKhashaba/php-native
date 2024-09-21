<?php view('layout.header') ;
    if(session_has('sucess')){
        echo session_flash('success');
    }
?>
<h1>
    Home Page
</h1>
<form method="post" action="<?php echo url('users') ?>">
    <input type="text" name="username"/>
    <input type="hidden" name="_method" value="post"/>
    <input type="submit" value="send"/>
</form>
<?php view(path: 'layout.footer') ?>
