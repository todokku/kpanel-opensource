<?php

include 'core/class/include.php';

$token = $_GET['token'];

$istokenreal = Account::isTokenExist($token); 

$account = Account::GetIdByToken($token);

if (Account::IsActive($account)) {
	die("This token is already validated");
}


if (empty($token)) {
	die("The token is empty");
}

if (empty($account)) {
	die("Unexcepted error, the token exist got no account");
}

if (isset($istokenreal)) {
	if ($istokenreal == false) {
		die("The token isn't assigned to any account");
	}
	elseif ($istokenreal == true) {
		Account::ValidateE($token);
		header("Location: https://kpanel.cz/login.php");
	}
}

?>

