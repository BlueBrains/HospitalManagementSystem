<!DOCTYPE html>

<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
	<title><?php echo $title ?></title>
	<link rel="stylesheet" href="<?php echo base_url();?>/css/bootstrap/css/bootstrap.min.css" type="text/css" media="screen" />
	<script type="text/javascript" src="<?php echo base_url();?>/js/jquery.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>/css/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
	<nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href=<?php if(isset($linkbar0)) echo base_url().$linkbar0; else echo base_url()."#"; ?>><?php if(isset($bar0)) echo $bar0; else echo "Brand" ?></a>
    </div>
	
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href= <?php if(isset($linkbar1)) echo base_url().$linkbar1; else echo base_url()."login"; ?>><?php if(isset($bar1)) echo $bar1; else echo "Log In " ?> </a></li>
        <li><a href= <?php if(isset($linkbar2)) echo base_url().$linkbar2; else echo base_url()."#"; ?>><?php if(isset($bar2)) echo $bar2; else echo "Contact Us" ?></a></li>
      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<div class="container"><!-- main page container -->