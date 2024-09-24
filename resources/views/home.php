<?php view('layout.header' , ['title'=>trans('main.home')]) ;
?>
<h1 class="fs-1 bg-primary text-danger">
    Home Page
</h1>
<form method="post" action="<?php echo url('upload') ?>" enctype="multipart/form-data">
    <input type="file" name="image" class='form-control'/>
    <input type="hidden" name="_method" value='post'/>
    <input type="submit" value="send"/>
</form>
<?php view(path: 'layout.footer') ?>
