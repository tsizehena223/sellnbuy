<?php if (session_status() == PHP_SESSION_NONE) { session_start();} ?>
<!doctype html>
<html>
	<head>
		<title>SellAndBuy - Sign in</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="shortcut icon" type="image/png" href="../img/S&B.png">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
		<link rel="stylesheet" href="../css/style.css">
	</head>
	<body>
		<form id="login" action="../../../php/connection_signin.php" method="post">
			<div class="container">
				<img class="image" src="../img/S&B.png" title="Sell&Buy" alt="Logo Sell&Buy">
				<div class="contacts">
					<h3 class="h3" style="margin-bottom: 4%;">Contacts :</h4>
					<ul>
						<li><img src="../img/fb.png" alt="FB icon" title="Facebook"><a href="https://www.facebook.com/SellBuy-103018849174346y" target="_blank">Sell&Buy</a></li>
						<li><img src="../img/mail.png" alt="mail icon" title="Mail"><a href="#" target="_blank">SB@gmail.com</a></li>
						<li><img src="../img/tiktok.png" alt="Logo TikTok" title="TikTok"><a href="#" target="_blank">Sell&BuyTT</a></li>
					</ul>
				</div>
				<fieldset>
					<h1 class="h1">Sign In</h1>
					<table>
						<tr>
							<td><label for="tb_pseudo">Pseudo :</label>
							</td>
							<td><input autocomplete="none" class="inp" type="text" id="tb_pseudo" name="pseudo" size="25" maxlength="20" placeholder="Pseudo" required="required">
							</td>
						</tr>
						<tr>
							<td><br><label for="pb_pass">Password:</label></td>
							<td><br>
								<div class="label">								
									<input class="inp" type="password" id="pb_pass" name="psw" size="25" maxlength="15" placeholder="Password" required="required">
									<div class="password-icon">
										<i class="fa fa-eye"></i>
										<i class="fa fa-eye-slash"></i>
									</div>
								</div>
							</td>
						</tr>
						<tr>
							<td><label for="tb_email">Email :</label>
							</td>
							<td><input class="inp" type="email" id="tb_email" autocomplete="none" name="email" size="25" maxlength="20" placeholder="Email" required="required">
							</td>
						</tr>
					</table>
					<br><button type="submit" value="Valider" id="login_button" name="signin">Sign in</button>
					<a href="loginy.php" style="font-size: 0.8em;">Already member ?</a>
				</fieldset>
			</div>
		</form> 
		<script src="../js/login_valid.js"></script>
	</body>
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
</html>