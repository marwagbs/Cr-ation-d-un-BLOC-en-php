<?php
// Cette pas n'est pas là pour s'exécuter en tant que page mais récupérer les données de la BDD et la renvoyer au JS, qui lui même va envoyer tout ça à l'index.PHP pour l'afficher.
//CONNEXION À LA BASE DE DONNÉES
require "bdd_connexion.php";
//IMPORT DES FONCTIONS DU MODÈLE POST
require "models/post.model.php";


// $nb= countPost();
// echo $nb;

// appel à la fonction getpost et on récupère la valeur nb de home.js pour le rendre automatique
$getNext = getPosts($_GET["nb"],1);
//transformer un tableau en une chaine de caraetère 
//$next = json_encode($getNext);
//Affichage de nos données de manière brut en chaîne de caractère sur l'ajax pour pouvoir les afficher également dans le home.php.
//echo ($next);

              foreach($getNext as $element):?>
            
           <a href="content.php?title=<?= $element["title"]; ?>"><h2><?= $element["title"]; ?></h2></a>
                
            <p ><?= substr($element['content'],0, 100). "&hellip;" 
            ?></p>
              
            <div class = "cadran">
                <p><span>Auteur :</span> <?= $element["firstname"]; ?></p>
              
                <a href="category.php?id=<?= $element["category"]; ?>"><buttton>Catégorie : <?= $element["name"]; ?></buttton></a> 
              
                <p><span>Date de publication</span> : <?= $element["date"]; ?></p>
              
            </div>
               
            <?php
              endforeach;
            ?>
             
