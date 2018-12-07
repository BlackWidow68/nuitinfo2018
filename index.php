<?php
include('login.php');
include('pdo.php');
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MyNameIsAntoine</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/grayscale.min.css" rel="stylesheet">
	<style>
		.label {
			float: left;
			color: white;
			font-weight: bold;
			font-size: 18px;
		}

		.btn {
			float: left;
		}
	</style>
  </head>

  <body id="page-top">

    <!-- Header -->
    <header class="masthead">
      <div class="container d-flex h-100 align-items-center">
        <div class="mx-auto text-center">
          <h1 class="mx-auto my-0 text-uppercase">MyNameIsAntoine</h1>
	  <form method="post" action="">
		  <?php
			  if (isset($_POST['submit'])) {
				  login($_POST['pseudo'], $_POST['password'], $bdd);
			  }
		?>
	    <div class="form-group">
	      <label class="label" for="pseudo">Nom d'utilisateur :</label>
	      <input type="text" class="form-control" name="pseudo" placeholder="Nom d'utilisateur">
	    </div>
	    <div class="form-group">
	      <label class="label" for="password">Mot de passe :</label>
	      <input type="password" class="form-control" name="password" placeholder="Mot de passe">
	    </div>
	    <input type="submit" class="btn btn-success" name="submit" id="submit" value="Connexion">
	  </form>
        </div>
      </div>
    </header>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/grayscale.min.js"></script>

  </body>

</html>
