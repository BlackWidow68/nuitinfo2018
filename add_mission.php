<?php include("header.php");
include('mission.func.php') ?>
<style>
	.masthead {
		margin-top: -10%;
		margin-bottom: -5%;
	}

	label {
		float: left;
		color: white;
		font-weight: bold;
		font-size: 18px;
	}

	.btn {
		float: left;
	}
</style>
<header class="masthead">
  <div class="container d-flex h-100 align-items-center">
    <div class="mx-auto text-center">
	  <form method="post" action="">
		  <?php
		  if (isset($_POST['submit'])) {
			  $title = secure($_POST['title']);
			  $description = secure($_POST['description']);
			  $start = secure($_POST['start']);
			  $end = secure($_POST['end']);
			  $status = secure($_POST['status']);
			  $assign = secure($_POST['assign']);
			  send_mission($title, $description, $start, $end, $status, $assign, $bdd);
		  }
		  ?>
	    <div class="form-row">
	        <label for="title">Titre :</label>
	        <input type="text" class="form-control" name="title" placeholder="Titre">
	    </div>
	    <div class="form-group">
	      <label for="description">Description :</label>
	      <textarea class="form-control" name="description" rows="3"></textarea>
	    </div>
	    <div class="form-row">
	      <div class="form-group col-md-6">
	        <label for="start">Date de début: </label>
	        <input type="date" class="form-control" name="start">
	      </div>
	      <div class="form-group col-md-6">
	        <label for="end">Date de fin :</label>
	        <input type="date" class="form-control" name="end">
	      </div>
	    </div>
	    <div class="form-row">
	      <div class="form-group col-md-6">
		<label for="status">Status :</label>
		<select name="status" class="form-control">
	        <option value="0">Nouveau</option>
		<option value="1">Assigné</option>
		<option value="2">En cours</option>
		<option value="3">Terminée</option>
		<option value="4">Fermée</option>
	      </select>
	      </div>
	      <div class="form-group col-md-6">
		<label for="assign">Assigné à :</label>
		<select name="assign" class="form-control">
			<?php
			$response = $bdd->query("SELECT * FROM user");
			while ($donnees = $response->fetch()) {
				$id = secure($donnees['id']);
				$pseudo = secure($donnees['pseudo']);
				echo "<option value=".$id.">".$pseudo."</option>";
			}
			?>
	      </select>
	      </div>
	    </div>
	    <input type="submit" name="submit" class="btn btn-primary" value="Ajouter">
	  </form>
  </div>
</div>
</header>
<?php include("footer.php"); ?>
