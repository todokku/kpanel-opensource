<?php
include('../class/include.php');
if (!Account::isAuthentified() || !CSRF::isAjaxRequest())
{
	http_response_code(403);
    die("Bad request");
}

if(Server::CallStatut($_GET['server']))
{
	echo "success";
}
?>