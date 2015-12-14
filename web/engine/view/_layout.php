<?php if(!defined("IN_RULE")) die ("Oops"); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?php echo $pageTitle; ?></title>

    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/css/signin.css" rel="stylesheet">
    <link href="/assets/css/custom.css" rel="stylesheet">   
    <script type="text/javascript" src="/assets/js/signin.js"></script>  
    <script type="text/javascript" src="/assets/js/custom.js"></script> 
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">

      <?php if (is_readable(dirname(__FILE__)."/".$content_view.".php")) include(dirname(__FILE__)."/".$content_view.".php"); ?>

    </div> <!-- /container -->


  </body>
</html>