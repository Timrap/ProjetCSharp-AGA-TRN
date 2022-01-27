<?php

class PicturePovider
{
    public function getAllPicture(){
        require_once "dbConnector.php";
        require_once "classes/NFT.php";
        try{
            $dbConnector = new dbConnector();
            $sqlQuery = "SELECT terres.accessPath, terres.name, terres.size, terres.imageFormat FROM terres;";
            $images= $dbConnector->executeQuerySelect($sqlQuery);
            $PictureArray = array();
            foreach ($images as $imagesString){
                $images = new Pictures($imagesString["Name"], $imagesString["imageFormat"],$imagesString[0]);
                array_push($PictureArray, $images);
            }
            return $PictureArray;

        }catch (ModelDataExeption | PDOException $e){
            $error = "A problem occured";
            $navigation = new navigation();
            $navigation->displayHome($error);
        }
        return null;
    }
}