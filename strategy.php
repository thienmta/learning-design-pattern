<?php
interface StrategySort {
  public function convert ( $list );
}

class Strtoupper implements StrategySort {
  public function convert ( $list ) {
    $list = strtoupper($list);
    return ($list);
  }
}

class Strtolower implements StrategySort {
  public function convert ( $list ) {
    $list = strtolower($list);
    return ($list);
  }
}

class Employee {
  private $employee;

  public function __construct ( $employee) {
    $this->employee = $employee;
  }

  public function convert ( StrategySort $s_sort ) {
    $this->employee = $s_sort->convert($this->employee);
  }

  public function converted ($emp) {
    echo $this->employee .'<br>';
  }
}

$employee = "Nguyen van Thien";

$listEmployee = new Employee( $employee );

echo "Name: <br>";
$listEmployee->converted();
echo "<br>";

echo "Name toupper: <br>";
$listEmployee->convert( new Strtoupper() );
$listEmployee->converted();

echo "<br>";

echo "Name tolower: <br>";
$listEmployee->convert( new Strtolower() );
$listEmployee->converted();