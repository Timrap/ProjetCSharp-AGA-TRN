<?php

/**
 * @brief This function is designed to execute a query received as parameter
 * @param $query
 * @return array|null
 * @link https_//php.net/manual/en/pdo.prepare.php
 */
function executeQuerySelect($query)
{
    $queryResult = null;

    $dbConnexion = openDBConnexion();
    if ($dbConnexion != null)
    {
        $statement = $dbConnexion->prepare($query); // préparation de la requêre
        $statement->execute(); // Execution de la requête
        $queryResult = $statement->fetchAll(); // Préparation des résultats pour le client
    }
    $dbConnexion = null; // Fermeture de ma connection à la BD
    return $queryResult;
}

/**
 * @brief This function is designed to insert value on database
 * @param $query
 * @return null
 */

function executeQueryInsert($query)
{
    $queryResult = null;

    $dbConnexion = openDBConnexion(); // Ouvre la connection à la BD
    if ($dbConnexion != null)
    {
        $statement = $dbConnexion->prepare($query); // préparation de la requêre
        $statement->execute(); // Execution de la requête
    }
    $dbConnexion = null; // Fermeture de ma connection à la BD
    return $queryResult;
}

function openDBConnexion()
{
    $tempDBConnexion = null;

    $sqlDriver = 'mysql';
    $hostname = 'localhost';
    $port = 3306;
    $charset = 'utf8';
    $dbName = 'terresBDD';
    $userName = 'terres';
    $userPwd = '7O5EN5YABApovEyeso8ocIxeg8Ko1e';
    $dsn = $sqlDriver.':host='.$hostname.';dbname='.$dbName.';port='.$port.';charset='.$charset;

    try {
        $tempDBConnexion = new PDO($dsn, $userName, $userPwd);
    }
    catch (PDOException $exception){
        echo  'Connexion failed'. $exception->getMessage();
    }
    return $tempDBConnexion;
}

// Classe pour gérer les exceptions liées au modèle
class ModelDataException extends Exception
{

}