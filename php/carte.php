<div class="div_container">
	<form class="form-horizontal col-lg-12" name="verif" method="post" action="index.php?page=carte.php">
		<div class="row">
			<label for="Nom_produit" class="col-md-5 col-md-offset-0 control-label">Recherche d'un produit sur la carte :</label>
			<input type='text' name='Nom_produit' />
			<input type="submit" class="btn btn-info" value="Recherche" href="index.php" name="reach" />
		</div>
	</form>

<?php
    include('inc/connexion.php');
    if(isset($_POST['reach'])){
        $Nom_produit = $_POST['Nom_produit'];
        $result = mysqli_query($connexion,'SELECT latitude,longitude FROM produit WHERE nomProduit="'.$Nom_produit.'"');
        while($row = mysqli_fetch_assoc($result))
        {
            $latitude = $row['latitude'];
            $longitude = $row['longitude'];
        }
    }
	else {
		$latitude = '0.0';
		$longitude = '0.0';
	}


?>
</div>

<div class="div_container">

<h2>Carte</h2>

<hr>

<div id="map" style="width:100%;height:60vh"></div>  <!--permet de définir la taille de la carte -->


<script> 

var latitude = '<?php echo $latitude ; ?>' ;
var longitude = '<?php echo  $longitude ; ?>' ;
var nom = '<?php echo $Nom_produit ; ?>'; 
console.log(latitude);
console.log(longitude);
console.log(nom);
    
function myMap() {
  var myCenter = new google.maps.LatLng(46,2); 
  var autre = new google.maps.LatLng(latitude,longitude);
  var mapCanvas = document.getElementById("map");
  var mapOptions = {center: myCenter, zoom: 5};
  var map = new google.maps.Map(mapCanvas, mapOptions);
  var marker = new google.maps.Marker({position:myCenter});
  var marker2 = new google.maps.Marker({position:autre,title:nom});
  marker.setMap(map);
  marker2.setMap(map);
}
    
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAC7d12knJ8fFyO38eehCUkDx26OiY8MKM&callback=myMap"></script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> <!-- jquery et javascript du framework -->
<script src="js/bootstrap.min.js"></script> 

</div>