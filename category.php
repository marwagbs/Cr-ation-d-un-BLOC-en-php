<?php

require "bdd_connexion.php";
//RECUPERER DANS L'URL L'ID DE LA CATEGORIE À AFFICHER
$id = $_GET['id'];
//CONNEXION À LA BASE DE DONNÉES
//IMPORT DES FONCTIONS DU MODÈLE POST
require "models/post.model.php";
$posts =getPostsByCategory($id);

//AFFICHAGE À TRAVERS LA VIEW
require "views/home.phtml";

?>
