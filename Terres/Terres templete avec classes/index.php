<?php
/**
 * @file      index.php
 * @brief     This file is the rooter managing the link with controllers.
 * @author    Created by Pascal.BENZONANA
 * @author    Updated by Nicolas.GLASSEY
 * @version   13-APR-2020
 */

require "controller/navigation.php";
require "controller/users.php";
require "controller/articles.php";

session_start();

if (isset($_GET['action'])) {
    $action = $_GET['action'];
    switch ($action) {
        case 'home' :
            home();
            break;
        case 'login':
            login($_POST);
            break;
        case 'register':
            register($_POST);
            break;
        case 'logout':
            logout();
            break;
        case 'displayArticles':
            displayPictures();
            break;
        case 'articlesAdmin':
            displayPicturesAdmin();
            break;
        default :
            lost();
    }
} else {
    home();
}