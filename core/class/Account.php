<?php
session_start();
class Account
{
    // S'authentifie
    public function Auth($username, $password)
    {
        if (Account::isUsernameExist($username))
        {
            $user = $GLOBALS['DB']->GetContent("users", ["username" => $username])[0];
            if(Account::isPasswordTrue($user, $password))
            {

                $_SESSION['id'] = $user["id"];
                $_SESSION['pp'] = $user["pp"];
                return true;
            }
        }
        return false;
    }
    
    // Vérifie si l'id d'un utilisateur existe
    public function CheckID($id)
    {
        if ($GLOBALS['DB']->Count('users', ['id' => $id]) == 1)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    // Vérifie si l'id d'un utilisateur existe
    public function CheckKey($key)
    {
        if ($GLOBALS['DB']->Count('users', ['fuckkey' => $key]) == 1)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function isFuckKeyExist($key)
    {
        if ($GLOBALS['DB']->Count("users", ["fuckkey" => $key]) != 0)
        {
            return true;
        }
        return false;
    }

    public function isTokenExist($token)
    {
        if ($GLOBALS['DB']->Count("users", ["validationtoken" => $token]) != 0)
        {
            return true;
        }
        return false;
    }

    public function isEmailExist($mail)
    {
        if ($GLOBALS['DB']->Count("users", ["mail" => $mail]) != 0)
        {
            return true;
        }
        return false;
    }
    
    // Vérifie si l'utilisateur et authentifier
    public function isAuthentified()
    {
         return isset($_SESSION['id']);
    }
    
    // Récupére le nom d'utilisateur
    public function GetUsername($id = null)
    {
        if ($id == null)
        {
            $id = $_SESSION['id'];
        }
        
        $username = Account::GetUser($id)['username'];
        return $username;
    }

    // Récupére le nom d'utilisateur
    public function GetMasterkey($id = null)
    {
        if ($id == null)
        {
            $id = $_SESSION['id'];
        }
        
        $masterkey = Account::GetUser($id)['validationtoken'];
        return $masterkey;
    }

    // Récupére la pp de l'utilisateur
    public function GetPP($id = null)
    {
        if ($id == null)
        {
            $id = $_SESSION['id'];
        }
        
        $thepp = Account::GetUser($id)['pp'];
        return $thepp;
    }
    
    // Supprime un utilisateur grace à son id
    public function DeleteUser($user_id)
    {
        $username = Account::GetUser($user_id)['username'];
        $GLOBALS['DB']->Delete('users', ['id' => $user_id]);
        Logs::AddLogs("<p class='text-danger'>[".date('d/m/Y à H:i:s', time())."]&nbsp;<i class='fa fa-close'></i>&nbsp;L'utilisateur ".htmlspecialchars($username)." à été supprimé</p>");
    }

    public function setRole($user_id, $role)
    {
        $username = Account::GetUser($user_id)['username'];
        $GLOBALS['DB']->Update('users', ['id' => $user_id], ['role' => $role]);
    }    
    // Récupére un utilisateur grace à son id
    public function GetUser($user_id = null)
    {
        if ($user_id == null)
        {
            $user_id = $_SESSION['id'];    
        }
        
        return $GLOBALS['DB']->GetContent('users', ['id' => $user_id])[0];
    }
    public function GetCounter($id = null)
    {
        if ($user_id == null)
        {
            $user_id = $_SESSION['id'];    
        }
        
        return $GLOBALS['DB']->GetContent('counter', ['id' => $id])[0];
    }
    public function GetRole($user_id = null)
    {
        if ($user_id == null)
        {
            $user_id = $_SESSION['id'];    
        }

        $therole = Account::GetUser($user_id)['role'];
        if($therole == 2) {
            return "admin";
        }
        elseif($therole == 1) {
            return "premium";
        }
        elseif($therone == 0) {
            return "user";
        }
        else {
            return "invalid";
        }
    }

    public function IsAdmin($user_id = null)
    {
        if ($user_id == null)
        {
            $user_id = $_SESSION['id'];    
        }

        $therole = Account::GetUser($user_id)['role'];
        if($therole == 2) {
            return true;
        }
        else {
            return false;
        }
    }

    public function IsBanned($user_id = null)
    {
        if ($user_id == null)
        {
            $user_id = $_SESSION['id'];    
        }
        $bannum = Account::GetUser($user_id)['ban'];
        if($bannum == 1) {
            return true;
        }
        elseif($bannum == 0) {
            return false;
        }
        else {
            return "invalid";
        }
    }

    public function IsActive($user_id = null)
    {
        if ($user_id == null)
        {
            $user_id = $_SESSION['id'];    
        }
        $bannum = Account::GetUser($user_id)['active'];
        if($bannum == 1) {
            return true;
        }
        elseif($bannum == 0) {
            return false;
        }
        else {
            return "invalid";
        }
    }

    public function GetWaitingAccount()
    {
        return $GLOBALS['DB']->GetContent("users", ['active' => '0']);

    }

    // Change le mot de passe de l'utilisateur actuelle
    public function ChangePassword($old_password, $new_password, $confirm_new_password)
    {
        $user = $GLOBALS['DB']->GetContent('users', ['id' => $_SESSION['id']])[0];
        if (Account::isPasswordTrue($user, $old_password))
        {
               if ($new_password == $confirm_new_password)
               {
                   	$salt = sha1(dechex(mt_rand(0, 2147483647)).dechex(mt_rand(0, 2147483647)));
		            $hash_password = $new_password.$salt;
		        	for($i = 0; $i<500; $i++)
            		{
            		   $hash_password = hash('sha256', $hash_password); 
            		}
		            $password_protection = $hash_password.":".$salt;
		
                    $GLOBALS['DB']->Update('users', ['id' => $_SESSION['id']], ['password' => $password_protection]);
              
                    return "success";
               }
               else {
                   return "Les nouveau mot de passe ne corresponde pas.";
               }
        }
        else {
            return "L'ancien mot de passe n'est pas valide.";
        }
    }
    
    // Vérifie si un nom d'utilisateur existe
    public function isUsernameExist($username)
    {
        if ($GLOBALS['DB']->Count("users", ["username" => $username]) != 0)
        {
            return true;
        }
        return false;
    }
    
    // Retourne un id grâce à un username
    public function GetIdByToken($token)
    {
        if (Account::isTokenExist($token))
        {
            return $GLOBALS['DB']->GetContent("users", ["validationtoken" => $token])[0]['id'];
        }
        else
        {
            return false;
        }
    }

    public function GetIdByUsername($username)
    {
        if (Account::isUsernameExist($username))
        {
            return $GLOBALS['DB']->GetContent("users", ["username" => $username])[0]['id'];
        }
        else
        {
            return false;
        }
    }

    public function GetIdByKey($key)
    {
        return $GLOBALS['DB']->GetContent("users", ["fuckkey" => $key])[0]['id'];
    }

    public function GetKeyById($id = null)
    {
        if ($id == null)
        {
            $id = $_SESSION['id'];
        }
        return $GLOBALS['DB']->GetContent("users", ["id" => $id])[0]['fuckkey'];
    }

    public function GetKey($id = null)
    {
        if ($id == null)
        {
            $id = $_SESSION['id'];
        }
        return Account::GetUser($id)['fuckkey'];
    }
    
    // Vérifie le mot de passe grace au Salt
    private function isPasswordTrue($user, $password)
    {
    	$password_check = explode(":", $user["password"]);
    	$password_to_check = $password.$password_check[1];
    	for($i = 0; $i<500; $i++)
		{
		   $password_to_check = hash('sha256', $password_to_check); 
		}
		
		if ($password_check[0] == $password_to_check)
		{
		    return true;
		}
		return false;
    }
    
    // Créer un utilisateur
    public function CreateUser($username, $password, $confirm_password, $pp, $mail)
    {
        function reloadString($length = 100) {

            $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZs';

            $charactersLength = strlen($characters);

            $randomString = '';

            for ($i = 0; $i < $length; $i++) {

                $randomString .= $characters[rand(0, $charactersLength - 1)];

            }

            return $randomString;

        }

        $pp = "https://kpanel.cz/imgs/kalysianewpart.png";

		if ($password != $confirm_password)
		{
			return "Les mot de passe ne conresponde pas.";
		}
		else if (Account::isUsernameExist($username))
		{
			return "Le pseudo demandé et déjà en cours d'utilisation.";
		}

       	$salt = sha1(dechex(mt_rand(0, 2147483647)).dechex(mt_rand(0, 2147483647)));
        $hash_password = $password.$salt;
    	for($i = 0; $i<500; $i++)
		{
		   $hash_password = hash('sha256', $hash_password); 
		}
        $password_protection = $hash_password.":".$salt;

        $fuckkey = reloadString(10);

		$GLOBALS['DB']->Insert("users", ["username" => $username, "password" => $password_protection, "pp" => $pp, "active" => 1, "fuckkey" => $fuckkey]);

        Logs::AddLogs("<p class='text-primary'>[".date('d/m/Y à H:i:s', time())."]&nbsp;<i class='fa fa-plus'></i>&nbsp;Le nouvel utilisateur ".$username." à été créé</p>");

        return "success";
    }

    public function CreateTempUser($username, $password, $confirm_password, $pp, $mail)
    {
        function reloadString($length = 100) {

            $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZs';

            $charactersLength = strlen($characters);

            $randomString = '';

            for ($i = 0; $i < $length; $i++) {

                $randomString .= $characters[rand(0, $charactersLength - 1)];

            }

            return $randomString;

        }

        $pp = "https://kpanel.cz/imgs/kalysianewpart.png";

        if ($password != $confirm_password)
        {
            return "Les mot de passe ne conresponde pas.";
        }
        else if (Account::isUsernameExist($username))
        {
            return "Le pseudo demandé et déjà en cours d'utilisation.";
        }

        $salt = sha1(dechex(mt_rand(0, 2147483647)).dechex(mt_rand(0, 2147483647)));
        $hash_password = $password.$salt;
        for($i = 0; $i<500; $i++)
        {
           $hash_password = hash('sha256', $hash_password); 
        }
        $password_protection = $hash_password.":".$salt;

        $fuckkey = reloadString(10);

        $validation = reloadString(35);

        $GLOBALS['DB']->Insert("users", ["username" => $username, "password" => $password_protection, "pp" => $pp, "active" => 0, "fuckkey" => $fuckkey, "validationtoken" => $validation, "mail" => $mail]);

        $to_email = $mail;
        $subject = 'Mail Validation - kzPanel';
        $message = 'Validation Email

        Pour validé votre compte, merci de vous rendre sur le lien:
        https://kpanel.cz/validate.php?token='.$validation.'

        Merci.

        - kzPanel';
        $headers = 'From: noreply@kpanel.cz';
        mail($to_email,$subject,$message,$headers);

        Logs::AddLogs("<p class='text-primary'>[".date('d/m/Y à H:i:s', time())."]&nbsp;<i class='fa fa-plus'></i>&nbsp;Le nouvel utilisateur ".$username." à été mis en attente</p>");

        return "success";
    }
    
    // Déconnecte l'utilisateur actuelle
    public function Disconnect()
    {
        $username = Account::GetUsername();
        Logs::AddLogs("<p class='text-danger'>[".date('d/m/Y à H:i:s', time())."]&nbsp;<i class='fa fa-close'></i>&nbsp;L'utilisateur ".$username." s'est deconnecté</p>");
        session_unset();
        session_destroy();
    }
    
    // Récupére le nombre total de Compte
    public function GetAccountNbr()
    {
        return $GLOBALS['DB']->Count("users");
    }
    public function ChangeFuckKey($id)
    {
        function reloadString($length = 100) {

            $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZs';

            $charactersLength = strlen($characters);

            $randomString = '';

            for ($i = 0; $i < $length; $i++) {

                $randomString .= $characters[rand(0, $charactersLength - 1)];

            }

            return $randomString;

        }
        $newkey = reloadString(10);
        $GLOBALS['DB']->Update('users', ['id' => $id], ['fuckkey' => $newkey]);
        return success;
    }
    // Récupére tous les compte
    public function GetAllAccount()
    {
        return $GLOBALS['DB']->GetContent("users", ['active' => '1']);
    }
    
    // Redéfinie l'username à un utilisateur
    public function SetUsername($id, $username)
    {
        $GLOBALS['DB']->Update('users', ['id' => $id], ['username' => $username]);
    }

    public function Validate($id)
    {
        $username = Account::GetUsername($id);
        $GLOBALS['DB']->Update('users', ['id' => $id], ['active' => '1']);
        Logs::AddLogs("<p class='text-primary'>[".date('d/m/Y à H:i:s', time())."]&nbsp;<i class='fa fa-plus'></i>&nbsp;Le nouvel utilisateur ".$username." à été validé</p>");
    }

    public function ValidateE($token)
    {
        $id = Account::GetIdByToken($token);
        $usnam = Account::GetUsername($id);
        $GLOBALS['DB']->Update('users', ['validationtoken' => $token], ['active' => '1']);
        Logs::AddLogs("<p class='text-primary'>[".date('d/m/Y à H:i:s', time())."]&nbsp;<i class='fa fa-plus'></i>&nbsp;Le nouvel utilisateur ".$usnam." à été validé par Email</p>");
    }

    public function SetTheme($username, $theme)
    {
        $GLOBALS['DB']->Update('users', ['username' => $username], ['theme' => $theme]);
    }
    public function IsDark($user_id = null)
    {
        if ($user_id == null)
        {
            $user_id = $_SESSION['id'];    
        }

        $theme = Account::GetUser($user_id)['theme'];
        if($theme == "dark")
        {
            return true;
        }
        elseif($theme == "light")
        {
            return false;
        }
        else
        {
            return "invalid";
        }
    }
}
?>