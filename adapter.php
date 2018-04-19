<?php
interface UserInterface
{
	public function setName($name);
  public function getName();
}

class User
{
	private $name;

	public function setName($name)
  {
  	$this->name = $name;
  }

  public function getName()
  {
  	return $this->name;
  }
}

interface CustomerInterface
{
	public function setFirstName($fname);
  public function getFirstName();
  public function setLastName($lname);
  public function getLastName();
}

class UserToCustomerAdapter implements CustomerInterface
{
  protected $user;
  protected $firstName;
  protected $lastName;

  public function __construct(User $user)
  {
		$this->user = $user;
    $fullname = $this->user->getName();
    $pieces = explode(" ", $fullname);
    $this->firstName = $pieces[0];
    $this->lastName = $pieces[1];
  }

  public function setFirstName($fname)
  {
     $this->firstName = $fname;
  }

  public function getFirstName()
  {
     return $this->firstName;
  }

  public function setLastName($lname)
  {
     $this->lastName = $lname;
  }

  public function getLastName()
  {
     return $this->lastName;
  }
}

$user = new User;
$user->setName("Thien Mta");
// sua doi giao dien hirn thi
$adapter = new UserToCustomerAdapter($user);
$firstName = $adapter->getFirstName();
$lastName = $adapter->getLastName();
echo "First name: ".$firstName."<br>";
echo "Last name: ".$lastName;
