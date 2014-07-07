<?php if (!isset($_SESSION['username'])):?>
		<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="ie6 ielt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="ie7 ielt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="ie8"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html lang="en"> <!--<![endif]-->
<head>
<meta charset="utf-8">
<title>Paper Stack</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/css/style4.css" />
</head>
<body>
<div class="container" style="margin-top: 160px;">
	<section id="content" style="padding-top: 52px; padding-bottom: -19px;">
		<form action="">
			<h1>Login</h1>
			<div>
				<input type="text" placeholder="Username" required="" id="username" />
			</div>
			<div>
				<input type="password" placeholder="Password" required="" id="password" />
			</div>
			<div>
				<input type="submit" value="Log in" style="margin-top: 90px;"/>
				<a href="#" style="margin-top: 99px;">Register</a>
			</div>
		</form><!-- form -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>

						<form action="login/validate_credentials" method="post">
<?php else: redirect(); ?>
<?php endif ?>	
	



