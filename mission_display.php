<?php
include("header.php");
include('mission.func.php');
if (!isset($_GET['id']) && !ctype_digit($_GET['id'])) {
	echo "<script type='text/javascript'>document.location.replace('missions.php');</script>";
}
?>
<style>
	.masthead {
		margin-top: -10%;
		margin-bottom: -5%;
	}
	.home {
		background-color: #fff;
		border-radius: 5px;
		-moz-border-radius: 5px;
		-webkit-border-radius: 5px;
	}
	.mission {
		position: absolute;
		margin-top:-5%;
	}

	.bot {
		border-top: 1px solid black;
	}
	.left {
		border-right: 1px solid black;
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
	  <?php
	  $id_content = secure($_GET['id']);
	  $response = $bdd->query("SELECT * FROM missions WHERE id='$id_content'");
	  while ($donnees = $response->fetch()) {
		  $id = secure($donnees['id']);
		  $title = secure($donnees['title']);
		  $description = secure($donnees['description']);
		  $start = secure($donnees['start']);
		  $end = secure($donnees['end']);
		  $status = secure($donnees['status']);
		  $assign = secure($donnees['asign']);
		  $status_value = array("Nouveau", "Assigné", "En cours", "Terminé", "Fermé");
		  $response_pseudo = $bdd->query("SELECT id, pseudo FROM user WHERE id='$assign'");
		  while ($data = $response_pseudo->fetch()) {
			  $pseudo_id = secure($data['id']);
			  $pseudo = secure($data['pseudo']);
			  break;
		  }
		  break;
	  }
	  if (isset($title) && trim($title) != '') {
  		if (isset($_GET['edit']) && ctype_digit($_GET['edit']) && $_GET['edit'] == '1') {
  		?>
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
					update_mission($title, $description, $start, $end, $status, $assign, $id_content, $bdd);
				}
				?>
			  <div class="form-row">
			      <label for="title">Titre :</label>
			      <input type="text" class="form-control" name="title" placeholder="Titre" value="<?php echo $title;?>">
			  </div>
			  <div class="form-group">
			    <label for="description">Description :</label>
			    <textarea class="form-control" name="description" rows="3"><?php echo $description;?></textarea>
			  </div>
			  <div class="form-row">
			    <div class="form-group col-md-6">
			      <label for="start">Date de début: </label>
			      <input type="date" class="form-control" name="start" value="<?php echo $start;?>">
			    </div>
			    <div class="form-group col-md-6">
			      <label for="end">Date de fin :</label>
			      <input type="date" class="form-control" name="end" value="<?php echo $end;?>">
			    </div>
			  </div>
			  <div class="form-row">
			    <div class="form-group col-md-6">
				<label for="status">Status :</label>
				<select name="status" class="form-control">
			      <label for="status">Status :</label>
			      <option value="<?php echo $status; ?>"><?php echo $status_value[$status]; ?></option>
			      <?php
			      for ($i = 0; $i <= 4; $i++) {
				      if ($i != $status) {
					      echo "<option value=".$i.">".$status_value[$i]."</option>";
				      }
			      }
			      ?>
			    </select>
			    </div>
			    <div class="form-group col-md-6">
			      <label for="assign">Assigné à :</label>
			      <select name="assign" class="form-control">
				      <option value="<?php echo $pseudo_id; ?>"><?php echo $pseudo; ?></option>
	      			<?php
	      			$response = $bdd->query("SELECT DISTINCT * FROM user");
	      			while ($donnees = $response->fetch()) {
	      				$id_pseudo_resq = secure($donnees['id']);
	      				$pseudo_resq = secure($donnees['pseudo']);
	      				if ($id_pseudo_resq != $pseudo_id) {
	      					echo "<option value=".$id_pseudo_resq.">".$pseudo_resq."</option>";
	      				}
	      			}
	      			?>
			    </select>
			    </div>
			  </div>
			  <input type="submit" name="submit" class="btn btn-primary" value="Mettre à jour">
			</form>
		</div>
	      </div>
  		<?php
  		} else {
			?>
			<div class="container home">
			  <div class="row bot">
			    <div class="col">
				    <p><center>Titre: <?php echo $title; ?></center><a href="mission_display.php?id=<?php echo $id_content; ?>&edit=1" style="float: right;">Modifier</a></p>
			    </div>
			 </div>
			 <div class="row bot">
				 <div class="col left">
					 <p>Début: <?php echo $start; ?></p>
				 </div>
				 <div class="col">
					 <p>Fin: <?php echo $end; ?></p>
				 </div>
			 </div>
			 <div class="row bot">
				 <div class="col left">
					 <p>Status: <?php echo $status_value[$status]; ?></p>
				 </div>
				 <div class="col">
					 <p>Assigné à: <?php echo $pseudo; ?></p>
				 </div>
			 </div>
			 <div class="row bot">
			   <div class="col">
				   <p>Description:<br><?php echo $description; ?></p>
			   </div>
			</div>
		        </div>

	      	    <?php
	      	    }
  		}
  	?>
  </div>
</header>
<?php include("footer.php"); ?>
