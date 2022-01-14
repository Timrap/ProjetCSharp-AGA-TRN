<?php

/**
 * Project :            Terres
 * Class :              Users
 * Developer :          Timothée RAPIN
 * Creation date :      30.11.2021
 * Modification date :  02.12.2021
 * Version :            0.1
 */
 

namespace Users;

require_once 'model/dbConnector.php';

class Users
{
    //<editor-fold desc="private attributes">
    private $_id;
    private $_firstname;
    private $_lastname;
    private $_creationDate;
    private $_mail;
    private $_password;
    private $_type;
    //</editor-fold>

    //<editor-fold desc="public methods">
    
    //Constructor
    function User($id, $firstname, $lastname, $creationDate, $mail, $password, $type){
        $_id = $id;
        $_firstname = $firstname;
        $_lastname = $lastname;
        $_creationDate = $creationDate;
        $_mail = $mail;
        $_password = $password;
        $_type = $type;
    }
    
    
    /**
     * @param $_mail
     * @param $_password
     * @return bool
     */
    public function isLoginCorrect($_mail, $_password)
    {
        $result = FALSE;
        
        $strSeparator = "'";
        $query = "SELECT users.passwordHash FROM users WHERE users.mail = " . $strSeparator . $_mail . $strSeparator;
        
        require_once 'model/dbConnector.php';
        $queryResult = executeQuerySelect($query);
        $queryResult = $queryResult[0];
        if ($queryResult) {
            if (password_verify($_password, $queryResult['passwordHash'])) {
                return TRUE;
            }
        }
        
        return $result;
    }
    
    /**
     * @param $_mail
     * @return mixed
     */
    public function getUserId($_mail)
    {
        $query = "SELECT id FROM users WHERE mail = '" . $_mail . "';";
        require_once 'model/dbConnector.php';
        $queryResult = executeQuerySelect($query);
        $queryResult = $queryResult[0];
        return $queryResult;
    }
    
    /**
     * @param $_mail
     * @return string
     */
    public function firstNameLastName($_mail)
    {
        
        
        $strSeparator = "'";
        $query = "SELECT users.firstName, users.lastName FROM users WHERE mail = " . $strSeparator . $_mail . $strSeparator;
        
        require_once 'model/dbConnector.php';
        $queryResult = executeQuerySelect($query);
        $user = $queryResult[0];
        
        $_firstname = $user['firstName'];
        $_lastname = $user['lastName'];
        
        $result = "$_firstname
        $_lastname";
        return $result;
    }
    
    /**
     * @brief This function is designed to register a new account
     * @param $_mail : must be meet RFC 5321/5322
     * @param $_password          : user's password
     * @return bool : "true" only if the user doesn't already exist. In all other cases will be "false".
     * @throws ModelDataBaseException : will be throw if something goes wrong with the database opening process
     */
    public function registerAccount(/*$id, */ $_firstname, $_lastname, $_mail, $_password)
    {
        $result = FALSE;
        
        $strSeparator = "'";
        
        $userHashPsw = password_hash($_password, PASSWORD_DEFAULT);
        
        $registerQuery = "INSERT INTO users (firstName, lastName, mail, type, passwordHash) VALUES ('$_firstname', '$_lastname', '$_mail', 0, '$userHashPsw')";
        
        require_once 'model/dbConnector.php';
        $queryResult = executeQueryInsert($registerQuery);
        if ($queryResult) {
            $result = $queryResult;
        }
        
        return $result;
    }
    
    
    /**
     * @param $data
     */
    public function userManage($data)
    {
        try {
            //variable set
            if (isset($data['inputUserEmailAddress']) && isset($data['inputUserPsw']) && isset($data['inputUserPswRepeat'])) {
                
                $strSeparator = "'";
                $query = "SELECT users.firstName, users.lastName, users.mail, users.type, users.passwordHash FROM users WHERE users.mail = " . $strSeparator . $data['inputUserEmailAddress'] . $strSeparator;
                $user = executeQuerySelect($query);
                
                // Test si l'email existe déjà
                $existAccount = FALSE;
                if (isset($user) && $user != "" && $user != NULL && $user != 0) {
                    $dataUser = $user;
                    $id = $user['id'];
                    $existAccount = TRUE;
                }
                
                // Si l'email n'existe pas dans la BDD
                if ($existAccount == FALSE) {
                    
                    // Si l'utilisateur à entré 2 fois le même mot de passe
                    if ($data['inputUserPsw'] == $data['inputUserPswRepeat']) {
                        require_once "model/usersManager.php";
                        
                        // Si le compte à bien été créé dans la BDD
                        if (registerAccount($data['inputUserFirstName'], $data['inputUserLastName'], $data['inputUserEmailAddress'], $data['inputUserPsw'])) {
                            // Crée la séssion si elle n'éxiste pas
                            if (!isset($_SESSION['userEmailAddress'])) {
                                createSession($data['inputUserEmailAddress'], 1);
                            }
                            $registerErrorMessage = NULL;
                            require "view/home.php";
                        }
                        else {
                            $registerErrorMessage = "L'inscription n'est pas possible avec les valeurs saisies !";
                            require "view/register.php";
                        }
                        
                    }
                    else {
                        $registerErrorMessage = "Les mots de passe ne sont pas similaires !";
                        require "view/register.php";
                    }
                }
                else {
                    $registerErrorMessage = "L'adresse email existe déjà !";
                    require "view/register.php";
                }
            }
            else {
                $registerErrorMessage = NULL;
                require "view/register.php";
            }
            
        }
        catch (ModelDataBaseException $ex) {
            $registerErrorMessage = "Nous rencontrons actuellement un problème technique. Il est temporairement impossible de s'enregistrer. Désolé du dérangement !";
            require "view/register.php";
        }
    }
    
    public function userType($_mail)
    {
        $strSeparator = "'";
        $query = "SELECT users.type FROM users WHERE mail = " . $strSeparator . $_mail . $strSeparator;
        $user = executeQuerySelect($query);
        $user = $user[0];
        $result = $user['type'];
        return $result;
    }
    
    public function userDeleteFromDB($_id)
    {
        $result = FALSE;
        
        $strSeparator = "'";
        
        $DeleteQuery = "DELETE FROM users WHERE id = " . $strSeparator . $_id . $strSeparator;
        
        require_once 'model/dbConnector.php';
        $queryResult = executeQueryInsert($DeleteQuery);
        if ($queryResult) {
            $result = $queryResult;
        }
        
        return $result;
    }
    
    public function userAccountManageInDb($data, $_id)
    {
        $_id = $_id['userId'];
        
        $strSeparator = "'";
        $query = "SELECT users.id, users.firstName, users.lastName, users.mail, users.type, users.passwordHash FROM users WHERE users.id = " . $strSeparator . $_id . $strSeparator;
        
        require_once 'model/dbConnector.php';
        $queryResult = executeQuerySelect($query);
        $user = $queryResult[0];
        
        $strSeparator = "'";
        $query = "SELECT users.id FROM users WHERE users.mail = " . $strSeparator . $_SESSION['userEmailAddress'] . $strSeparator;
        
        require_once 'model/dbConnector.php';
        $queryResult = executeQuerySelect($query);
        $_idSession = $queryResult[0];
        $_idSession = $_idSession[0];
        
        try {
            //variable set
            if (isset($_id) && isset($data['inputUserEmailAddress'])) {
                
                // Test si l'email existe déjà
                $strSeparator = "'";
                $query = "SELECT users.mail FROM users WHERE users.id = " . $strSeparator . $_id . $strSeparator;
                $queryResult = executeQuerySelect($query);
                $_mail = $queryResult[0];
                $existAccount = FALSE;
                if (isset($_mail) && $_mail != "" && $_mail != NULL && $_mail != 0 && $_mail['mail'] != $user['mail']) {
                    $existAccount = TRUE;
                }
                
                // Si l'email n'existe pas dans la BDD
                if ($existAccount == FALSE) {
                    
                    // Si l'utilisateur à entré 2 fois le même mot de passe
                    /*if ($data['inputUserPsw'] == $data['inputUserPswRepeat']) {
                        require_once "model/usersManager.php";*/
                    
                    // S'il y a toujours 1 administrateur
                    $query = "SELECT COUNT(users.mail) FROM users WHERE users.type = 2";
                    $nbAdmin = executeQuerySelect($query);
                    $nbAdmin = $nbAdmin[0][0];
                    
                    /*
                     * 0 = utilisateur
                     * 1 = Gestionaire
                     * 2 = Administrateur
                     */
                    
                    if ($data['inputUserType'] == 2 || $nbAdmin > 1 || $user['id'] != $_idSession) {
                        
                        // Si le compte à bien été créé dans la BDD
                        if (updateAccount($_id, $data['inputUserFirstName'], $data['inputUserLastName'], $data['inputUserEmailAddress'], $data['inputUserType'])) {
                            $registerErrorMessage = NULL;
                            administration();
                        }
                        else {
                            $registerErrorMessage = "L'inscription n'est pas possible avec les valeurs saisies !";
                            require "view/updateUser.php";
                        }
                    }
                    else {
                        $registerErrorMessage = "Il faut minimum 1 Administrateur !";
                        require "view/updateUser.php";
                    }
                    /*
                                    }
                                    else
                                    {
                                        $registerErrorMessage = "Les mots de passe ne sont pas similaires !";
                                        require "view/updateUser.php";
                                    }*/
                }
                else {
                    $registerErrorMessage = "L'adresse email existe déjà !";
                    require "view/updateUser.php";
                }
            }
            else {
                $registerErrorMessage = NULL;
                require "view/updateUser.php";
            }
            
        }
        catch (ModelDataBaseException $ex) {
            $registerErrorMessage = "Nous rencontrons actuellement un problème technique. Il est temporairement impossible de s'enregistrer. Désolé du dérangement !";
            require "view/updateUser.php";
        }
    }
    
    public function updateAccount($_id, $_firstname, $_lastname, $_mail, $_type)
    {
        $result = FALSE;
        
        $strSeparator = "'";
        
        $query = "UPDATE users SET firstName = '$_firstname', lastName = '$_lastname', mail = '$_mail', type = '$_type' WHERE id = " . $strSeparator . $_id . $strSeparator;
        
        require_once 'model/dbConnector.php';
        $queryResult = executeQueryUpdate($query);
        if ($queryResult) {
            $result = $queryResult;
        }
        
        return $result;
    }
    //</editor-fold>

    //<editor-fold desc="private methods">

    //</editor-fold>
}