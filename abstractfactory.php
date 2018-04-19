<?php
abstract class AbstractFactory {
  abstract public function createName ( $sex, $firstname);
}

class Factory extends AbstractFactory {
  public function createName ( $sex, $firstname) {
    switch ($sex) {
      case 'male':
          return (new NameMale($firstname));
        break;

      case 'female':
          return new NameFemale($firstname);
        break;
      
      default:
          return;
        break;
    }
  }
}

abstract class Name {
  public $firstname;
  public function __construct($firstname)
  {
      $this->firstname = $firstname;
  }
}

class NameMale extends Name {
  public function getName () {
    echo "Nguyen Van " . $this->firstname;
  }
}

class NameFemale extends Name {
  public function getName () {
    echo "Nguyen Thi " . $this->firstname;
  }
}

$factory = new Factory();
$thien = $factory->createName('male', 'Thien');
echo "Name : <br>";
$thien->getName();
echo "<br>";

$thien = $factory->createName('female', 'Yen');
echo "Name : <br>";
$thien->getName();
