<?php
/*header('Content-Type: application/json');
include('../class/include.php');
if (!Account::isAuthentified() || !CSRF::isAjaxRequest())
{
    die("Bad request");
}

$owner = Account::GetUser($id)['username'];
$FqGQ5Q421qDq = htmlspecialchars($_GET['name']);
$qFqGQ215Q4qD = htmlspecialchars($_GET['content']);
$Q1qDq42FqGQ5 = htmlspecialchars($_GET['comment']);

$content = str_replace("<NEWLINE>", "\n", $qFqGQ215Q4qD );
Payload::CreatePayload($FqGQ5Q421qDq, $qFqGQ215Q4qD, $Q1qDq42FqGQ5, $owner);*/
header('Content-Type: application/json');
include('../class/include.php');
if (!Account::isAuthentified() || !CSRF::isAjaxRequest())
{
	http_response_code(403);
    die("Bad request");
}
$owner = Account::GetUser($id)['username'];

$content = str_replace("<NEWLINE>", "\n", $_POST['content']);
Payload::CreatePayload(htmlspecialchars($_POST['name']), htmlspecialchars($_POST['comment']), $content, $owner);
?>