<?php

/*est ce que la personne est connecté 
si la personne n'est pas connectée on la redirige vers la page de connexion
- on peut savoir si la personne n'est pas connecté avec if(SESSION membre connecté !== true)
- il faut faire require cette page sur toutes les autres pages ou on veut que la personne n'est pas connectée ne puisse pas accéder. */





echo 'Page Authentification';



 if($_SESSION['connect'] !== true){
	header('location: connexion.php');
	exit();
	echo '<a href="connexion.php?Connexion='.$id.'"><input type="button" value="Connexion"></a>';
	
}
else {
	array_push($arrayErreur,'Vous étres bien connecté');
}

 
 

	

		
	


		
		
	






?>


