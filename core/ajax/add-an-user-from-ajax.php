<?php
include('../class/include.php');
if (!Account::isAuthentified() || !CSRF::isAjaxRequest())
{
	http_response_code(403);
    die("Bad request");
}

if(!Account::IsAdmin())
{
	http_response_code(403);
	die("Bad request");
}


$qGQ5Q421qDqF = htmlspecialchars($_GET['usernamer']);
$FDqqGQ5Q4q21 = htmlspecialchars($_GET['passwordr']);
$DqFqGQ5Q421q = htmlspecialchars($_GET['cpasswordr']);
$qDqFq421GQ5Q = htmlspecialchars($_GET['pp']);
$Fq421GqDqQ5Q = htmlspecialchars($_GET['mail']);

echo Account::CreateUser($qGQ5Q421qDqF , $FDqqGQ5Q4q21, $DqFqGQ5Q421q, $qDqFq421GQ5Q, $Fq421GqDqQ5Q);
?>