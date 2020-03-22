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

  <link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">

<!--===============================================================================================-->

  <link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">

<!--===============================================================================================-->

  <link rel="stylesheet" type="text/css" href="../fonts/iconic/css/material-design-iconic-font.min.css">

<!--===============================================================================================-->

  <link rel="stylesheet" type="text/css" href="../vendor/animate/animate.css">

<!--===============================================================================================-->  

  <link rel="stylesheet" type="text/css" href="../vendor/css-hamburgers/hamburgers.min.css">

<!--===============================================================================================-->

  <link rel="stylesheet" type="text/css" href="../vendor/animsition/css/animsition.min.css">

<!--===============================================================================================-->

  <link rel="stylesheet" type="text/css" href="../vendor/select2/select2.min.css">

<!--===============================================================================================-->  

  <link rel="stylesheet" type="text/css" href="../vendor/daterangepicker/daterangepicker.css">

<!--===============================================================================================-->

  <link rel="stylesheet" type="text/css" href="../css/util.css">

  <link rel="stylesheet" type="text/css" href="../css/main.css">

<!--===============================================================================================-->

</head>

<body>

  

  <div class="limiter">

    <div class="container-login100" style="background-image: url('../images/bg-01.jpg');">

      <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">

        <form class="login100-form validate-form" action="validateacc.php">

          <span class="login100-form-title p-b-49">

            kPanel | Validate Account

          </span>



          <div class="wrap-input100 validate-input m-b-23" data-validate = "Username is reauired">

            <span class="label-input100">Username</span>

            <input class="input100" type="text" name="uname" value ="<?php echo $username;?>" readonly="">

            <span class="focus-input100" data-symbol="&#xf206;"></span>

          </div>



          <div class="wrap-input100 validate-input" data-validate="Password is required">

            <span class="label-input100">Password</span>

            <input class="input100" type="password" name="password" value="<?php echo $password;?>" readonly="">

            <span class="focus-input100" data-symbol="&#xf190;"></span>

          </div>



<div class="container-login100-form-btn" style="padding-top: 10px;">

            <div class="wrap-login100-form-btn">

              <div class="login100-form-bgbtn"></div>

              <!--<button class="login100-form-btn" name="connexion" type="submit">

                Login

              </button>-->

              <?php echo '<a href="validate.php?uname='.$username.'&passw='.$password.'"><button class="login100-form-btn">Validé le compte</button></a>'; ?>

            </div>

            <br>

            <i>Si vous ne voullez pas validé le compte ignoré/supprimé ce fichier.</i>

          </div>

          </div>

        </form>



      </div>

    </div>

  </div>

  



  <div id="dropDownSelect1"></div>

  

<!--===============================================================================================-->

  <script src="../vendor/jquery/jquery-3.2.1.min.js"></script>

<!--===============================================================================================-->

  <script src="../vendor/animsition/js/animsition.min.js"></script>

<!--===============================================================================================-->

  <script src="../vendor/bootstrap/js/popper.js"></script>

  <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

<!--===============================================================================================-->

  <script src="../vendor/select2/select2.min.js"></script>

<!--===============================================================================================-->

  <script src="../vendor/daterangepicker/moment.min.js"></script>

  <script src="../vendor/daterangepicker/daterangepicker.js"></script>

<!--===============================================================================================-->

  <script src="../vendor/countdowntime/countdowntime.js"></script>

<!--===============================================================================================-->

  <script src="../js/main.js"></script>

  <div style="background-color: rgb(255, 255, 255); border: 1px solid rgb(204, 204, 204); box-shadow: rgba(0, 0, 0, 0.2) 2px 2px 3px; position: absolute; transition: visibility 0s linear 0.3s, opacity 0.3s linear 0s; opacity: 0; visibility: hidden; z-index: 2000000000; left: 0px; top: -10000px;"><div style="width: 100%; height: 100%; position: fixed; top: 0px; left: 0px; z-index: 2000000000; background-color: rgb(255, 255, 255); opacity: 0.05;"></div><div class="g-recaptcha-bubble-arrow" style="border: 11px solid transparent; width: 0px; height: 0px; position: absolute; pointer-events: none; margin-top: -11px; z-index: 2000000000;"></div><div class="g-recaptcha-bubble-arrow" style="border: 10px solid transparent; width: 0px; height: 0px; position: absolute; pointer-events: none; margin-top: -10px; z-index: 2000000000;"></div><div style="z-index: 2000000000; position: relative;"><iframe title="Test recaptcha" src="./login2_files/bframe.html" name="c-wyyiwq3nkvg8" frameborder="0" scrolling="no" sandbox="allow-forms allow-popups allow-same-origin allow-scripts allow-top-navigation allow-modals allow-popups-to-escape-sandbox" style="width: 100%; height: 100%;"></iframe></div></div></body></html>



</body>

</html>

