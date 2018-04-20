<?php
class WifiCompanySingleton {
	static private $checkRole = null;
	private $password;
	private $username;

	private function __construct() {}

	static function getInstance () {
		if ( self::$checkRole == null ) {
			self::$checkRole = new WifiCompanySingleton();
		}
		return self::$checkRole;
	}

	function setWifiInfomation ( $username, $password ) {
		$this->username = $username;
		$this->password = $password;
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

$manager = WifiCompanySingleton::getInstance();
$manager->setWifiInfomation("deha-soft", "12345678");
$manager->getWifiInfomation();

$employee = WifiCompanySingleton::getInstance();
$employee->getWifiInfomation();

unset($manager, $employee);

$test = new WifiCompanySingleton();
$test->setWifiInfomation("deha", "12");
$test->getWifiInfomation();
?>