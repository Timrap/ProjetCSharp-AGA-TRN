<?php
    
    /**
     * @param $query
     * @return array|false|null
     */
    function executeQuerySelect($query)
    {
        $queryResult = null;
        
        $dbConnexion = openDBConnexion();
        if ($dbConnexion != null) {
            $statement = $dbConnexion->prepare($query);     // Préparation de la requête
            $statement->execute();                          // Exécution de la requête
            $queryResult = $statement->fetchAll();          // Préparation des résultats pour le client
        }
        $dbConnexion = null;                                // Fermeture de ma connection à la DB
        return $queryResult;
    }
    
    /**
     * @param $query
     * @return bool|null
     */
    function executeQueryInsert($query)
    {
        $queryResult = null;
        
        $dbConnexion = openDBConnexion();                  // Ouvre la connection à la BD
        if ($dbConnexion != null) {
            $statement = $dbConnexion->prepare($query);     // Préparation de la requête
            $statement->execute();                          // Execution de la requête
            $queryResult = true;
        }
        $dbConnexion = null;                                // Fermeture de ma connection à la DB
        return $queryResult;
    }
    
    /**
     * @param $query
     * @return bool|null
     */
    function executeQueryUpdate($query)
    {
        $queryResult = null;
        
        $dbConnexion = openDBConnexion();                  // Ouvre la connection à la BD
        if ($dbConnexion != null) {
            $statement = $dbConnexion->prepare($query);     // Préparation de la requête
            $statement->execute();                          // Execution de la requête
            $queryResult = true;
        }
        $dbConnexion = null;                                // Fermeture de ma connection à la DB
        return $queryResult;
    }
    
    
    /**
     * @brief
     * @return PDO|null
     */
    function openDBConnexion()
    {
        $tempDBConnexion = null;
        
        $sqlDriver = 'mysql';
        $hostname = 'localhost';
        $port = 3306;
        $charset = 'utf8';
        $dbName = 'mld_projetc#';
        $userName = 'terres';
        $userPsw = 'Pa$$w0rd';
        $dsn = $sqlDriver . ':host=' . $hostname . ';dbname=' . $dbName . ';port=' . $port . ';charset=' . $charset;
        
        try {
            $tempDBConnexion = new PDO($dsn, $userName, $userPsw);
        } catch (PDOException $exception) {
            echo 'Connection failed' . $exception->getMessage();
        }
        
        return $tempDBConnexion;
    }
    
    //Classe pour gérer les exeptions liées au modèle
    class ModelDataException extends Exception
    {
    
    }