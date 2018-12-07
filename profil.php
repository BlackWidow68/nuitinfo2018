<?php
include("header.php");
include('mission.func.php');
?>
<style>
	.masthead {
		margin-top: -10%;
		margin-bottom: -5%;
	}

	label {
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
		  <form method="post" action="" class="form-inline">
			  <?php
			  if (isset($_POST['submit'])) {
				  $id = $user->id;
				  $long = !empty($_POST['longitude']) ? secure($_POST['longitude']) : $user->longitude;
				  $lat = !empty($_POST['latitude']) ? secure($_POST['latitude']) : $user->latitude;
				  update_profile($id, $long, $lat, $bdd);
			  }
			  ?>
		    <label style="padding-right:10px;" for="latitude">Changer ma position:   </label>
		    <input type="text" class="form-control mb-2 mr-sm-2" name="latitude" placeholder="Latitude" value="<?php echo $user->latitude; ?>">

		    <input type="text" class="form-control mb-2 mr-sm-2" name="longitude" placeholder="Longitude" value="<?php echo $user->longitude; ?>">

		    <input type="submit" class="btn btn-primary mb-2" name="submit" value="Enregistrer">
		  </form>
        </div>
      </div>
</header>
<?php include("footer.php"); ?>
