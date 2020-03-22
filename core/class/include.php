<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
error_reporting(E_ERROR | E_WARNING | E_PARSE);
date_default_timezone_set('Europe/Paris');
include 'Config.php';
include 'Database.php';
include 'CSRF.php';
include 'Account.php';
include 'Server.php';
include 'Payload.php';
include 'Logs.php';
include 'Chat.php';
include 'Params.php';
include 'Counter.php';

$GLOBALS['DB'] = new Database($GLOBALS['mysql_host'], $GLOBALS['mysql_database'], $GLOBALS['mysql_username'], $GLOBALS['mysql_password']);
?>