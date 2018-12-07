<?php

include('pdo.php');

if (isset($_SESSION['pseudo'])) {
	session_destroy();
	echo "<script type='text/javascript'>document.location.replace('index.php');</script>";
}
