<?php session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Game</title>

	    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    </head>

    <body>
		 <center><h1>Welcome to the game</h1></center>

		 <div class="line" style="line-break: auto">
	     <a href="PageConnection.php" class="btn btn-success">Lancer le jeu</a>
		 <a href="pageclose.html" class="btn btn-info">Quitter le jeu</a>
		</div>

		<h3>Les règles du jeu :</h3>
			 </br>
			 </br>
			 </br>
			 
		<ol>
		  <li>Règle 1 : Cliquez sur le monstre pour le frapper</li>
		  <li>Règle 2 : Tout les 5 points d'expérience vous gagnez un niveau</li>
		  <li>Règle 3 : Si vous effectuez 5 coups consécutifs sur un monstre, vous obtiendrez une arme spéciale
			<ol> 
				<li>Règle 3.1 : Si vous ratez un coup, le compteur pour l'arme spéciale est remise à 0</li>
			</ol></li>
		</ol>

		<img src="../Monstres/monstre1.png" alt="donatebtc!" style="position: absolute; margin-left: 40%;" 	>


     

    </body>
</html>