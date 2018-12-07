<?php
require_once('pdo.php');

class User {
	public $id;
	public $pseudo;
	public $password;
	public $longitude;
	public $latitude;

	public function __construct($id, $pseudo, $password, $longitude, $latitude) {
		$this->id = $id;
		$this->pseudo = $pseudo;
		$this->password = $password;
		$this->longitude = $longitude;
		$this->latitude = $latitude;
	}


}
function secure($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
