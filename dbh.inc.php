<?php

class Dbh {
	private $server_name;
	private $user_name;
	private $password;
	private $db_name;
	
	protected function connect() {
		$this -> server_name = "localhost:3306";
		$this -> user_name = "root";
		$this -> password = "test";
		$this -> db_name = "datapandemonium";
	
		$con = new mysqli($this -> server_name, $this -> user_name, $this -> password, $this -> db_name);
		return $con;
	}
}