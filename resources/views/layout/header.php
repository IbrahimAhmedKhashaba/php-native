<!DOCTYPE html>
<?php 
    if(session_has('local')){
        $lang = session_get('local');
        $dir = session_get('local') == 'ar' ? 'rtl': 'ltr';
    } else {
        $lang = 'en';
        $dir = 'ltr';
    }
?>
<html lang="<?php echo $lang ?>" dir="<?php echo $dir ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <title><?php echo isset($title) && !empty($title) ? $title : 'Project Name' ?></title>
</head>
<body>
<?php view('layout.navbar') ?> 
