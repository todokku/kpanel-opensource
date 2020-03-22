<?php
include('../class/include.php');
if (!Account::isAuthentified() && !CSRF::isAjaxRequest())
{
	http_response_code(403);
    die("Bad request");
}
function ContainsStr($stack, $needle)
{
	if (strpos($stack, $needle) !== false) {
	    return true;
	}
	return false;
}
function ContainsRegex($stack, $needle)
{
	return preg_match('/'.preg_quote($needle).'/', $stack) != 0;
}
function ContainsFolder($path, $folder)
{
	return preg_match('/'.$folder.'\\//', $path) != 0;
}
function IsAutorun($path)
{
	return ContainsFolder($path, "autorun");
}

$file = $_FILES['addonfile']['tmp_name'];
if(empty($file))
{
	die("No File Provided");
}
$zip = new ZipArchive;
$notif = [];
$treatlevel = 0;
if ($zip->open($file))
{
for($i = 0; $i < $zip->numFiles; $i++)
	     {  
	     	$name = $zip->getNameIndex($i);
	        	$data = $zip->getFromIndex($i);
            if(ContainsStr($data, "RunString") || ContainsStr($data, "CompileString"))
            {
              $notif[] = "----------------------------------------------------------<div class='oranges'>🟧 RunString/CompileString (possible backdoor code)</div>--> $name";
              $treatlevel = $treatlevel + 1;
            }
            if(ContainsStr($data, "SetUserGroup") || ContainsStr($data, "\"adduserid\",") || ContainsStr($data, "\"adduser\","))
            {
              $notif[] = "----------------------------------------------------------<div class='oranges'>🟧 Backdoor auto-rôle</div>--> $name";
              $treatlevel = $treatlevel + 2;
            }
            if(ContainsStr($data, "file.Read(\"cfg/server.cfg\""))
            {
              $notif[] = "----------------------------------------------------------<div class='greens'>🟩 Reading server.cfg</div>--> $name";
              $treatlevel = $treatlevel + 5;
            }
            if(ContainsStr($data, "_G[") || ContainsStr($data, "getfenv()["))
            {
              $notif[] = "----------------------------------------------------------<div class='oranges'>🟧  _G (Possibilité d'Obfuscation)</div>--> $name";
              $treatlevel = $treatlevel + 1;
            }
            if(ContainsStr($data, "http.Fetch") || ContainsStr($data, "http.Post"))
            {
              $notif[] = "----------------------------------------------------------<div class='oranges'>🟧 HTTP.FETCH/POST</div>--> $name";
              $treatlevel = $treatlevel + 1;
            }
            if(ContainsStr($data, "encodetbl") || ContainsStr($data, "RunHASHOb"))
            {
              $notif[] = "----------------------------------------------------------<div class='red'>🟥 Gvac Obfusqation</div>--> $name";
              $treatlevel = $treatlevel + 1;
            }
            if(ContainsStr($data, "DUCK") || ContainsStr($data, "RunningDuck"))
            {
              $notif[] = "----------------------------------------------------------<div class='red'>🟥 Canard Obfusqation</div>--> $name";
              $treatlevel = $treatlevel + 1;
            }
            if(ContainsStr($data, "function(fck)") || ContainsStr($data, "BillIsHere"))
            {
              $notif[] = "----------------------------------------------------------<div class='red'>🟥 BillCipher Backdoor</div>--> $name";
              $treatlevel = $treatlevel + 1;
            }
            if(ContainsStr($data, "kpanel") || ContainsStr($data, "yay"))
            {
              $notif[] = "----------------------------------------------------------<div class='red'>🟥 Kpanel infection (Not so bad)</div>--> $name";
              $treatlevel = $treatlevel + 1;
            }
            if(ContainsStr($data, "core") || ContainsStr($data, "stage"))
            {
              $notif[] = "----------------------------------------------------------<div class='red'>🟥 Gbackdoor infection</div>--> $name";
              $treatlevel = $treatlevel + 1;
            }
            if(ContainsStr($data, "kvac") || ContainsStr($data, "wadixix"))
            {
              $notif[] = "----------------------------------------------------------<div class='red'>🟥 Kvacdoor infection</div>--> $name";
              $treatlevel = $treatlevel + 1;
            }
            if(ContainsStr($data, "bit.bxor"))
            {
              $notif[] = "----------------------------------------------------------<div class='red'>🟥 Bxor (possibility backdoor)</div>--> $name";
              $treatlevel = $treatlevel + 1;

            }
	     }
}
		$colo = "greens";
		if($treatlevel > 3)
		{
			$colo = "oranges";
		}
		if($treatlevel > 6)
		{
			$colo = "reds";
		}
		echo "<div class='$colo'>Logs for ".$_FILES['addonfile']['name']." (Level: $treatlevel): </div>";
		foreach ($notif as $key => $value) {
			echo "$value <br />";
		}

?>