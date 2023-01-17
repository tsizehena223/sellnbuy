<!doctype html>
<html>
	<head>
		<title>SellAndBuy - Log in</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="shortcut icon" type="image/png" href="../img/S&B.png">
		<link rel="stylesheet" href="../css/login.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
	</head>
	<body>
		<form action="../../../php/connection_login.php" method="post">
			<div class="container">
				<img class="image" src="../img/S&B.png" title="Sell&Buy" alt="Logo Sell&Buy">
				<div class="contacts">
					<h3 class="h3" style="margin-bottom: 4%;">Contacts :</h3>
					<ul>
						<li><img src="../img/fb.png" alt="FB icon" title="Facebook"><a href="https://www.facebook.com/SellBuy-103018849174346" target="_blank">Sell&Buy</a></li>
						<li><img src="../img/mail.png" alt="mail icon" title="Mail"><a href="#" target="_blank">SB@gmail.com</a></li>
						<li><img src="../img/tiktok.png" alt="Logo TikTok" title="TikTok"><a href="#" target="_blank">Sell&BuyTT</a></li>
					</ul>
				</div>
				<fieldset>
					<h1 class="h1">User Login</h1>
					<table>
						<tr>
							<td><label for="tb_pseudo">Pseudo :</label>
							</td>
							<td><input class="inp" type="text" id="tb_pseudo" autocomplete="none" name="pseudo" size="30" maxlength="30" placeholder="Pseudo" required="required">
							</td>
						</tr>
						<tr>
							<td></td>
							<td><span id="mail_incomplete"></span></td>
						</tr>
						<tr>
							<td><br><label for="pb_pass">Password: </label>
							</td>
							<td>
								<br><input class="inp" type="password" id="pb_pass" name="psw" size="30" maxlength="15" placeholder="Password" required="required">
								<div class="password-icon">
									<i class="fa fa-eye"></i>
									<i class="fa fa-eye-slash"></i>
								</div>
							</td>
						</tr>
						<tr>
							<td></td>
							<td><span id="pass_incomplete"></span></td>
						</tr>
					</table>
					<h3 class="h3">Login as<h3>
					<label style="text-decoration: none;"><input type="radio" name="userType" value="Customer">Customer</label>
					<label style="text-decoration: none;"><input type="radio" name="userType" value="Seller">Seller</label>
					<br><button type="submit" value="Valider" id="logbutton" name="login">Login</button><br>
					<br><a class="signup" href="signin.php">Don't have an account yet ? Click here to sign up !</a>
				</fieldset>
			</div>
		</form> 
		<!--script src="../js/login.js"></script-->
		<script>
			const eye = document.querySelector('.fa-eye');
			const eyeoff = document.querySelector('.fa-eye-slash');
			const passwordField = document.querySelector('input[type=password]');
	
			eye.addEventListener('click', () => {
				eye.style.display = "none";
				eyeoff.style.display = "block";
				passwordField.type = "text";
			})
	
			eyeoff.addEventListener('click', () => {
				eyeoff.style.display = "none";
				eye.style.display = "block";
				passwordField.type = "password";
			})
		</script>
		<?php require_once "../../../php/message.php"; ?>
	</body>
</html>