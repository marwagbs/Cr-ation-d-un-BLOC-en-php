<?php

require "bdd_connexion.php";
//RECUPERER DANS L'URL L'ID DE LA CATEGORIE À AFFICHER
$title = $_GET['title'];
//CONNEXION À LA BASE DE DONNÉES
//IMPORT DES FONCTIONS DU MODÈLE POST
require "models/post.model.php";
$posts =getPostsByTitle($title);

//AFFICHAGE À TRAVERS LA VIEW
require "views/home.phtml";

?>
