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
    
    
    public function registerAccount(/*$id, */ $_firstname, $_lastname, $_mail, $_password)
    {
        $result = FALSE;
        
        $strSeparator = "'";
        
        $userHashPsw = password_hash($_password, PASSWORD_DEFAULT);
        
        $_id = userId();
        
        $registerQuery = "INSERT INTO users (id, username, name, firstName, creationDate, mail, password, userType) VALUES ('$_id', '$_username', '$_lastname', '$_firstname', '$_creationDate', '$_mail', '$userHashPsw', 0)";
        
        
        require_once 'model/dbConnector.php';
        $queryResult = executeQueryInsert($registerQuery);
        if ($queryResult) {
            $result = $queryResult;
        }
        
        return $result;
    }
    
    public function userId()
    {
        $result = FALSE;
        
        $strSeparator = "'";
        
        $idQuery = "SELECT id FROM users ORDER BY id Desc LIMIT 0,1";
        
        
        require_once 'model/dbConnector.php';
        $queryResult = executeQuerySelect($idQuery);
        if ($queryResult) {
            $result = $queryResult;
        }
        
        return $result;
    }
    
}