<?php
session_start();

if(isset($_POST["username"]) & isset($_POST["password"]))
{
	//path file data stored
	$file = "../DataStorage/user.csv";

	$username = $_POST["username"];
	$password = $_POST["password"];
	//session connected user
    $_SESSION["connected"] = 0;

    //parse each line csv file
	if (($handle = fopen($file, "r")) !== FALSE) {
	    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {

	    	//get line user data
			$tab = explode(";", $data[0]);

			//check line with form data
        	if($tab[0] == $username && $tab[1] == $password)
        	{
        		$_SESSION["xp"] = $tab[2];
        		$_SESSION["connected"] = 1;

				header('Location: index.php');
        	}
	    }
	    fclose($handle);
	}

	//All user tested, if no one connected, go back to form 
	if($_SESSION["connected"] = 0)
	{
		header('Location: PageConnection.php');
	}
}

?>