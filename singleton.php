<?php
class WifiCompany {
	static private $checkRole = null;
	public $password;
	public $username;

	static function getInstance () {
		if ( self::$checkRole == null ) {
			self::$checkRole = new WifiCompany();
			return self::$checkRole;
		} else {
			echo "<b>Only admin can edit!</b>";
		}
	}

	function setWifiInfomation ( $username, $password ) {
		$this->username = $username;
		$this->password = $password;
		$this->checkRole = 1;
	}

	function getWifiInfomation () {
		echo "Infomation wifi our company: <br>";
		echo "Username: ".$this->username."<br>";
		echo "Password: ".$this->password."<br>";
	}

	function editWifiInfomation ( $username, $password ) {
		$this->username = $username;
		$this->password = $password;
	}
}
?>