<?php

//modifier:
//faire deux fonction
//1-if(isset...)
//2-if(!(empty... avec un bloc pour chaque variable(titre-description...)
if(isset($_GET['modifier'])){
    $id = $_GET['modifier'];
    $requete = "UPDATE produits SET titre = $titre WHERE id = $id";
    $rq = $pdo->prepare($requete);
    $rq->execute();
}


include 'components/Head.html';




if(!empty($_POST['id']) && !empty($_POST['titre']) && !empty($_POST['description'])){
 

    $id = $_POST['id'];
    $titre = $_POST['titre'];
    $description = $_POST['description'];

    $requete = "SELECT * FROM produits WHERE id = '$id'";
		$req = $pdo->prepare($requete);
		$req->execute();

        $rq = $req->fetchAll();
        $rq=$rq[0];		
}

require 'config/auth.php';
include 'Footer.html';

?>