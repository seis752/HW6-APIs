<?php

class User
{
    protected $id;
    protected $username;
    protected $name;
    protected $friends;
    protected $phone;
    protected $lat;
    protected $lon;

    public static function create($array)
    {
        $user = new User();
        $user->id = $array['id'];
        $user->username = $array['username'];
        $user->name = $array['name'];

        if (array_key_exists('phone', $array))
        {
            $user->phone = $array['phone'];
        }

        if (array_key_exists('lat', $array))
        {
            $user->lat = $array['lat'];
        }

        if (array_key_exists('lon', $array))
        {
            $user->lon = $array['lon'];
        }

        return $user;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($value)
    {
        $this->id = $value;
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

    public function getPhone()
    {
        return $this->phone;
    }

    public function setPhone($value)
    {
        $this->phone = $value;
    }

    public function getLat()
    {
        return $this->lat;
    }

    public function setLat($value)
    {
        $this->lat = $value;
    }

    public function getLon()
    {
        return $this->lon;
    }

    public function setLon($value)
    {
        $this->lon = $value;
    }

}
