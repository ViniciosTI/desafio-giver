<?php

namespace App\Data;

class ClientData
{
  public function __construct($firstName, $lastName, $email, $gender, $id=0, $total=0)
  {
    $this->id = $id;
    $this->total = $total;
    $this->firstName = $firstName;
    $this->lastName = $lastName;
    $this->gender = $gender;
    $this->email = $email;
  }

  public function getFirstName()
  {
    return $this->firstName;
  }

  public function getLastName()
  {
    return $this->lastName;
  }

  public function getGender()
  {
    return $this->gender;
  }

  public function getEmail()
  {
    return $this->email;
  }
}
