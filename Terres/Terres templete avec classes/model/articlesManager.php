<?php
/**
 * @file articlesManager.php
 * @brief This file is design to read articles from database
 * @author  Created by Andreas Granada
 * @version  18.02.2021
 */

function getArticles()
{
    $results = false;
    $strSeparator = '\'';

    $snowQuery = 'SELECT code, brand, model, snowLength, price, qtyAvailable, photo, active FROM snows';

    require_once  "model/dbConnector.php";

    return executeQuerySelect($snowQuery);
}
function getArticlesDetail($code)
{
    $snowDetail="SELECT code, brand, model, snowLength, price, qtyAvailable, photo, active, description, descriptionFull FROM snows WHERE code ='".$code."'";

    require_once "model/dbConnector.php";
    $articleDetail = executeQuerySelect($snowDetail);

    return $articleDetail[0];
}




