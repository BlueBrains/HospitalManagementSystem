<!DOCTYPE HTML>
<!-- Website Template by freewebsitetemplates.com -->
<html>
<head>
	<meta charset="UTF-8">
	<title>Contact - Laboratory Website Template</title>
	<link rel="stylesheet" href="<?php echo base_url();?>css/style.css" type="text/css">
</head>
<body>
	<div id="header">
		<a href="index.html" class="logo"><img src="<?php echo base_url();?>images/logo.png" alt=""></a>
		<ul>
			<li>
				<a href= "red" >home</a>
			</li>
			<li>
				<a href="about.html">about</a>
			</li>
			<li>
				<a href="services.html">services</a>
			</li>
			<li>
				<a href="location.html">our locations</a>
			</li>
			<li class="selected">
				<a href="contact.html">contact</a>
			</li>
			<li>
				<a href="blog.html">blog</a>
			</li>
		</ul>
	</div>
	<div id="body">
		<div class="content">
			<img src="<?php echo base_url();?>images/telephone.jpg" alt="">
			<h2>send us a message</h2>
			<form action="create_member" method="post">
				<label for="firstName"> <span>first name*</span>
					<input type="text" name="first_name" id="first_name">
				</label>
				<label for="lastName"> <span>last name*</span>
					<input type="text" name="last_name" id="last_name">
				</label>
				<label for="username"> <span>username*</span>
					<input type="text" name="username" id="username">
				</label>
				<label for="password"> <span>password*</span>
					<input type="password" name="password" id="password">
				</label>
				<label for="email"> <span>email*</span>
					<input type="text" name="email" id="email">
				</label>
				<label for="phoneNumber"> <span>Phone Number*</span>
					<input type="text" name="mobile" id="mobile">
				</label>
				<input type="submit" name="l1" id="submit">
			</form>
		</div>
		<div class="sidebar">
			<h3>contact</h3>
			<ul>
				<li>
					<span class="address">address</span>
					<ul>
						<li>
							Illumelabs
						</li>
						<li>
							Diagnostic Center
						</li>
						<li>
							3952 Glen Falls Road
						</li>
						<li>
							Wayne, PA 19088
						</li>
					</ul>
				</li>
				<li>
					<span class="phone">telephone</span>
					<ul>
						<li>
							215.859.9423
						</li>
					</ul>
				</li>
				<li>
					<span class="email">email</span>
					<ul>
						<li>
							<a href="http://www.freewebsitetemplates.com/misc/contact">nyc@volumeone.com</a>
						</li>
					</ul>
				</li>
				<li>
					<span class="twitter">twitter</span>
					<ul>
						<li>
							<a href="http://freewebsitetemplates.com/go/twitter/">@mattovolumeone</a>
						</li>
					</ul>
				</li>
				<li>
					<span class="facebook">facebook</span>
					<ul>
						<li>
							<a href="http://freewebsitetemplates.com/go/facebook/">www.facebook/illumelabs</a>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
	<div id="footer">
		<div>
			<p>
				<span>2023 &copy; Illumelabs Diagnostic Center.</span><a href="#" >Terms of Service</a> | <a href="#" >Privacy Policy</a>
			</p>
			<ul>
				<li id="facebook">
					<a href="http://freewebsitetemplates.com/go/facebook/">facebook</a>
				</li>
				<li id="twitter">
					<a href="http://freewebsitetemplates.com/go/twitter/">twitter</a>
				</li>
				<li id="googleplus">
					<a href="http://freewebsitetemplates.com/go/googleplus/">googleplus</a>
				</li>
				<li id="rss">
					<a href="#" >rss</a>
				</li>
			</ul>
		</div>
	</div>
</body>
</html>