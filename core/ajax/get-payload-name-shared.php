<?php
header('Content-Type: application/json');
include('../class/include.php');


echo json_encode(Payload::GetShared());
?>