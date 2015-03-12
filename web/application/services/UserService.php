<?php

class UserService {

    protected $db;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    public function fetchCurrentUser()
    {
        return $this->findById($_SESSION['userId']);
    }

    public function findAll()
    {
        $users = [];

        $result = $this->db->query("SELECT * FROM user");

        while ($row = $result->fetch_assoc())
        {
            array_push($users, User::create($row));
        }

        return $users;
    }

    public function findById($id)
    {
        $user = null;

        $result = $this->db->query(sprintf("SELECT * FROM user WHERE user.id = %d", $id));

        $row = $result->fetch_assoc();

        $user = User::create($row);

        return $user;
    }

    public function findByUsername($username)
    {
        $user = null;

        $result = $this->db->query(sprintf("SELECT * FROM user WHERE user.username = '%s'", $username));

        $row = $result->fetch_assoc();

        if ($row != null) {
            $user = User::create($row);
        }

        return $user;
    }

    public function findFriends($userId)
    {
        $users = [];

        $query = sprintf("SELECT u2.id, u2.username, u2.name
            FROM user u1
            INNER JOIN relationship r ON r.user_1_id = u1.id
            INNER JOIN user u2 ON u2.id = r.user_2_id
            WHERE u1.id = %d", $userId);

        $result = $this->db->query($query);

        // NOTE: "fetch_all" is not working at ASO!
        // REF: http://stackoverflow.com/questions/25605292/alternative-to-mysqli-fetch-all-needed
        // REF: http://stackoverflow.com/questions/15029271/mysqli-fetch-all-stopped-working-on-php-5-4-11
//        $rows = $result->fetch_all(MYSQLI_ASSOC);
//
//        foreach ($rows as $row) {
//            array_push($users, User::create($row));
//        }

        while ($row = $result->fetch_assoc())
        {
            array_push($users, User::create($row));
        }

        return $users;
    }

    public function checkHasFriend($userId, $friendId)
    {
        $hasFriend = false;

        $friends = $this->findFriends($userId);

        foreach ($friends as $friend)
        {
            if ($friend->getId() == $friendId)
            {
                $hasFriend = true;
            }
        }

        return $hasFriend;
    }

    /**
     * TODO: Could be 1 insert if the query to find user's friends isn't
     * dependent on which user column represents user and friend.
     */
    public function addFriend($userId, $friendId)
    {
        // INSERT the record to relate the "friend" to the "user".
        $query = sprintf("INSERT INTO `relationship` (`user_1_id`, `user_2_id`) VALUES (%d, %d);", $userId, $friendId);
        $result = $this->db->query($query);

        // INSERT the record to relate the "user" to the "friend".
        $query = sprintf("INSERT INTO `relationship` (`user_1_id`, `user_2_id`) VALUES (%d, %d);", $friendId, $userId);
        $result = $this->db->query($query);

        // TODO: Add logic to verify success of the database operations.
        return true;
    }

    public function removeFriend($userId, $friendId)
    {
        // DELETE the record relating the "friend" to the "user".
        $query = sprintf("DELETE FROM `relationship` WHERE `user_1_id` = %d AND `user_2_id` = %d;", $userId, $friendId);
        $result = $this->db->query($query);

        // DELETE the record relating the "user" to the "friend".
        $query = sprintf("DELETE FROM `relationship` WHERE `user_1_id` = %d AND `user_2_id` = %d;", $friendId, $userId);
        $result = $this->db->query($query);

        // TODO: Add logic to verify success of the database operations.
        return true;
    }

    public function register($username, $password, $name)
    {
        $user = $this->findByUsername($username);

        if ($user == null)
        {
            // TODO: Encrypt password!
            $query = sprintf("INSERT INTO user (username, password, name, created_when) VALUES ('%s', '%s', '%s', now())", $this->db->mysqli->real_escape_string($username), crypt($password), $this->db->mysqli->real_escape_string($name));
            $result = $this->db->query($query);

            return true;
        }

        return false;
    }

    public function search($name)
    {
        $users = [];

        $query = "SELECT * FROM user where name like '%$name%' limit 20";
        $result = $this->db->query($query);

        while ($row = $result->fetch_assoc())
        {
            array_push($users, User::create($row));
        }

        return $users;
    }

}
