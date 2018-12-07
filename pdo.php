<?php
session_start();
try {
	$bdd = new PDO('mysql:host=localhost;dbname=nuitinfo;charset=utf8', 'corentin', '1$h3i3gH');
} catch(Exception $e) {
	die('Erreur : '.$e->getMessage());
}
?>
