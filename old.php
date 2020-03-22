<?php
include 'core/class/include.php';

// Redirige l'utilisateur si il est connecté
if (Account::isAuthentified())
{
    header('Location: dashboard.php');
}

// Action: Connexion
if (isset($_POST['connexion']))
{
    $no_error = Account::Auth($_POST['username'], $_POST['password']);
    if ($no_error == true)
    {
        header('Location: dashboard.php');
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
	<title>GBackdoor - Login</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/custom.css">
</head>

<body>
    <!-- Barre de navigation -->
    <?php include('includes/navbar.php'); ?>
    
    <!-- Contenu de la page -->
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h3 class="panel-title text-center">Connexion</h3>
                  </div>
                  <div class="panel-body">
                        <?php if (isset($no_error)) { ?>
                            <div class="alert alert-danger text-center" role="alert"><strong>Erreur:</strong> Votre nom d'utilisateur ou mot de passe est incorrect.</div>
                        <?php } ?>
                        <form method="POST" action="#">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Nom d'utilisateur</label>
                            <input type="text" class="form-control" name="username" placeholder="Nom d'utilisateur">
                          </div>
                          <div class="form-group">
                            <label for="exampleInputPassword1">Mot de passe</label>
                            <input type="password" class="form-control" name="password" placeholder="Mot de passe">
                          </div>
                          <button type="submit" name="connexion" class="center-block btn btn-default">Connexion</button>
                        </form>
                  </div>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</body>
    
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/custom.js"></script>
</html>