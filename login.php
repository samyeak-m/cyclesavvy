<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">

	<title>Log in</title>
	<link rel="stylesheet" type="text/css" href="css/login.css">

</head>
<body>
	<div class="logform">
	<div class="main">  	
		<input type="checkbox" id="chk" aria-hidden="true">

			<div class="signup">
                
				<form method="post" action="#correct" onsubmit="return validateForm()">
					<label for="chk" aria-hidden="true">Sign up</label>
					<input type="text" name="txt" placeholder="Name" id="name" required="">
					<input type="email" name="email" placeholder="Email" id="email">
					<input type="password" name="pswd" placeholder="Password" id="password">
					<button class="signupbtn">Sign up</button>
					<div id="errorMessages"></div>
				</form>
			</div>

			<div class="login" action="post">
				<form>
					<label for="chk" aria-hidden="true">Login</label>
					<input type="email" name="email" placeholder="Email" required="">
					<input type="password" name="pswd" placeholder="Password" required="">
					<button class="loginbtn">Login</button>
				</form>
			</div>
	</div>
	</div>

	<script src="js/validation.js"></script>
</body>
</html>