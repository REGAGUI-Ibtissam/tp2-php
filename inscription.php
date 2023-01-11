<?php

require 'config/init.php';
require 'components/Header.html';


if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['mot_de_passe'])){
 

    $name = $_POST['name'];
    $email = $_POST['email'];
    $mot_de_passe = $_POST['mot_de_passe'];

    $requete = "SELECT count(*)  FROM users WHERE email = '$email'";
		$req = $pdo->prepare($requete);
		$req->execute();

        $rq = $req->fetchAll();
        $rq=$rq[0];

        $requete= "INSERT INTO users(name, email, mot_de_passe) VALUES('$name','$email','$mot_de_passe')"; 
        
 		
}


?>

<form method="POST" action="inscription.php">
				<table>
					<tr>
						<td>Name</td>
						<td><input type="text" name="name" placeholder="Ex : TOMAS" required></td>
					</tr>
					<tr>
						<td>Email</td>
						<td><input type="email" name="email" placeholder="Ex : example@google.com" required></td>
					</tr>
					<tr>
						<td>Mot de passe</td>
						<td><input type="password" name="mot_de_passe" placeholder="Ex : ********" required ></td>
					</tr>
					
				</table>
				<div id="button">
					<button type='submitFormulaire'>Inscription</button>
				</div>

                
</form>

<?php 
require 'components/Footer.html';
?>