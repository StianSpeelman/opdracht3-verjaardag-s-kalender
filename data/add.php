<?php 

header("../index.php");

$servername = 'localhost';
$database = 'kalender';
$username = 'root';
$password = '';
try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }

if ($_POST["name"] != "" && $_POST["date"] != "") {
    try {
    
        $stmt = $conn->prepare("INSERT INTO `verjaardagen`(`name`, `date`) VALUES (:names,:dates)");
        $stmt->bindParam(":names", $_POST["name"]);
        $stmt->bindParam(":dates", $_POST["date"]);
 
        $stmt->execute();
        header('location: ../index.php');
    }
    catch(PDOException $e){
        echo "Connection failed: " . $e->getMessage();
    }
} 
?>
	<html lang='en'>
	<head>
		<meta charset="UTF-8">
		<link rel="shortcut icon" type="image/x-icon" href="assets/icon/42446.png">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Kalender</title>
		<link rel="stylesheet" href="css/style.css">
    	<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    </head>
    <body>
    	<div id="page">
    		<h1 id="title">Verjaardag's kalender</h1>
    		<nav>
    			<a href="../index.php">Hoofdpagina</a>
    			<a href="">Voeg Toe</a>
    		</nav>
    		<div id="cardCenter">
    			<form action="" method="post">
    				<label for="name">Naam: </label><br>
    				<input id="name" type="text" name="name" value=""><br><br>
    				<label for="date">Geboortedatum: </label><br>
    				<input id="date" type="date" name="date" value=""><br><br>
    				<input type="submit" value="submit">
    			</form>
    		</div>
    	</div>
    </body>
    </html>