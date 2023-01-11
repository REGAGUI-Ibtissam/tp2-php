

<?php
/*savoir si la perosnne a un compte chez nous 
verifier le mot de passe avec passeword verify 
si le mot de passe est vérifié on connecte la perosnne */

require 'config/init.php';
require 'components/Header.html';
echo 'Page de connexion';





if(isset($_SESSION['connect'])){
	header('location: index.php');
	exit();
	
}



// CONNEXION
if(!empty($_POST['email']) && !empty($_POST['password'])){

	// VARIABLES
	$email 		= $_POST['email'];
	$password 	= $_POST['password'];
	$error		= 1;

	// CRYPTER LE PASSWORD
	$password = "aq1".sha1($password."1254")."25";

	echo $password;
    

    $requete = "SELECT * FROM users WHERE email = ?";
	$req = $db->prepare($requete);
	$req->execute();

	while($user = $req->fetch()){

		if($password == $user['mot_de_passe']){
			$error = 0;
			$_SESSION['connect'] = 1;
			$_SESSION['email']	 = $user['email'];

		
	}

	if($error == 1){
		header('location: connexion.php?error=1');
		exit();
	}

}
}


?>
<p id="info">Bienvenue sur notre site,si vous n'êtes pas inscrit, <a href="inscription.php">inscrivez-vous.</a></p>
	 	
		<?php
			if(isset($_GET['error'])){
				echo'<p id="error"> Nous ne pouvons pas vous authentifier .</p>';
			}
			else if(isset($_GET['success'])){
				echo'<p id="success">Vous êtes maintenant connecté.</p>';
			}
		?>

<div id="form">
			<form method="POST" action="connexion.php">
				<table>
					<tr>
						<td>Email</td>
						<td><input type="email" name="email" placeholder="Ex : example@google.com" required></td>
					</tr>
					<tr>
						<td>Mot de passe</td>
						<td><input type="password" name="mot_de_passe" placeholder="Ex : ********" required ></td>
					</tr>
				</table>
				<p><label><input type="checkbox" name="connect" checked>Connexion automatique</label></p>
				<div id="button">
					<button type='submit'>Connexion</button>
				</div>
			</form>
		</div>


<?php 
require_once 'components/Footer.html';

?>