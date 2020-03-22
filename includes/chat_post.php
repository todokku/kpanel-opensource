<?php

try
{
	$bdd = mysqli_connect("localhost", "kpanel", "dTtnffLwbZecN4Hh", "kpanel");
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

//Insertion du message

$req = $bdd->prepare('INSERT INTO chat (pseudo, message) VALUES(?, ?)');
$req->execute(array($_POST['pseudo'], $_POST['message']));

// Redirection du visiteur vers le dashboard
header('Location: ../dashboard.php');
?>