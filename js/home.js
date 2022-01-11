//Initialisation du jQuery
//
$(function(){
    
   /* let element = document.querySelector("#page-title");
    element.addEventListener("click",function(){
        
    });
    
    Possibilité de faire la même chose avec le jQery mais de manière bien plus courte*/
   //afficher le nombre des article
    // $("#article-count").click(function(){
    //     console.log("clicked");
    //     //$get fonction quifait de l'ajax retourne une information
    //     $.get("ajax.php",function(data){
    //     $("#article-count").html(`Le nombre d'article est : ${data}`);
    //   });
    // });
    
    //déclarer une variable et envoyer a la ajex.php
     let nb=3;
   
     $("#next").click(function(){
      nb++;
        // console.log("clicked");
        //$get fonction quifait de l'ajax retourne une information
        
        //pour incrémenter le nb il faut concaténer le nb avec le nb(int)
        $.get("ajax.php?+nb="+nb,function(data){
           
        //Au lieux de faire un .html qui écraserait tous les elements du la BDD au fur et à mesure (Donc on aurait que le dernier élément), on utilise un .append pour tout afficher.
        $("#display").append(data);
             
       });
    });
    
    //afficher les articles suivant en cliquant sur le button
   
   
});



