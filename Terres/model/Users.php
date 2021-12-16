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

class Users
{
    //<editor-fold desc="private attributes">
    private $_firstname;
    private $_lastname;
    private $_creationDate;
    private $_mail;
    private $_password;
    //</editor-fold>

    //<editor-fold desc="public methods">
    /**
     * @param $firstname
     * @param $lastname
     * @param $creationDate
     * @param $mail
     * @param $password
     */
    public function Users($firstname, $lastname, $creationDate, $mail, $password){
        $_firstname = $firstname;
        $_lastname = $lastname;
        $_creationDate = $creationDate;
        $_mail = $mail;
        $_password = $password;
    }
    //</editor-fold>

    //<editor-fold desc="private methods">

    //</editor-fold>
}