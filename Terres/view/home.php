<?php

ob_start();
$title = 'Terres - home';

?>

<h1>Page d'accueil</h1>

<?php
$content = ob_get_clean();
require 'gabarit.php';
?>
