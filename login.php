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
                
			<form method="post" id="myform" action="saveuser.php" enctype="multipart/form-data" onsubmit="return validateForm()">
					<label for="chk" aria-hidden="true">Sign up</label>
					
					<input type="input" name="name" placeholder="Name" id="name" oninput="clearError('name')" class="input-clear" >
					<div id="nameError" class="error"></div>
					
					<input type="input" name="email" placeholder="Email" id="email" oninput="clearError('email')" class="input-clear" >
					<div id="emailError" class="error"></div>
					
					<input type="tel" name="phone" placeholder="Phone" id="phone" oninput="clearError('phone')" class="input-clear" >
					<div id="phoneError" class="error"></div>

					<input type="password" name="password" placeholder="Password" id="password" oninput="clearError('password')" class="input-clear" >
					<div id="passwordError" class="error"></div>
					
					<button id="submitBtn">Sign up</button>
				</form>
			</div>

			<div class="login" action="post">
			<form action="logincheck.php" method="post">

					<label for="chk" aria-hidden="true">Login</label>
					
					<input type="email" name="email" class="form_field" placeholder="Email" required/>
					
					<input type="password" name="password" id="log_password"class="form_field" placeholder="Password" required/>
					
					<button class="loginbtn">Login</button>
				</form>
			</div>
	</div>
	</div>

	<script src="js/validation.js"></script>
</body>
</html>