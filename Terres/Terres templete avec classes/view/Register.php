<?php


$title = 'Terres. Register';

ob_start();
?>

<div class="container-login100">
    <div class="wrap-login100">
        <form action="index.php?action=register" method="post" >
            <?php if(isset($_SESSION['userEmailAddress'])) echo "Modifier mes informations";
            else echo "S'inscrire";
            ?>

            <div data-validate = "vous devez ajouter votre prénom">
                <input type="text" name="inputUserFirstName" placeholder="Prénom" value="<?php if( isset($_POST['inputUserFirstName'])) {echo $_POST['inputUserFirstName'];}?>"/>
                <i aria-hidden="true"></i>
            </div>

            <div data-validate = "vous devez ajouter votre nom">
                <input type="text" name="inputUserLastName" placeholder="Nom" value="<?php if( isset($_POST['inputUserLastName'])) {echo $_POST['inputUserLastName'];}?>"/>
                <i aria-hidden="true"></i>
            </div>

            <div data-validate = "une adresse E-mail est obligatoire: ex@abc.xyz">
                <input type="email" name="inputUserEmailAddress" placeholder="Adresse email" value="<?php if( isset($_POST['inputUserEmailAddress'])) {echo $_POST['inputUserEmailAddress'];}?>"/>
                <i aria-hidden="true"></i>
            </div>

            <div data-validate = "un mot de passe est obligatoire">
                <input type="password" name="inputUserPsw" placeholder="Mot de passe">
                <i aria-hidden="true"></i>
            </div>

            <div data-validate = "rentrez le même mot de passe à nouveau">
                <input type="password" name="inputUserPswRepeat" placeholder="Mot de passe (vérif)">
                <i aria-hidden="true"></i>
            </div>
            <?php if(!isset($_SESSION['userEmailAddress'])) : ?>
            <?php endif; ?>
            <div>
                <button  type="submit" id="buttonRegister">
                    <?php if(isset($_SESSION['userEmailAddress'])) echo "Modifier";
                    else echo "S'inscrire";
                    ?>
                </button>
            </div>
    </div>
    </form>
</div>
</div>

<?php
$content = ob_get_clean();
require 'gabarit.php';
?>

