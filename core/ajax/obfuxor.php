<?php

$text = array(
     'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z',

     'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z',

     '1','2','3','4','5','6','7','8','9',

     
     '|', '}', '~', '', '{', '\'', ']', '^', '_', '-', '.', '/', '(', ')', '*', '+', '$', '%', '&', '\'', '!', '"', '#', '<', '=', '>', '?', ':', ';', ' ');

$obfu = array(
    '0', '3', '2', '5', '4', '7', '6', '9', '8', '11', '10', '13', '12', '15', '14', '17', '16', '19', '18', '21', '20', '23', '22', '25', '24', '27', 

    '32', '35', '34', '37', '36', '39', '38', '41', '40', '43', '42', '45', '44', '47', '46', '49','48', '51', '50', '53', '52', '55', '54', '57', '56','59',

    '80','83','82','85','84','87','86','89','88',

    '29','28','31','26','61','60','63','62','76','79','78','73','72','75','74','69','68','71','61','65','64','67','66','93','92','95','94','91','90', '65');


$texteaobfusquer = $_GET['code'];

$aieaie = str_replace($text, $obfu, $texteaobfusquer);
echo $aieaie;
?>