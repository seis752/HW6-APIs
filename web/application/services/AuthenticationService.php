<?php

class AuthenticationService
{
    protected $db;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    public function authenticate($username, $password)
    {
        $user = null;

//        $query = sprintf("SELECT * FROM user WHERE username = '%s' AND password = '%s'",
//            $username, crypt($password));
        $query = sprintf("SELECT * FROM user WHERE username = '%s'",
            $username);

        $result = $this->db->query($query);

        $row = $result->fetch_assoc();
        var_dump($row);
        if (null != $row) {
            $user = User::create($row);
        }
var_dump($user);
        if (null != $user)
        {
            if (crypt($password, $row['password']) == $row['password']) {
                $_SESSION['isAuthenticated'] = true;
                $_SESSION['userId'] = $user->getId();
                $_SESSION['username'] = $user->getUsername();
                return true;
            }
        }

        return false;
    }

    public static function deauthenticate()
    {
        session_unset();
        session_destroy();
    }

    public static function check()
    {
        if (!AuthenticationService::isAuthenticated())
        {
            header('Location: index.php');
        }
    }

    public static function isAuthenticated()
    {
        if (isset($_SESSION['isAuthenticated']) && ($_SESSION['isAuthenticated'] == true))
        {
            return true;
        }

        return false;
    }

}
