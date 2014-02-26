<?php
require_once 'utils/constants.php';

class DBConnection {
	
	const SERVER = SERVER;
	const USER = USER;
	const PASS = PASS;
	const DATABASE = DATABASE;
	
	private $c;

	function __construct()
	{
		$this->c = mysql_connect(self::SERVER, self::USER, self::PASS) or die('Couldn\'t connect to Mysql on ' . self::SERVER);
		mysql_select_db(self::DATABASE, $this->c) or die('Couldn\'t open database ' . self::DATABASE);
	}

	function query($query) {
		return mysql_query($query, $this->c);
	}

	function fetch($result) {
		return mysql_fetch_row($result);
	}
}
?>