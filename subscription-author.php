<!--C'est le contrôleur, c'est l'équivalent de l'index.php qu'on va lancer quand c'est bon-->

<?php

//CONNEXION À LA BASE DE DONNÉES
require "bdd_connexion.php";
$message="";
// faire l'appel aufichier author
require "models/author.model.php";
if(!empty($_POST)) {
 if (empty(checkAuthors())){
    addAuthors(); 
    header("location: index.php");
 }
 else{ 
  // header("location: authentification-author.php");}
 $message= "Cette adresse mail est déjà utilisé";
}
}
//AFFICHAGE À TRAVERS LA VIEW
require "views/subscription-author.phtml";