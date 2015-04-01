<?php

// REF: http://kjventura.com/2011/11/kickass-php-database-class-for-simple-web-apps/
// REF: http://php.net/manual/en/mysqlinfo.api.choosing.php

class Database
{
    protected $database;
    protected $host;
    public $mysqli;
    protected $password;
    protected $result;
    protected $user;

    public function __construct()
    {
        // See "config.php" for constant definitions.
        $this->host = DATABASE_HOST;
        $this->database = DATABASE_DATABASE;
        $this->user = DATABASE_USER;
        $this->password = DATABASE_PASSWORD;
    }

    public function connect()
    {
        // TODO: Replace with a better error handling strategy.
        if (null == $this->mysqli)
        {
            $this->mysqli = new mysqli($this->host, $this->user, $this->password, $this->database);
            $this->mysqli->select_db($this->database);
        }

        // REF: http://php.net/manual/en/mysqli.quickstart.connections.php
        if ($this->mysqli->connect_errno) {
            throw new Exception(sprintf("Failed to connect to MySQL: (%d %s)",
                $this->mysqli->connect_errno, $this->mysqli->connect_error));
        }
    }

    function query($query)
    {
        $this->connect();
        $this->result = $this->mysqli->query($query);
        return $this->result;
    }

    function close()
    {
        if ($this->mysqli != null) {
            $this->mysqli->close();
        }
    }
}
