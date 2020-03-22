<?php

include 'core/class/include.php';

require('captcha/src/autoload.php');



$siteKey = '6LfS-70UAAAAAG3ASALQRzUk6MTdl_LYP0mwBQ9Q';

$secret = '6LfS-70UAAAAAGntcq_fKFPBiN05sOpxXDUcWTCc';

 

$recaptcha = new \ReCaptcha\ReCaptcha($secret);

 

$gRecaptchaResponse = $_POST['g-recaptcha-response']; //google captcha post data

$remoteIp = $_SERVER['REMOTE_ADDR']; //to get user's ip

 

$recaptchaErrors = ''; // blank varible to store error





// Redirige l'utilisateur si il est connecté

if (Account::isAuthentified())

{

    header('Location: dashboard.php');

}


// Action: Login

if (isset($_POST['connexion']))

{

	$getid = Account::GetIdByUsername($_POST['username']);
    $isactive = Account::IsActive($getid);


    if ($isactive == false) {

      echo '<script>alert("Votre compte n\'est pas actif")</script>';
      $notactive = true;

    }

    else {

        $no_error = Account::Auth($_POST['username'], $_POST['password']);

        if ($no_error == true)

        {

            header('Location: dashboard.php');


        } else {

        $no_active = true;
        echo "<script>alert(\"Votre nom d'utilisateur ou mot de passe incorrect.\")</script>";


      }

    }
}



?>
<style>
.alert {
    color: #fff;
    font-size: .875rem;
}
.text-center {
    text-align: center!important;
}
.alert-danger {
    color: #721c24;
    background-color: #f8d7da;
    border-color: #f5c6cb;
}
.alert {
    padding: .75rem 1.25rem;
    margin-bottom: 1rem;
    border: 1px solid transparent;
    border-radius: .25rem;
}
.alert {
    position: relative;
}
</style>
<!DOCTYPE html>

<html lang="en">

<head>

  <link rel="icon" type="image/png" sizes="16x16" href="//kpanel.cz/img/kalysia50.png">

	<title>kPanel | Login</title>

	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">

<!--===============================================================================================-->	

<!--===============================================================================================-->

	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">

<!--===============================================================================================-->

	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">

<!--===============================================================================================-->

<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">

<!--===============================================================================================-->

	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">

<!--===============================================================================================-->	

	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">

<!--===============================================================================================-->

	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">

<!--===============================================================================================-->

	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">

<!--===============================================================================================-->	

	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">

<!--===============================================================================================-->

	<link rel="stylesheet" type="text/css" href="css/util.css">

	<link rel="stylesheet" type="text/css" href="css/main.css">

<!--===============================================================================================-->

</head>

<body>

	

	<div class="limiter">

		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">

			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">

				<form class="login100-form validate-form" method="POST" action="#">

					<span class="login100-form-title p-b-49">

						kPanel | Login

					</span>


			<?php if (isset($notactive)) { ?>

              <div class="alert alert-danger text-center" role="alert"><strong>Erreur:</strong> Votre compte n'est pas actif.</div>

          <?php } ?>
            <?php if (isset($no_error)) { ?>

              <div class="alert alert-danger text-center" role="alert"><strong>Erreur:</strong> Votre nom d'utilisateur ou mot de passe est incorrect.</div>

          <?php } ?>



					<div class="wrap-input100 validate-input m-b-23" data-validate = "Username is reauired">

						<span class="label-input100">Username</span>

						<input class="input100" type="text" name="username" placeholder="Type your username">

						<span class="focus-input100" data-symbol="&#xf206;"></span>

					</div>



					<div class="wrap-input100 validate-input" data-validate="Password is required">

						<span class="label-input100">Password</span>

						<input class="input100" type="password" name="password" placeholder="Type your password">

						<span class="focus-input100" data-symbol="&#xf190;"></span>

					</div>



					<div class="container-login100-form-btn" style="padding-top: 10px;">

						<div class="wrap-login100-form-btn">

							<div class="login100-form-bgbtn"></div>

							<button class="login100-form-btn" name="connexion" type="submit">

								Login

							</button>

						</div>

					<div style="padding-top: 10px;">
						<label> Vous n'avez pas de compte ? <a href="./register.php">S'inscrire</a></label>
					</div>

					</div>

					</div>

				</form>

			</div>

		</div>

	</div>

	



	<div id="dropDownSelect1"></div>

	

<!--===============================================================================================-->

	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>

<!--===============================================================================================-->


	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

<!--===============================================================================================-->

<!--===============================================================================================-->


<!--===============================================================================================-->

<!--===============================================================================================-->


</body>

</html>
