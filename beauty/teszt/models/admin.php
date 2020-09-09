<?php
include_once('./functions/db.php');
include_once('./functions/queries.php');
class Admin  implements Serializable
{

	public $username = null;
	public $level = null;
	private $password = null;
	private $db_instance = null;

	public function __construct($db_instance, $username, $password)
	{
		if (!isset($this->username)) {
			$this->db_instance = $db_instance;
			$this->username = $username;
			$this->password = $password;
		}
	}


	public function login($username = null, $password = null)
	{
		if ($password != null) {
			$this->username = $username;
			$this->password = $password;
		}
		$result = $this->db_instance->runPreparedQuery(Queries::$login, [$this->username, md5($this->password)]);
		if (!empty($result)) {
			$result = $result[0];
			$this->level = $result["level"];
			return $result;
		}
		return false;
	}

	public function addLog($user, $level, $event, $comment = null)
	{
		if ($comment != null) {
			$comment = $this->username . "\t" . $comment;
		} else {
			$comment = $this->username;
		}
		$result = $this->db_instance->runPreparedQuery(Queries::$addLog, [$user, $level, $event, $comment], false);
		return $result;
	}

	/**
	 * String representation of object
	 *
	 * @return string
	 */
	public function serialize()
	{
		return json_encode([
			'username' => $this->username,
			'password' => $this->password,
			'level' => $this->level
		]);
	}

	/**
	 * Constructs the object
	 *
	 * @param string $serialized
	 * @return void
	 */
	public function unserialize($serialized)
	{
		$json = json_decode($serialized);

		$this->username = $json->username;
		$this->password = $json->password;
		$this->level = $json->level;
		if ($this->db_instance == null) {
			$DB = new DB();
			$this->db_instance = $DB;
		}
	}
}