<?php
interface Observer {
  public function add(Subject $currency);
}
 
class OffDayObserver implements Observer {
  private $currencies;
   
  public function __construct() {
  }
   
  public function add(Subject $currency) {
    $this->currencies = $currency;
  }
   
  public function updateOffDay() {
    $this->currencies->update();
  }
}
 
interface Subject {
  public function update();
  public function getOff($sumOffDay, $sumOTDay, $sumProject);
}
 
class Thien implements Subject {
  private $sumOTDay;
  private $sumProject;
  private $sumOffDay;
   
  public function __construct($sumOffDay, $sumOTDay, $sumProject) {
    $this->sumOffDay = $sumOffDay;
    $this->sumOTDay = $sumOTDay;
    $this->sumProject = $sumProject;
  }
   
  public function update() {
    echo "Off day orignal: " . $this->sumOffDay . "<br>";
    echo "<hr />";
    $this->sumOffDay = $this->getOff($this->sumOffDay, $this->sumOTDay, $this->sumProject);
    echo "Off day Updated : ". $this->sumOffDay . "<br>";
  }
   
  public function getOff($sumOffDay, $sumOTDay, $sumProject) {
    return offDay($sumOffDay, $sumOTDay, $sumProject);
  }
     
}
 
function offDay($sumOffDay, $sumOTDay, $sumProject){
  return ($sumOffDay + ($sumOTDay + $sumProject)/2);
}
 
$offDayObserver = new OffDayObserver();
 
$thien = new Thien(10, 3, 5);
 
$offDayObserver->add($thien);
 
$offDayObserver->updateOffDay();