<?php
class WifiCompany {
	static private $password = null;
	public $username = null;

	static function getInstance () {
		if ( self::$password == null ) {
			self::$password = new WifiCompany();
		}
		return self::$password;
	}

	function setWifiInfomation ( $username, $password ) {
		this->username = $username;
		this->password = $password;
	}

	function getWifiInfomation () {
		echo "Infomation wifi our company: <br>";
		echo "Username: ".this->username."<br>";
		echo "Password: ".this->password."<br>";
	}

	function editWifiInfomation ( $username, $password ) {
		this->username = $username;
		this->password = $password;
	}
}