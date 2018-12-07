<?php

function send_mission($title, $description, $start, $end, $status, $assign, $bdd) {
	if ((!empty($title) && trim($title) != '') && (!empty($description) && trim($description) != '')
	&& (!empty($end) && trim($end) != '') && (!empty($start) && trim($start) != '')) {
		if ($end > $start) {
			if (ctype_digit($status) && ctype_digit($assign)) {
				$request = $bdd->prepare('
				INSERT INTO missions(title, description, start, end, status, asign)
				VALUES(:title, :description, :start, :end, :status, :asign)
				');
				$request->execute(array(
					'title' => $title,
					'description' => $description,
					'start' => $start,
					'end' => $end,
					'status' => $status,
					'asign' => $assign
				));
				echo '<div class="alert alert-success" role="alert">C\'est bon !</div>';
			} else {
				echo '<div class="alert alert-danger" role="alert">
					  Le status et l\'utilisateur doivent correspondres
					</div>';
			}
		} else {
			echo '<div class="alert alert-danger" role="alert">
				  Le date de début doit être inferrieur à celle de fin.
				</div>';
		}
	} else {
		echo '<div class="alert alert-danger" role="alert">
			  Il faut remplir tout les champs !
			</div>';
	}
}

function update_mission($title, $description, $start, $end, $status, $assign, $id, $bdd) {
	if ((!empty($title) && trim($title) != '') && (!empty($description) && trim($description) != '')
	&& (!empty($end) && trim($end) != '') && (!empty($start) && trim($start) != '')) {
		if ($end > $start) {
			if (ctype_digit($status) && ctype_digit($assign)) {
				$request = $bdd->prepare('
				UPDATE missions SET title=:title, description=:description, start=:start, end=:end, status=:status, asign=:asign WHERE id=:id
				');
				$request->execute(array(
					'title' => $title,
					'description' => $description,
					'start' => $start,
					'end' => $end,
					'status' => $status,
					'asign' => $assign,
					'id' => $id
				));
				echo "C'est bon !<br/>";
			} else {
				echo '<div class="alert alert-danger" role="alert">Le status et l\'utilisateur doivent correspondre</div>';
			}
		} else {
			echo '<div class="alert alert-danger" role="alert">Le date de début doit être inferrieur à celle de fin.</div>';
		}
	} else {
		echo '<div class="alert alert-danger" role="alert">Il faut remplir tout les champs !</div>';
	}
}

function update_profile($id, $long, $lat, $bdd) {
	if (trim($long) == "" || !ctype_digit($long))
		$long = $user->long;
	if (trim($lat) == "" || !ctype_digit($lat))
		$lat = $user->lat;
	$request = $bdd->prepare('
	UPDATE user SET longitude=:long, latitude=:lat WHERE id=:id
	');
	$request->execute(array(
		'long' => $long,
		'lat' => $lat,
		'id' => $id
	));
	echo "<script type='text/javascript'>document.location.replace('profil.php');</script>";

}
