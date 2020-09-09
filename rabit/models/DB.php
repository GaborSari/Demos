<?php
include_once ('./utilities/config.php');

class DB extends PDO
{
    private $instance = null;
    private $host = null;
    private $name = null;

    public function __construct($host = dbHost, $name = dbName, $username = dbUsername, $password = dbPassword)
    {
        if ($this->instance == null)
        {
            $conn = new PDO("mysql:host=" . $host . ";dbname=" . $name, $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->instance = $conn;
            $this->host = $host;
            $this->name = $name;
        }
        return $this->instance;
    }

    public function __destruct()
    {
        $this->stmt = null;
        $this->instance = null;
    }

    public function check()
    {
        if ($this->instance == null || $this->name == null)
        {
            return false;
        }
        return true;
    }

    function select($sql, $cond = null)
    {
        $result = false;
        try
        {
            $this->stmt = $this->instance->prepare($sql);
            $this->stmt->execute($cond);
            $result = $this->stmt->fetchAll();
        }
        catch(Exception $ex)
        {
            die($ex->getMessage());
        }
        $this->stmt = null;
        return $result;
    }
}

?>
