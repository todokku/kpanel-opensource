<?php
class Chat
{
	public function GetLastMessage($nbr = 5)
	{
		return $GLOBALS['DB']->GetContent("chat", [], 'ORDER BY id DESC LIMIT '.$nbr);
	}

	public function AddMessage($pseudo, $message, $date)
	{
		$GLOBALS['DB']->Insert("chat", ["pseudo" => $pseudo, "message" => $message, "date" => $date]);
	}
	public function DelChat()
	{
		$GLOBALS['DB']->Delete("chat");
	}

}
?>