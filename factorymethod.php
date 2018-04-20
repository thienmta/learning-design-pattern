<?php
interface Person {
  public function __construct($firstName, $lastName);
  public function getNamePerson();
}
class Maleperson implements Person
{
  private $firstName;
  private $lastName;
  
  public function __construct($firstName, $lastName)
  {
    $this->firstName = $firstName;
    $this->lastName = $lastName;
  }
  
  public function getNamePerson()
  {
    return 'Male: '.$this->firstName . ' ' . $this->lastName;
  }
}

class Femaleperson implements Person
{
  private $firstName;
  private $lastName;
  
  public function __construct($firstName, $lastName)
  {
    $this->firstName = $firstName;
    $this->lastName = $lastName;
  }
  
  public function getNamePerson()
  {
    return 'Female: '.$this->firstName . ' ' . $this->lastName;
  }
}

class AutoPerson
{
  public function create($sex, $firstName, $lastName)
  {
    switch ($sex) {
      case 'male':
        return new Maleperson($firstName, $lastName);
        break;
      case 'female':
        return new Femaleperson($firstName, $lastName);
        break;
      default:
        return ;
        break;
    }
  }
}

$thien = AutoPerson::create('male', 'Nguyen Van', 'Thien');
echo $thien->getNamePerson()."<br>";
$yen = AutoPerson::create('female', 'Nguyen Hoang', 'Yen');
echo $yen->getNamePerson()."<br>";
