<?php

//affichage de tout les categories
function getCategories() {
          //RECUPERER UNE VARIABLE GLOBALE DANS UNE FUNCTION
          global $database;
          // EXECUTE UNE REQUEST
          $requestCategories = $database->query("SELECT * FROM category");
          // RECUPERATION DE LA REQUEST
          $categories = $requestCategories->fetchAll();
          return $categories;
     }

function insertCategorie(){
    
}     
?>