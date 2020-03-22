<?php
include('../class/include.php');
if (!Account::isAuthentified() && !CSRF::isAjaxRequest())
{
	http_response_code(403);
    die("Bad request");
}
$pseudo = Account::GetUsername();
$message = htmlspecialchars($_POST['message']);

if(!empty($message)) {
Chat::AddMessage($pseudo, $message, " <i style=\"font-size: 9.5px!important;\">(".date('d/m/Y à H:i:s', time()).")</i>");
Logs::AddLogs("<p class='text-success'>[".date('d/m/Y à H:i:s', time())."]&nbsp;<i class='fa fa-plus'></i>&nbsp;L'utilisateur ".$pseudo." a ajouté un message dans le chat</p>");
}
?>