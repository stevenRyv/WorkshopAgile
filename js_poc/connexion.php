<?php


	echo("start");
	echo($_POST["username"]);
	echo(empty($_POST["username"]));
	echo(empty($_POST["password"]));

if(isset($_POST["username"]) & isset($_POST["password"]))
{
	$file = "../DataStorage/user.csv";
	$username = $_POST["username"];
	$password = $_POST["password"];

	echo("toto");
	echo($password);

	$row = 1;
	if (($handle = fopen($file, "r")) !== FALSE) {
	    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
	        $num = count($data);
	        echo "<p> $num champs à la ligne $row: <br /></p>\n";
	        $row++;
	        for ($c=0; $c < $num; $c++) {
	            echo $data[$c] . "<br />\n";
	        }
	    }
	    fclose($handle);
	}


	/*parse(csv);
	if password ok */


	if(GetData($_POST["password"]))
	{
		header('Location: index.html');
	}
	else{
		header('Location: connexion.html');
	}
}

?>