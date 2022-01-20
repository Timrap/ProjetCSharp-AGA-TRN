<?php

/**
 * @param $userEmailAddress
 * @param $userPsw
 * @return false
 */

function isLoginCorrect($userEmailAddress, $userPsw)
{
    $result = false;

    $strSeparator = '\'';
    $loginQuery ='SELECT userHashPsw, userType FROM users WHERE userEmailAddress ='.$strSeparator.$userEmailAddress.$strSeparator;


    require "model/dbConnector.php";
    $queryResult = executeQuerySelect($loginQuery);

    if (count($queryResult)==1)
    {
        //Récupération du password de la BD
        $userHashPsw = $queryResult[0]['userHashPsw'];
        //Comparaison avec le password du formulaire
        $result = password_verify($userPsw,$userHashPsw);
        if ($result == true)
        {
            $_SESSION['userType']=$queryResult[0]['userType'];

        }
    }
    return $result;
}

function registerNewAccount ($userEmailAddress, $userPsw)
{
    $result = false;

    $strSeparator = "'";

    $userType = 0;

    $userHashPsw = password_hash($userPsw, PASSWORD_DEFAULT);

    $registerQuery =   "INSERT INTO users (userEmailAddress, userHashPsw, userType) VALUES ('$userEmailAddress', '$userHashPsw', '$userType')";

    require_once "model/dbConnector.php";
    $queryResult = executeQueryInsert($registerQuery);
    if ($queryResult)
    {
        $result = $queryResult;
    }

    return $result;
}

