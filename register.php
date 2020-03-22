<?php

include 'core/class/include.php';

require('captcha/src/autoload.php');

$disable = false;

$ip = 'NA';

//Check to see if the CF-Connecting-IP header exists.
if(isset($_SERVER["HTTP_CF_CONNECTING_IP"])){
    //If it does, assume that PHP app is behind Cloudflare.
    $ip = $_SERVER["HTTP_CF_CONNECTING_IP"];
} else{
    //Otherwise, use REMOTE_ADDR.
    $ip = $_SERVER['REMOTE_ADDR'];
}

//Define it as a constant so that we can
//reference it throughout the app.
define('IP_ADDRESS', $ip);


// Redirige l'utilisateur si il est connecté

if (Account::isAuthentified())

{

    header('Location: dashboard.php');

}


if($disable == false) {
?>
<?php
$uname = $_POST['uname'];

$password = $_POST['password'];

$cpassword = $_POST['cpassword'];

$pp = "https://kpanel.cz/imgs/kalysianewpart.png";

$mail = $_POST['mail'];

$emailtooken = Account::IsEmailExist($mail);



if(isset($uname)){
  if(isset($password)){
    if(isset($cpassword)){
      if($emailtooken === false) {
      Account::CreateTempUser(htmlspecialchars($uname), $password, $cpassword, $pp, $mail);
      echo '<script>alert("Votre compte a été mis en attente, pour le faire validé, merci de vous rendre sur le discord (https://discord.gg/DK7MvAH)")</script>';
      $noerror == "yes";
    } else {
      $noerror == "emailtaken";
    }
  } else {
      $noerror == "missingcp";
    }
  }
  else {
      $noerror == "missingp";
    }
}

?>
<script>
window.onload = function() {
    var $recaptcha = document.querySelector('#g-recaptcha-response');

    if($recaptcha) {
        $recaptcha.setAttribute("required", "required");
    }
};
</script>
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
#g-recaptcha-response {
    display: block !important;
    position: absolute;
    margin: -78px 0 0 0 !important;
    width: 302px !important;
    height: 76px !important;
    z-index: -999999;
    opacity: 0;
}
</style>
<!DOCTYPE html>

<html lang="en">

<head>

  <link rel="icon" type="image/png" sizes="16x16" href="//kpanel.cz/img/kalysia50.png">

  <title>kPanel | Register</title>

  <meta charset="UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">

<!--===============================================================================================-->  

<!--===============================================================================================-->

  <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">

<!--===============================================================================================-->

  <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">

<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<!--===============================================================================================-->

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

        <form class="login100-form validate-form" method="POST" action="register.php">

          <span class="login100-form-title p-b-49">

            kPanel | Register

                      <?php
            if($noerror == "yes") echo '<div class="alert alert-danger text-center" >Le compte a été mis en attente, rendez vous sur discord pour activé votre compte (<a href="https://discord.gg/xCd8J2K">https://discord.gg/xCd8J2K</a>).</div>'; elseif($noerror == "missingcp") { echo '<div class="alert alert-danger text-center" >Confirmation du mot de passe incorrecte.</div>'; } elseif($noerror == "missingp") { echo '<div class="alert alert-danger text-center" >Mot de passe requis.</div>'; } elseif($noerror == "emailtaken") { echo 'div class="alert alert-danger text-center" >Cette email est déjà prise</div>'; } else { echo $noerror; }
          ?>

          </span>


          <div class="wrap-input100 validate-input m-b-23" data-validate = "Username is required">

            <span class="label-input100">Username</span>

            <input class="input100" type="text" name="uname" placeholder="Type your username">

            <span class="focus-input100" data-symbol="&#xf206;"></span>

          </div>

          <div class="wrap-input100 validate-input m-b-23" data-validate = "Mail is required">

            <span class="label-input100">Mail</span>

            <input class="input100" type="text" name="mail" placeholder="anuser@anhost.com">

            <span class="focus-input100 material-icons" data-symbol="&#xe0e1;"></span>

          </div>



          <div class="wrap-input100 validate-input" data-validate="Password is required">

            <span class="label-input100">Password</span>

            <input class="input100" type="password" name="password" placeholder="Type your password">

            <span class="focus-input100" data-symbol="&#xf190;"></span>

          </div>



          <div class="wrap-input100 validate-input" data-validate="Password is required" style="padding-top: 30px;">

            <span class="label-input100">Password Verification</span>

            <input class="input100" type="password" name="cpassword" placeholder="Type your password">

            <span class="focus-input100" data-symbol="&#xf190;"></span>

          </div>


          <div class="wrap-input100 validate-input" data-validate="Password is required" style="padding-top: 30px;">

            <span class="label-input100">Captcha</span>

            <div class="g-recaptcha" data-sitekey="6LfS-70UAAAAAG3ASALQRzUk6MTdl_LYP0mwBQ9Q"></div>

          </div>


          <div class="container-login100-form-btn" style="padding-top: 10px;">

            <div class="wrap-login100-form-btn">

              <div class="login100-form-bgbtn"></div>

              <button class="login100-form-btn" name="register" type="submit">

                Register

              </button>

            </div>

            <div style="padding-top: 10px;">
            <label> Vous avez déjà un compte ? <a href="./login.php">Se connecter</a></label>
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

  <script src="vendor/animsition/js/animsition.min.js"></script>

<!--===============================================================================================-->

  <script src="vendor/bootstrap/js/popper.js"></script>

  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

<!--===============================================================================================-->

  <script src="vendor/select2/select2.min.js"></script>

<!--===============================================================================================-->

  <script src="vendor/daterangepicker/moment.min.js"></script>

  <script src="vendor/daterangepicker/daterangepicker.js"></script>

<!--===============================================================================================-->

  <script src="vendor/countdowntime/countdowntime.js"></script>


  <script src='https://www.google.com/recaptcha/api.js'></script>
<!--===============================================================================================-->
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5dcc15ed43be710e1d1d1da5/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->



</body>

</html>

<?php } else { ?>
  <title>Disabled</title>
<style>
  body { text-align: center; padding: 150px; }
  h1 { font-size: 50px; }
  body { font: 20px Helvetica, sans-serif; color: #333; }
  article { display: block; text-align: left; width: 650px; margin: 0 auto; }
  a { color: #dc8100; text-decoration: none; }
  a:hover { color: #333; text-decoration: none; }
</style>
<article>
    <h1>Désactivé!</h1>
    <div>
        <p>Désolé pour le désagrément occasionné, mais nous somme en train de subir une attaque, vous pouvez toujours <a href="https://discord.gg/5N4pYkc">nous contacter</a> pour creer votre compte!</p>
        <p>&mdash; L'équipe kPanel</p>
    </div>
</article>

<?php } ?>