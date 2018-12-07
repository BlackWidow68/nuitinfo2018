<?php

function login($pseudo, $password, $bdd) {
	$pseudo = secure($pseudo);
	$password = secure($password);
	if ((!empty($pseudo) || trim($pseudo) != '') && (!empty($password) || trim($password) != '')) {
		$response = $bdd->query("SELECT pseudo, password FROM user WHERE pseudo='$pseudo'");
		while ($get = $response->fetch()) {
			if (secure($get['pseudo']) === $pseudo && secure($get['password']) == $password) {
				$_SESSION['pseudo'] = $pseudo;
				echo "<script type='text/javascript'>document.location.replace('home.php');</script>";

			} else
			echo '<div class="alert alert-danger" role="alert">Aucun compte ne correspondant à ce pseudo.</div>';
		}
		$response->closeCursor();
	} else {
		echo '<div class="alert alert-danger" role="alert">Pseudo / MDP requis.</div>';
	}
}

function secure($entity) {
	$entity = trim($entity);
	$entity = stripslashes($entity);
	$entity = htmlspecialchars($entity);
	return $entity;
}
