<?php
class WifiCompanySingleton {
	static private $checkRole = null;
	protected $password;
	protected $username;

	static function getInstance () {
		if ( self::$checkRole == null ) {
			self::$checkRole = new WifiCompanySingleton();
			return self::$checkRole;
		}
		else {
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

$manager = WifiCompanySingleton::getInstance();
$manager->setWifiInfomation("deha-soft", "12345678");
$manager->getWifiInfomation();

$employee = WifiCompanySingleton::getInstance();
$employee->setWifiInfomation("deha", "123");
$employee->getWifiInfomation();

unset($manager, $employee);
?>