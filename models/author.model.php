<?php
//affichage de tout les authors

function getAuthors(){
    global $database;
    //ON EXECUTE UNE REQUETE
    $requete = $database->query("SELECT * FROM authors");
    //ON RECUPERE LES RESULTATS
    $authors = $requete->fetchAll();
    return $authors;
}
//Function d'ajout d'un auteur dans la BDD lors de l'inscription
function addAuthors() {
    global $database;
    $password=password_hash($_POST['password'], PASSWORD_DEFAULT);
    $requestAddAuthors = $database->prepare(
        "INSERT INTO authors(`firstname`, `lastname`, `mail`, `password`) VALUES (?,?,?,?)");
    $requestAddAuthors->execute([$_POST['firstname'],$_POST['lastname'],$_POST['mail'],$password]);
    //Pas besoin de fetch all ou de return vue qu'on envoie dans la BDD
}


//fonction pour verifier l'email  dans la BDD pour l'inscription
function checkAuthors(){
    global $database;
     $requestEmail = $database->prepare("SELECT * FROM authors WHERE mail = ? ");
    $requestEmail ->execute([$_POST['mail']]);
     //ON RECUPERE LES RESULTATS
     //pas bessoin de mettre un fechall puisque on va récupérer seulemnt un seul mail
    $authorEmail = $requestEmail->fetch();
    return $authorEmail;
}

//fonction pour verifier l'email et le mot de passe dans la BDD pour la connexion
function checkLogin() {
    global $database;
    $requestCheckLogin = $database->prepare(
        "SELECT * 
        FROM authors
        WHERE mail = ?" 
        );
    $requestCheckLogin->execute(array($_POST['mail']));  
    $checkLogin = $requestCheckLogin->fetch();
    //Vérification du MDP lors de la connection
    if(!empty($checkLogin)) {
        //Utilisation de la function password_verify pour camparer le password rentré et celui de la BDD)
       if(password_verify($_POST['password'], $checkLogin['password'])) {
           // echo "mdp valide";
           return true;
       }else{
           //Mot de passe invalide 
            // echo "mdp invalide";
           return false;
       }
    }else{
        //Identifiant invalide 
        // echo "id invalide";
        return false;
    }
    
    //IL ne faut pas return checkLogin dans cette fonction

}



?>