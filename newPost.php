<?php



//CONNEXION À LA BASE DE DONNÉES
require "bdd_connexion.php";
require "models/post.model.php";
if(!empty($_POST)){
    addPost();
}


//IMPORT DES FONCTIONS DU MODÈLE categorie
require "models/category.model.php";
$categories = getCategories();


//IMPORT DES FONCTIONS DU MODÈLE author
require "models/author.model.php";
$authors=getAuthors();


//AFFICHAGE À TRAVERS LA VIEW
require "views/newPost.phtml";


?>