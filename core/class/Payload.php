<?php
class Payload
{
	// Récupére tout les payload
	public function GetAllPayload($id = null)
	{
		if ($id == null)
        {
            $id = $_SESSION['id'];
        }

        $owner = Account::GetUser($id)['username'];


		return $GLOBALS['DB']->GetContent("payload", ["payload_owner" => $owner]);

	}

	public function GetAllPayloadAdmin()
	{
		$owner = "yay";
		return $GLOBALS['DB']->GetContent("payload", ["glol" => $owner]);
	}

	public function GetShared()
	{

        $owner = Account::GetUser($id)['username'];


		return $GLOBALS['DB']->GetContent("payload", ["payload_owner" => 'Shared']);
		//$GLOBALS['DB']->GetContent("payload", ["payload_owner" => 'Shared']);

	}

	// Supprime un payload
	public function DeletePayload($id)
	{
		$name = Payload::GetPayload($id)['payload_name'];
		return $GLOBALS['DB']->Delete("payload", ["id" => $id]);
        Logs::AddLogs("<p class='text-danger'>[".date('d/m/Y à H:i:s', time())."]&nbsp;<i class='fa fa-close'></i>&nbsp;Le payload ".$name." à été supprimé</p>");
	}

	// Créer un payload
	public function CreatePayload($name, $comment, $content, $owner)
	{

		if ($id == null)
        {
            $id = $_SESSION['id'];
        }

		$GLOBALS['DB']->Insert("payload", ["payload_name" => $name, "payload_comment" => $comment, "payload_content" => $content, "payload_owner" => $owner]);
        Logs::AddLogs("<p class='text-primary'>[".date('d/m/Y à H:i:s', time())."]&nbsp;<i class='fa fa-plus'></i>&nbsp;Un nouveau payload à été créer : ".$name."</p>");

        return "success";
	}

	// Edite un payload
	public function EditPayload($id, $name, $comment, $content)
	{
		$GLOBALS['DB']->Update("payload", ["id" => $id], ["payload_name" => $name, "payload_comment" => $comment, "payload_content" => $content]);
	}

	// Récupére un payload
	public function GetPayload($id)
	{
		return $GLOBALS['DB']->GetContent("payload", ["id" => $id])[0];
	}
}
?>