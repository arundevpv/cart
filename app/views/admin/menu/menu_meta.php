<?php
 $path=Request::path();
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CART</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
 <!-- Bootstrap -->
 <!--<link href="css/bootstrap.css" rel="stylesheet" type="text/css">-->
 <link type="text/css" rel="stylesheet" href="<?php echo Request::root()?>/css/jquery-ui.css">
 <?php
 if($path=='adds'){?>
 <link type="text/css" rel="stylesheet" href="<?php echo Request::root()?>/css/dropzone.css">
 <?php
 }?>
 <link href="<?php echo Request::root()?>/css/style.css" rel="stylesheet">
  <script src="<?php echo Request::root()?>/js/jquery-1.7.2.js"></script>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
 <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
 <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
 <![endif]-->
