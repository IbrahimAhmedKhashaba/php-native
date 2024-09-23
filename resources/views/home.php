<?php view('layout.header' , ['title'=>trans('main.home')]) ;
    // if(session_has('success')){
    //     echo session_flash('success');
    // }


    // set_local('en');
    // var_dump(trans('main.home'));
    // var_dump(trans(''));
?>
<h1 class="fs-1 bg-primary text-danger">
    Home Page
</h1>
<form method="post" action="<?php echo url('users') ?>">
    <input type="text" name="username"/>
    <input type="hidden" name="_method" value="post"/>
    <input type="submit" value="send"/>
</form>
<?php view(path: 'layout.footer') ?>
