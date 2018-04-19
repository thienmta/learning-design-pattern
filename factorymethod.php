<?php
class Autoperson
{
  private $firstName;
  private $lastName;
  
  public function __construct($firstName, $lastName)
  {
    $this->firstName = $firstName;
    $this->lastName = $lastName;
  }
  
  public function getMakeAndModel()
  {
    return $this->firstName . ' ' . $this->lastName;
  }
}

class AutomobileFactory
{
  public static function create($firstName, $lastName)
  {
    return new Autoperson($firstName, $lastName);
  }
}

$thien = AutomobileFactory::create('Nguyen Van', 'Thien');
echo $thien->getMakeAndModel()."<br>";
$yen = AutomobileFactory::create('Nguyen Hoang', 'Yen');
echo $yen->getMakeAndModel()."<br>";
