<?php
include('../class/include.php');
if (!Account::isAuthentified() || !CSRF::isAjaxRequest())
{
	http_response_code(403);
    die("Bad request");
}

$content = str_replace("<NEWLINE>", "\n", $_POST['content']);
Payload::EditPayload($_GET['id'], $_POST['name'], $_POST['comment'], $content);
?>