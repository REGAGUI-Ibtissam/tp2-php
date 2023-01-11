<?php
require 'config/init.php';


include 'functions/messageValidation.php';
include 'functions/messageErreur.php';





?>
<?php

$arrayValidation = [];
$arrayErreur = [];

if (isset($_POST['submitFormulaire'])){
    if(!(empty($_POST['titre']) || empty($_POST['description']) || empty($_POST['prix']))){
     $titre = $_POST['titre'];
     $description = $_POST['description'];
     $prix = $_POST['prix'];

     $requete = "INSERT INTO produits (titre, description, prix) VALUES ('$titre','$description', $prix)";

     $req = $pdo->prepare($requete);

    $req->execute();
     
         
    }
}
else{
    array_push($arrayErreur,'Veuillez remplir tous les champs');
}
//array_push($array, ‘valeur à insérer’)
?>
<titre>Achat des produits:</titre></br>





<form action="creer.php" method="POST">

    <div class="titre">
    <label for="titre">Produit:</label>
    <input type="text" name="titre" id="titre"></br>
    </div>

    <div class="description">
    <label for="titre">Description:</label>
    <input type="text" name="description" id="description"></br>
    </div>

    <div class="prix">
    <label for="titre">Prix:</label>
    <input type="text" name="prix" id="prix"></br>
    </div>

    
    

    <input type="submit" name="submitFormulaire" value="Ajouter au panier">
   

</form>











<?php

include 'components/head.html';
include 'config/auth.php';
?>


<?php

include 'components/footer.html';


?>


