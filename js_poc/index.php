<?php session_start();

if($_SESSION["connected"] = 0)
{
    header('Location: PageConnection.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Monster Fight</title>

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"> </script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <!-- Custom Fonts -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script type="text/javascript">

        

    </script>

    <style>
        .progress {
            position: relative;
        }

        .progress span {
            position: absolute;
            display: block;
            width: 100%;
        }

        #monster {
            width: 100%;
            position: relative; 
            cursor: url("epe.png"), auto;
        }

        .monsterimg {
            width: 15%;
        }
    </style>


</head>

<body>


    <!-- Music Game loop -->
	<audio autoplay loop>
      <source src="../Music/music.mp3">
	</audio>


    <!-- wrapper - Menu -->
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php">Monster Fight</a>
            </div>
            <!-- /.navbar-header -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        
                        <li>
                            <!-- button to Acceuil -->
                            <a href="Accueil.php"><i class="fa fa-dashboard fa-fw"></i>Accueil</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
    </div>
    <!-- /#wrapper -->

    <div class="container" style="outline-style: solid;">
        <div style="text-align: center;">
            <h1>Combat</h1>

            <!-- Monster die -->
            <h2 id="victory" style="visibility: hidden; color: green;">Vous avez battu le monstre !</h2>
        </div>

        <div >
            <div class="progress">
                <div id="health-bar" class="progress-bar bg-success" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="10" style="width: 100%;">
                    <span id="health-text">10 / 10</span> 
                </div>
            </div>

            <div class='monster-zone' style="outline-style: solid; height: 348px; background-image: url('../Terrain/background.jpg');">
                <div id ="monster"></div>   
            <!--
                <img  id="monster" src="../Monstres/monster4.png" style="width: 15%; position: relative; cursor: url('epe.png'), auto;" >
            -->
            </div>
            
            <div class="progress" style="width:25%">
                <div id="xp-bar" class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="5" style="width: 0%;"> 
                    <span id="xp-text"> <?php echo $_SESSION["xp"]; ?></span> 
                    <span id="xpNextLevel-text"></span> 
                </div>
            </div>
        </div>

    </div>



    <script type="text/javascript">

        /* -- Choix aléatoire du monstre */
        ImageArray = new Array();
        ImageArray[0] = 'monstre1.png';
        ImageArray[1] = 'monstre2.png';
        ImageArray[2] = 'monstre3.png';
        ImageArray[3] = 'monstre4.png';

        //hero variables
        var heroStrength = 1;
        var heroXP = 0;
        var heroXPNextLevel = 5;
        //monster variables
        var monsterXP = 5;
        var maxHealth = 10; 
        var health = 10;
		var nbclick = 0;

        $(document).ready(function() {
            getRandomImage();
            animateDiv('#monster');
        });



        //Get required elements
        var healthBarElem = document.getElementById("health-bar"); 
        var xpBarElem = document.getElementById("xp-bar");

        //Game Initialisation 
        Init();

        $('#monster').on('click', function() {
            console.log("1- health : " + health + " max health : " + maxHealth);
			$("#monster").effect("shake");//shaking image of the monster if hit
            HitMonster();
			nbclick +=1
			console.log("nbclick = "+nbclick);
            if(health <= 0) {
                GetXP();
                DeadMonster();
            }
		
        });
		
		$('#monster-zone').on('click', function(){
		console.log("nbclick = "+nbclick);
			nbclick = 0;
			console.log("nbclick = "+nbclick);
		});

        //Initialisation of the game
        function Init()
        {
            //Init health bar
            document.getElementById("health-text").innerHTML = health + " / " + maxHealth;
            healthBarElem.style.width = Math.floor( (health * 100) / maxHealth )   + '%';

            //Init xp bar
            xpBarElem.style.width = Math.floor((heroXP *100)/ heroXPNextLevel) + '%';

            //Get user xp
            heroXP = document.getElementById("xp-text").innerHTML;
            console.log("xp hero = " + heroXP);

			//calculation of the heroStrength
			heroStrength += Math.floor(heroXP/5);
			
        }

        //function for hit monster event
        function HitMonster() 
        {  
            var width = healthBarElem.style.width.slice(0, -1); 
			if(nbclick >=5)
			{
				health = health - (heroStrength*2);
			}
			else
			{
				health = health - heroStrength;
			}
            
            console.log("2- health : " + health + " max health : " + maxHealth); 
            var nWidth = Math.floor(health * 100 / maxHealth); 

            document.getElementById("health-text").innerHTML = health + " / " + maxHealth;
            healthBarElem.style.width = Math.floor(health * 100 / 100 * maxHealth) + '%';

            //ajout du son au click sur monstre 
            var audio = document.getElementById("audio"); 
            audio.play(); 
			
        } 

        //function for monster killed
        function DeadMonster()
        {
            //Display message
            console.log("MONSTRE BATTU");
            $('#monster').prop("src", "../Monstres/coffin.png");
            $("#victory").css("visibility", "visible");

            //play dead sound
            var audio = document.getElementById("audiodeath"); 
            audio.play(); 
        }

        function GetXP()
        {
            //Add monster xp to hero total xp
            heroXP =+ monsterXP;

            //Update Hero XP bar 
            xpBarElem.style.width = Math.floor((heroXP *100)/ heroXPNextLevel) + '%';
			
			heroStrength += Math.floor(heroXP/5);//calculation of the new Strength
        }

        function makeNewPosition(){

            // Get viewport dimensions (remove the dimension of the div)
            var h = $('.monster-zone').height() - 171;
            var w = $('.monster-zone').width() - 171;
            //console.log("h = " + h + " w = " + w);

            // On définit la position aléatoire selon la taille de la div
            var nh = Math.floor(Math.random() * h);
            var nw = Math.floor(Math.random() * w);
            //console.log("nh = " + nh + " nw = " + nw);

            return [nh,nw];

        }

        function animateDiv(myclass){
            console.log("animate");
            var newq = makeNewPosition();
            // Déplace le monstre jusqu' à la nouvelle position aléatoire tous les 1000 ms
            $(myclass).animate({ top: newq[0], left: newq[1] }, 1000,   function(){
                // Le monstre bouge tant qu'il est en vie
                if(health > 0) {
                    animateDiv(myclass);
                }
            });

        }

        

        console.log(ImageArray);

        function getRandomImage() {
            var num = Math.floor( Math.random() * 4);
            var img = ImageArray[num];
            document.getElementById("monster").innerHTML = ('<img class="monsterimg" src="' + '../Monstres/' + img + '">');
        }
         
    </script>
     
    <!--Resources-->
    <audio id="audio" src="../Music/punch.mp3"></audio> 
    <audio id="audiodeath" src="../Music/death.mp3"></audio> 


</body>

</html>