<?php
include("header.php");
?>
<style>
	.masthead {
		margin-top: -10%;
		margin-bottom: -5%;
	}
	.home {
		background-color: #fff;
		border-radius: 3px;
		-moz-border-radius: 3px;
		-webkit-border-radius: 3px;
	}

	.bot {
		border-top: 1px solid black;
	}
	.left {
		border-right: 1px solid black;
	}
</style>
<script src="parse_api.js"></script>
<header class="masthead">
  <div class="container d-flex h-100 align-items-center">
	  <div class="container home">
	    <div class="row">
	      <div class="col left">
	       	<p>La température du désert de Namib sera au minimum de 0°C et au maximum de 43°C.<br><u>Vent :</u> 1km/h<br><u>Pécipitation :</u> 0 mm<br><u>Humidité :</u> 0%</p>
	      </div>
	      <div class="col">
		     <?php
      		echo "<p>Te revoilà enfin <b>".$user->pseudo."</b> !<br>";
      		echo "<u>Ta position actuelle:</u><br>Lat: <i>".$user->longitude."°</i> / Long: <i>".$user->latitude."°</i></p>";
      		?>
	      </div>
	    </div>
	    <div class="row bot">
	      <div class="col">
		      <table class="table table-hover">
			      <thead>
				      <tr>
					      <th scope="col">#</th>
					      <th scope="col">Titre</th>
					      <th scope="col">Status</th>
					      <th scope="col">Assigné à</th>
				      </tr>
			      </thead>
			      <tbody>
		      <?php
		      $response = $bdd->query("SELECT id, title, status, asign FROM missions ORDER BY id DESC LIMIT 5");
		      while ($donnees = $response->fetch()) {
			      $id = secure($donnees['id']);
			      $title = secure($donnees['title']);
			      $status = secure($donnees['status']);
			      $assign = secure($donnees['asign']);
			      $status_value = array("Nouveau", "Assigné", "En cours", "Terminé", "Fermé");
			      $response_pseudo = $bdd->query("SELECT id, pseudo FROM user WHERE id='$assign'");
			      while ($data = $response_pseudo->fetch()) {
				      $pseudo = secure($data['pseudo']);
				      break;
			      }

		      ?>
			  <tr>
			    <th scope="row"><a href="mission_display.php?id=<?php echo $id; ?>">#<?php echo $id;?></a></th>
			    <td><?php echo $title ?></td>
			    <td><?php echo $status_value[$status]; ?></td>
			    <td><?php echo $pseudo;?><td>
			  </tr>
			<?php
			}
			?>
			</tbody>
		</table>
	      </div>
	    </div>
	  </div>
  </div>
</header>
<?php include("footer.php"); ?>
