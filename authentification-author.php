<!--C'est le contrôleur, c'est l'équivalent de l'index.php qu'on va lancer quand c'est bon-->

<?php

//CONNEXION À LA BASE DE DONNÉES
require "bdd_connexion.php";

$message = "";

// Vérification si la personne est déjà inscrite sur le blog
require "models/author.model.php";
//Si la personne n'a pas reçu le formulaire
if(!empty($_POST)) {
    // echo "coucou";
    // Savoir si le check est vrai ou faux. Ici on test la condition checkLogin = false
    if (!checkLogin()){
        // header("location: authentification-author.php");
        $message = "Email ou mot de passe invalide";
        // echo $message;
}  else {
        session_start();
        $_SESSION['login'] = $_POST["mail"];
        $message = "Vous ètes connecté";
        header("location: index.php");
        exit();
}

    
    // session_start();
    // header('Location: views/index.php');
} 



//AFFICHAGE À TRAVERS LA VIEW
require "views/authentification-author.phtml";