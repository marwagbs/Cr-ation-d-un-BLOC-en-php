<?php

//CONNEXION À LA BASE DE DONNÉES
require "bdd_connexion.php";
$id= $_GET['id'];

// appel de la fonction d'insertion des données
require "models/post.model.php";
$remove = removePost($id);
header("location:index.php");



?>