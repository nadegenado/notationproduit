
<?php

if (isset($_POST['soumetre'])) {
    try {
      
  
      $connection = new PDO($dsn, $username, $password, $options);
  
      $new_commentaire = array(
		"nom" => $_POST['nom'],
		"prenom"  => $_POST['prenom'],
		"nomproduit"     => $_POST['nomproduit'],
		"note"       => $_POST['note'],
		"ville"  => $_POST['ville']
	  );
  
      $sql = sprintf(
		"INSERT INTO %s (%s) values (%s)",
		"utilisateur",
		implode(", ", array_keys($new_commentaire)),
		":" . implode(", :", array_keys($new_commentaire))
	);
	
	$statement = $connection->prepare($sql);
	$statement->execute($new_user);

}catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
  }

}

  ?>


<?php require "templates/header.php"; ?>

<?php if (isset($_POST['soumetre']) && $statement) { ?>
  > <?php echo $_POST['nom']; ?> successfully added.
<?php } ?>

<h2>Notez notre Produit</h2>

    <form method="post">
	<label form="nom">Nom :</label><br>
    	<input type="text" name="nom" id="nom"><br>
    	<label form="prenom">Prenom :</label><br>
    	<input type="text" name="prenom" id="prenom"><br>
    	<label form="nomproduit"> Nom Produit :</label> <br>
    	<input type="text" name="nomproduit" id="nomproduit"><br>
    	<label form="noteProduit">Note Produit :</label><br>
    	<input type="text" name="noteproduit" id="noteproduit"><br>
    	<label form="commentaire">Commentaire :</label><br>
    	<textarea type="text" id="commentaire" name="commentaire"></textarea><br>
		<label form="ville">Ville</label><br>
    	<input type="text" name="ville" id="ville"><br>
    	<input type="submit" name="soumetre" value="soumetre"><br>
    </form>

    <a href="index.php">Back to home</a>

    <?php require "templates/footer.php"; ?>