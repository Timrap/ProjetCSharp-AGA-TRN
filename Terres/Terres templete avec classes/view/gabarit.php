<!DOCTYPE html>
<!--
Template Name: Gleblu
Author: <a href="https://www.os-templates.com/">OS Templates</a>
Author URI: https://www.os-templates.com/
Copyright: OS-Templates.com
Licence: Free to use under our free template licence terms
Licence URI: https://www.os-templates.com/template-terms
-->
<html lang="">
<!-- To declare your language - read more here: https://www.w3.org/International/questions/qa-html-language-declarations -->
<head>
    <title>Terres</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
</head>
<body id="top">
<div class="wrapper row0">
</div>
<div class="wrapper row1">
    <header id="header" class="hoc clear">
        <div id="logo" class="fl_left">

            <h1><a href="index.php">Terres</a></h1>

        </div>
        <nav id="mainav" class="fl_right">

            <ul class="clear">
                <li <input type="text" role="textbox" value="Voici du texte" /> </li>
                <li class="active"><a href="index.php">Accueil</a></li>
                <li><a href="#">Favori</a></li>
                <li><a class="drop" href="#">Account</a>
                    <ul>
                        <li><a href="index.php?action=register">Register</a></li>
                        <li><a href="pages/full-width.html">Mes images</a></li>
                    </ul>
                </li>
            </ul>

        </nav>
    </header>
</div>

<div class="wrapper bgded overlay" style="background-image:url('images/demo/backgrounds/01.png');">

    <div class="wrapper row3">
        <main class="hoc container clear">
            <!-- main body -->

            <div class="content">
                <?=$content; ?>
            </div>

            <!-- / main body -->
            <div class="clear"></div>
        </main>
    </div>




</div>


<div class="wrapper row5">
    <div id="copyright" class="hoc clear">

        <p class="fl_left">Copyright &copy; 2018 - All Rights Reserved - <a href="#">Domain Name</a></p>
        <p class="fl_right">Template by <a target="_blank" href="https://www.os-templates.com/" title="Free Website Templates">OS Templates</a></p>

    </div>
</div>

<a id="backtotop" href="#top"><i class="fas fa-chevron-up"></i></a>
<!-- JAVASCRIPTS -->
<script src="../../layout/scripts/jquery.min.js"></script>
<script src="../../layout/scripts/jquery.backtotop.js"></script>
<script src="../../layout/scripts/jquery.mobilemenu.js"></script>
</body>
