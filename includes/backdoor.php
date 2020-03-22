<?php
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
if(isset($_FILES['addonfile']))
{
	$file = $_FILES['addonfile']['tmp_name'];
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
}
?>
<div id="backdoor" class="tab-pane fade">
    <div class="row">
        <div class="col-md-12">
        	<div class="panel panel-default">
			  <div class="panel-heading"><i class="fa fa-list-alt"></i>&nbsp;Backdoor Checker
			  </div>
			  <div class="panel-body" id="backdoor-body">
	<form enctype="multipart/form-data" action="" method="post">
	 	<input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
		<input class="btn btn-success" name="addonfile" type="file" />
		<br>
		<input type="submit" class="btn btn-success" value="Envoyer le fichier" />
	</form>
			  	<br>
			  </div>
			  <div class="panel-body" id="backdoor-footer">
<?php
	if(isset($notif))
	{
		$colo = "green";
		if($treatlevel > 3)
		{
			$colo = "orange";
		}
		if($treatlevel > 6)
		{
			$colo = "red";
		}
		echo "<div class='$colo' style='color: $colo;'>Logs for ".$_FILES['addonfile']['name']." (Level: $treatlevel): </div>";
		foreach ($notif as $key => $value) {
			echo "$value <br />";
		}
	}
	?>
			  </div>
			</div>
       	</div>
    </div>
</div>
<style>
#backdoor-footer{
	color: white!important;
	background-color: black!important;
}
.oranges {
	color: orange!important;
}
.reds {
	color: red!important;
}
.red {
	color: red!important;
}
.greens {
	color: green!important;
}
</style>