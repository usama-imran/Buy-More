<?php 

include("Path\include.php");


?>

<html>
	<head>
	<title>Login</title>
		<style type="text/css">
			body 
			{
		    background-image: url('../../../View/Assets/Images//login.jpg');
		    background-repeat: no-repeat;
		    background-attachment: fixed;
		    -webkit-background-size: cover;
		  	-moz-background-size: cover;
		  	-o-background-size: cover;
		  	background-size: cover;
			}
		</style>
	</head>
	<body>
		<center>
			<div style="margin-top:10%">
				<fieldset class="well" style="width:35%">
					<legend class="well" style="width:30%">Login</legend>	
					<form action="../../../Controller/login_controller/Login_Controller/do_login" method="post">
					<table>
						<tr>
							<td>Email:</td><td><input type="email" name="email"></td>
						</tr>
						<tr><td>&nbsp;</td></tr>
						<tr class="margin_class">
							<td>Password:&nbsp;&nbsp;</td><td><input type="password" name="password"></td>
						</tr>
						<tr><td>&nbsp;</td></tr>
						<tr>
							<td></td><td><input type="submit" value="Login" class="btn btn-primary"></td>
						</tr>
					</table>
					</form>
				</fieldset>
			</div>
		</center>
	</body>
</html>