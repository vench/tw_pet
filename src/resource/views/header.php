<?php $active = isset($active) ? $active : 'home'; ?>
<?php $title = isset($title) ? $title : 'List pages'; ?>
<?php $keywords = isset($keywords) ? $keywords : $title; ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <meta name="description" content="">
    <meta name="author" content=""> 
    
    <meta name="keywords" content="<?php echo $keywords;?>" />

    <title>Page GRUD | <?php echo $title;?></title>

    
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
 
  </head>
  <body>

    <div class="container">
      <div class="header clearfix">
        <nav>
          <ul class="nav nav-pills pull-right">
            <li role="presentation" <?php if($active == 'home'):?>class="active"<?php endif;?>><a href="/">List</a></li>
            <li role="presentation" <?php if($active == 'add'):?>class="active"<?php endif;?>><a href="/index.php?a=page/add">Add</a></li>
            
          </ul>
        </nav>
        <h3 class="text-muted"><?php echo $title;?></h3>
      </div>

 

      <div class="row marketing">
        <div class="col-lg-12">
