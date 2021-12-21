<?php
/**
 * @file articles.php
 * @brief This controller is designed to manage all snows actions
 * @author Created by Andreas Granada
 * @version  18.02.2021
 */

function displayArticles()
{
    try{
        require_once "model/articlesManager.php";
        //Récupérer les articles de la BD envoyés par le modèle
        $articles = getArticles();
    }
    catch (ModelDataException $ex){
        $articleErrorMessage = "Nous rancontrons temporairement des problèmes techniques";
    }
    finally{
        require_once "view/articles.php";
    }
}
function displayArticleDetail($code)
{
    try{
        require_once "model/articlesManager.php";
        //Récupérer les articles de la BD envoyés par le modèle
        $articleDetailToDisplay = getArticlesDetail($code);
    }
    catch (ModelDataException $ex){
        $articleErrorMessage = "Nous rancontrons temporairement des problèmes techniques";
    }
    finally{
        require_once "view/articles-Detail.php";
    }
}

function displayArticlesAdmin()
{
    try{
        require_once "model/articlesManager.php";
        //Récupérer les articles de la BD envoyés par le modèle
        $allArticleDetailToDisplay = getArticles();
    }
    catch (ModelDataException $ex){
        $articleErrorMessage = "Nous rancontrons temporairement des problèmes techniques";
    }
    finally{
        require_once "view/articles-admin.php";
    }
}

function calculator ()
{
    $value = ['num-product1'] ;

}