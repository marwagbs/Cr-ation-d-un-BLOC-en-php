<?php

//CONNEXION À LA BASE DE DONNÉES
require "bdd_connexion.php";

//IMPORT DES FONCTIONS DU MODÈLE POST
require "models/post.model.php";
$posts = getPosts();
// $authors=getAuthors();
// $categories= getCategories();

//AFFICHAGE À TRAVERS LA VIEW
require "views/home.phtml";

?>











