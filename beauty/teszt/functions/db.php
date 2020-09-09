<?php
include_once('./config.php');

class DB extends PDO
{
	private $instance = null;
	private $host = null;
	private $name = null;

	public function __construct($host = dbHost, $name = dbName, $username = dbUsername, $password = dbPassword)
	{
		if ($this->instance == null) {
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
		$this->instance = null;
	}

	public function check()
	{
		if ($this->instance == null || $this->name == null) {
			return false;
		}
		return true;
	}

	public function runQuery($sql)
	{
		$stmt = $this->instance->query($sql);
		$stmt->setFetchMode(PDO::FETCH_ASSOC);

		return $stmt;
	}

	public function runPreparedQuery($sql, $params, $select = true)
	{
		$stmt = $this->instance->prepare($sql);
		$stmt->execute($params);
		if ($select) {
			$arr = $stmt->fetchAll();
			return $arr;
		} else {
			$result = $stmt->rowCount();
			return $result;
		}
	}

	public function createPrepared($sql)
	{
		$stmt = $this->instance->prepare($sql);
		return $stmt;
	}

	public function getTypes()
	{
		$result = $this->runPreparedQuery(Queries::$getTypes, []);
		return $result;
	}
	public function getAddresses()
	{
		return $this->runPreparedQuery(Queries::$getAddresses, []);
	}
	public function getLastInsertId()
	{
		return $this->instance->lastInsertId();
	}
	public function getLog()
	{
		return $this->runPreparedQuery(Queries::$getLog, []);
	}
}