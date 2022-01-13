<?php

session_start();

require_once "controller/navigation.php";

if (isset($_GET['action'])) {
    $action = $_GET['action'];
    switch ($action) {
        case 'home' :
            home();
            break;
        case  'register' :
            register();
            break;

        default :
            lost();
    }
} else {
    home();
}