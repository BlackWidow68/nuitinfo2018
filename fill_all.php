<?php
include ('pdo.php');
if (!isset($_SESSION['pseudo'])) {
	echo "<script type='text/javascript'>document.location.replace('index.php');</script>";
}
require_once('pdo.php');
include('home_class.php');
$pseudo = $_SESSION['pseudo'];
$response = $bdd->query("SELECT * FROM user WHERE pseudo='$pseudo'");
while ($donnees = $response->fetch()) {
	$user = new User(
	secure($donnees['id']),
	secure($donnees['pseudo']),
	secure($donnees['password']),
	secure($donnees['longitude']),
	secure($donnees['latitude'])
	);
	break;
}
$response->closeCursor();
?>
