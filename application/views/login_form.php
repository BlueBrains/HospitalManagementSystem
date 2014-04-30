<html>
    <head> <title> Test of Html </title> </head>
	
    <body>
		<form action="login/validate_credentials" method="post">
			User name: <input type="text" name="username"><br>
			Password : <input type="password" name="password"><br>
			Sign As :<br> 
			&nbsp;&nbsp;&nbsp;&nbsp;	Doctor :&nbsp;			<input type="radio" name="ID" value="Doctor"><br>
			&nbsp;&nbsp;&nbsp;&nbsp; 	Patient :&nbsp;				  <input type="radio" name="ID" value="Patient"><br>
			<input type="submit" name="l">		
				
</form>	
	<form action="login/signup" method="post">
			<input type="submit" name="l" value="CreatOne">		
</form>
</body>
</html>