<?php
header('Content-Type: application/json');
include('../class/include.php');
//if (!Account::isAuthentified() || !CSRF::isAjaxRequest())
//{
//	http_response_code(403);
//    die("Bad request");
//}

$all_payload_predata = Payload::GetShared();
$list = [];

foreach ($all_payload_predata as $data)
{

    $button_view = '<button onclick="viewShared('.$data['id'].')" type="button" class="btn btn-warning btn-sm"><i class="fa fa-pencil-square-o"></i>&nbsp;Voir</button>';

    array_push($list, ["DT_RowId" => "payload-".$data['id'], $data['payload_name'], $data['payload_comment'], $button_delete."&nbsp;".$button_view]);
}

json_encode(['datas' => $list]);
?>