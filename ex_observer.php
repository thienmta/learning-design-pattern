<?php

abstract class AbstractObserver {
    abstract function update(AbstractSubject $subject);
}

abstract class AbstractSubject {
    abstract function attach(AbstractObserver $observer);
    abstract function detach(AbstractObserver $observer);
    abstract function notify();
}

class SalaryObserver extends AbstractObserver {
    public function __construct() {
    }

    public function update(AbstractSubject $subject) {
      echo "On day: ".$subject->getOnDay()."<br>";
      echo "OT day: ".$subject->getOtDay()."<br>";
      echo "Update Salary: ".$subject->getSalary() ."<br>";
    }
}

class SumOnDayObserver extends AbstractObserver {
    public function __construct() {
    }

    public function update(AbstractSubject $subject) {
      echo "Sum on day: ".($subject->getOnDay() + $subject->getOtDay())."<br><br>";
    }
}

class SalarySubject extends AbstractSubject {
    private $onDay = 0;
    private $otDay = 0;
    private $observers = array();
    function __construct() {
    }

    function attach(AbstractObserver $observer) {
      $this->observers[] = $observer;
    }

    function detach(AbstractObserver $observer) {
      foreach($this->observers as $okey => $oval) {
        if ($oval == $observer) { 
          unset($this->observers[$okey]);
        }
      }
    }

    function notify() {
      foreach($this->observers as $obs) {
        $obs->update($this);
      }
    }

    function updateSalary($onDay, $otDay) {
      $this->onDay = $onDay;
      $this->otDay = $otDay;
      $this->notify();
    }

    function getSalary() {
      return ( $this->onDay * 150000 + $this->otDay * 200000 );
    }

    function getOnDay() {
      return $this->onDay;
    }

    function getOtDay() {
      return $this->otDay;
    }
}

  echo "SALARY <br><br>";

  $subject = new SalarySubject();
  $salary = new SalaryObserver();
  $sumOnDay = new SumOnDayObserver();

  $subject->attach($salary);
  $subject->attach($sumOnDay);

  $subject->updateSalary(20, 3);
  $subject->updateSalary(18, 2);
  $subject->updateSalary(12, 4);

  $subject->detach($salary);
  $subject->detach($sumOnDay);
  $subject->updateSalary(19, 2);