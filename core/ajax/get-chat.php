<?php
include('../class/include.php');
if (!Account::isAuthentified() && !CSRF::isAjaxRequest())
{
	http_response_code(403);
    die("Bad request");
}

$chat = Chat::GetLastMessage(5);
if (count($chat) == 0)
{
	echo "<p class='text-center'>Aucun message récent.</p>";
}
else
{
	foreach($chat as $chatc)
	{
		$temppp = Account::GetIdByUsername($chatc['pseudo']);
		$theshownpp = Account::GetPP($temppp);
		if (empty($theshownpp)){
			$theshownpp = "https://kpanel.cz/img/kalysia50.png";
		}
		echo "<div id=\"heya\" style=\"padding: 7px;\">";
		echo "<img src=\"".$theshownpp."\" alt=\"user-img\" width=\"36\" class=\"img-circle\">&nbsp;";
		echo $chatc['pseudo']." :";
		echo '<br>';
		echo $chatc['message'].$chatc['date'];
		echo '</div>';
	}
}
?>