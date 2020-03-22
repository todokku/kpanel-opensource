<?php

header('Content-Type: application/json');

include('../class/include.php');

if (!Account::isAuthentified() || !CSRF::isAjaxRequest())

{

	http_response_code(403);

    die("Bad request");

}



$all_users_predata = Account::GetAllAccount();

$list = [];

foreach ($all_users_predata as $data)

{   

	$himrole = Account::GetRole($data['id']);
    $fuckkey = Account::GetKey($data['id']);


    if ($data['id'] != 3) {$button = '<button onclick="deleteUser('.$data['id'].')" type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>&nbsp;Supprimé</button>';  

    $setrole = '  <button onclick="showrole('.$data['id'].')" type="button" class="btn btn-success btn-sm"><i class="fa fa-user"></i>&nbsp;Role</button>';

    $resetkey = '  <button onclick="resetkey('.$data['id'].')" type="button" class="btn btn-success btn-sm"><i class="fa fa-key"></i>&nbsp;Reset Fuck Key</button>';}

    else {

    	$button = "Cet utilisateur est intouchable.";
        $fuckkey = "0000000000";
        $himrole = "owner";
        $setrole = '';
        $resetkey = '';
    }

     if ($data['id'] != 4664 ) {}
    
        else {
    
            $button = "Cet utilisateur est intouchable.";
            $fuckkey = "0000000000";
            $himrole = "owner";
            $setrole = '';
            $resetkey = '';
         }

     /*if ($data['id'] != 9417 ) {}
    
        else {
    
            $button = "Cet utilisateur est intouchable.";
            $fuckkey = "C'est lui qui te fuck";
            $himrole = "owner";
            $setrole = '';
            $resetkey = '';
         }*/


    array_push($list, ["DT_RowId" => "user-".$data['id'], $data['username'], $himrole, $fuckkey, $button.$setrole.$resetkey]);

}



echo json_encode(['data' => $list]);

?>