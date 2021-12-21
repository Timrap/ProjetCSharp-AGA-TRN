<?php


function login($loginRequest)
{
    //test si le login est envoyé
    // try {
    if (isset($loginRequest['inputUserEmailAddress'])&&isset($loginRequest['inputUserPsw'])){
        $userEmailAddress = $loginRequest['inputUserEmailAddress'];
        $userPsw = $loginRequest['inputUserPsw'];

        //Test des données du formulaire dans le modèle
        require "model/usersManager.php";
        if (isLoginCorrect($userEmailAddress, $userPsw))
        {
            $_SESSION['userEmailAddress']=$userEmailAddress;
            require "view/home.php";
        }
        else
        {
            require "view/login.php";
        }
    }
    else // si le login est non remplis
    {
        require "view/login.php";
    }

}
function logout()
{
    $_SESSION = array();
    session_destroy();
    require "view/home.php";
}
function register($registerRequest)
{
    try
    {
        if (isset($registerRequest['inputUserEmailAddress']) && isset($registerRequest['inputUserPsw']) && isset($registerRequest['inputUserPswRepeat']))
        {
            $userEmailAddress = $registerRequest['inputUserEmailAddress'];
            $userPsw = $registerRequest['inputUserPsw'];
            $userPswRepeat = $registerRequest['inputUserPswRepeat'];

            // Vérification des deux mots de passe identique
            if  ($userPsw == $userPswRepeat)
            {
                require_once "model/usersManager.php";
                if (registerNewAccount($userEmailAddress,$userPsw))
                {
                    $_SESSION['UserEmailAddress'] = $userEmailAddress;
                    $registerErrorMessage = null;
                }
                else
                {
                    $registerErrorMessage = "Nous avons rencontré une erreur lors de l'inscription dans la base de donnée";
                    require_once "view/register.php";
                }
            }
            else
            {
                $registerErrorMessage = "Les mots de passe ne sont pas identiques";
                require_once "view/register.php";
            }
        }
        else
        {
            require_once "view/register.php";
        }
    }
    catch (ModelDataBaseException $ex){
        $registerErrorMessage ="Nous rencontrons 8 mort 6 blessés";
        require "view/lost.php";
    }

}
