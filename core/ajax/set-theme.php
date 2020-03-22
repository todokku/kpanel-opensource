<?php
include('../class/include.php');
if (!Account::isAuthentified() && !CSRF::isAjaxRequest())
{
	http_response_code(403);
    die("Bad request");
}

$unametoget = $_GET['id'];
$themetoset = $_GET['theme'];

Account::SetTheme($unametoget, $themetoset);
?>