<?php

function home()
{
    require "view/home.php";
}

function register($data)
{
    require_once 'model/Users.php';
    userManage($data);
}

function lost()
{
    require "view/lost.php";
}
