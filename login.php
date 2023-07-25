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
					
					<input type="input" name="txt" placeholder="Name" id="name" oninput="clearError('name')" class="input-clear">
					<div id="nameError" class="error"></div>
					
					<input type="input" name="email" placeholder="Email" id="email" oninput="clearError('email')" class="input-clear">
					<div id="emailError" class="error"></div>
					
					<input type="password" name="pswd" placeholder="Password" id="password" oninput="clearError('password')" class="input-clear">
					<div id="passwordError" class="error"></div>
					
					<button type="submit" value="Submit" id="submitBtn" class="signupbtn" >Sign up</button>
				</form>
			</div>

			<div class="login" action="post">
				<form>
					<label for="chk" aria-hidden="true">Login</label>
					
					<input type="input" name="email" placeholder="Email" required="">
					
					<input type="password" name="pswd" placeholder="Password" required="">
					
					<button class="loginbtn">Login</button>
				</form>
			</div>
	</div>
	</div>

	<script src="js/validation.js"></script>
</body>
</html>