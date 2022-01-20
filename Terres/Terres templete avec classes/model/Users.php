<?php

class Users
{
    private string $name;
    private string $firstName;
    private string $creationdate;
    private string $mail;
    private string $password;
    private array $Pictures = array();
    private DateTime $releasedate;

    public function  __construct($name)
    {
        $this->name = $name;
    }


    public function GetName()
    {
        return $this->name;
    }

    public function GetFirstName()
    {
        return $this->firstName;
    }


    public  function Getcreationdate()
    {
        return $this->creationdate;
    }


    public function GetMail()
    {
        return $this->mail;
    }

    public function GetDescription()
    {
        $this->description;
    }

    public function GetPassword()
    {
        return $this->password;
    }
}