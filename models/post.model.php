<?php

//REQUETE SQL QUI AFFICHE SEULEMENT LES ARTICLES DE LA CATEGORIE DEMANDÉE
//SELECT FROM WHERE 
function getPostsByCategory($id) {
    global $database;
    //ON EXECUTE UNE REQUETE
    
//PREPARATION DE NOTRE REQUETE
    $requestPostByCategory = $database->prepare(
        "SELECT * FROM post
            INNER JOIN authors ON post.author = authors.id 
            INNER JOIN category ON post.category = category.id
            WHERE category = ?");
     //remplacer les ? par nos variables dans la requête
     $requestPostByCategory ->execute(array($id));
    $postByCategory = $requestPostByCategory->fetchAll();
    return $postByCategory;
}

//Affichage de tous les posts
function getPosts(int $nb1=0, int $nb2=3):array{
    global $database;
    //ON EXECUTE UNE REQUETE
    $requestPost = $database->prepare(
    "SELECT *, post.id as postID 
    FROM post
        INNER JOIN authors ON  post.author = authors.id 
        INNER JOIN category ON post.category = category.id
       LIMIT ?,?");
       //le bindValue permet de récupération de donnée un par un car execute convetit en chaine de caractère
     $requestPost->bindValue(1, $nb1, PDO::PARAM_INT);
    $requestPost->bindValue(2, $nb2, PDO::PARAM_INT);
    $requestPost->execute();
    //ON RECUPERE LES RESULTATS
    $posts = $requestPost->fetchAll();
    return $posts;

}


function getPostsByTitle($title){
    global $database;
    //ON EXECUTE UNE REQUETE
   $requestPostByTitle = $database->prepare(
    "SELECT * FROM post 
        INNER JOIN authors ON  post.author = authors.id 
        INNER JOIN category ON post.category = category.id
        WHERE title = ?");
        //remplacer les ? par nos variables dans la requête
     $requestPostByTitle ->execute([$title]);
    //ON RECUPERE LES RESULTATS
    $posts = $requestPostByTitle->fetchAll();
    return $posts;

}


function addPost(){
    global $database;
    //ON EXECUTE UNE REQUETE
    $requete = $database->prepare("INSERT INTO post( `author`, `title`, `date`, `category`, `content`) VALUES (?,?, NOW(), ?, ?)");
    //remplacer les ? par nos variables dans la requête
     $requete->execute([$_POST['author'],$_POST['title'],$_POST['category'],$_POST['content']]);
     //Pas besoin de fetch all ou de return vue qu'on envoie dans la BDD
}
//REQUETE QUI RECUPERE LE NOMBRE D'ARTICLES TOTAL DANS VOTRE BDD
//REQUETE FETCH => PAS FETCHALL
function countPost(){
    global $database;
    //ON EXECUTE UNE REQUETE
    $requete = $database->query("SELECT COUNT(*)AS nb FROM post");
     $countPosts = $requete->fetch();
    return $countPosts["nb"];
}

//REQUETE QUI RECUPERE LE NOMBRE D'ARTICLES TOTAL DANS VOTRE BDD
//REQUETE FETCH => PAS FETCHALL

//effacer les articles
function removePost($id) {
    global $database;
    $requestRemovePost = $database->prepare(
        "DELETE  
        FROM post
        WHERE id = ?");
    $requestRemovePost->execute(array($id));
}
