<?php
require 'config/init.php';

/*En haut de la page index.php, créez un bouton de déconnexion (un lien contenant une requête GET
    deconnexion=1).

    Après être déconnecté, l'utilisateur est renvoyé vers la page connexion.php, et on lui affiche un message
    lui confirmant la déconnexion.*/

    session_unset();   

if($_GET['deconnect'] == 1)
    { 
        echo'<a href="index.php?deconnexion><input type="button" value="déconnexion"></a>';
        header("location: connexion.php");
        array_push($arrayErreur,'Vous étres bien déconnecté');
        exit();
    }



    
    





$requete = "SELECT * FROM produits";
$rq= $pdo->prepare($requete);
$rq->execute();

$resultats = $rq->fetchAll(PDO::FETCH_ASSOC);
include 'components/head.html';
include 'functions/card.php';
include 'components/header.html';

foreach ($resultats as $r){
    card($r['id'], $r['titre'], $r['description'], $r['image']);
    
}

require 'config/auth.php';





/*$requete = "DELETE FROM produits WHERE id = $id";
$rq = $pdo->prepare($requete);
$rq->execute();
*/



include 'components/Footer.html';

?>