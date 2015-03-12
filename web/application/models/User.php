<?php

class User
{
    protected $id;
    protected $username;
    protected $name;
    protected $friends;

    public static function create($array)
    {
        $user = new User();
        $user->id = $array['id'];
        $user->username = $array['username'];
        $user->name = $array['name'];

        return $user;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getFriends()
    {
        return $this->friends;
    }

    public function setFriends($users)
    {
        $this->friends = $users;
    }
}
