<?php

namespace App\Models;

class User
{
    public int $ID;
    public string $Firstname;
    public string $Lastname;
    public string $Username;
    public string $Email;
    public string $Gender;

    public function __construct(int $id, string $firstname, string $lastname, string $username, string $email, string $gender)
    {
        $this->ID = $id;
        $this->Firstname = $firstname;
        $this->Lastname = $lastname;
        $this->Username = $username;
        $this->Email = $email;
        $this->Gender = $gender;
    }
}
