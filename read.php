<?php

if (isset($_POST['submit'])) {
    try {
      require "../config.php";
      
  
      $connection = new PDO($dsn, $username, $password, $options);
  
      $sql = "SELECT *
      FROM utilisateur
      WHERE ville = :ville";
  
      $ville = $_POST['ville'];
  
      $statement = $connection->prepare($sql);
      $statement->bindParam(':ville', $ville, PDO::PARAM_STR);
      $statement->execute();
  
      $result = $statement->fetchAll();
    } catch(PDOException $error) {
      echo $sql . "<br>" . $error->getMessage();
    }
  }

  ?>


<?php require "templates/header.php"; ?>

<?php
if (isset($_POST['soumetre'])) {
  if ($result && $statement->rowCount() > 0) { ?>
    <h2>Resultat</h2>

    <table>
      <thead>
<tr>
  
  <th>Nom</th><br>
  <th>Prenom</th>
  <th>Note</th>
  <th>Commentaire</th>
  <th>Ville</th>
  <th>Date</th>
</tr>
      </thead>
      <body>
  <?php foreach ($result as $row) { ?>
      <tr>
<td><?php echo escape($row["id"]); ?></td>
<td><?php echo escape($row["nom"]); ?></td>
<td><?php echo escape($row["prenom"]); ?></td>
<td><?php echo escape($row["note"]); ?></td>
<td><?php echo escape($row["commentaire"]); ?></td>
<td><?php echo escape($row["ville"]); ?></td>
<td><?php echo escape($row["date"]); ?> </td>
      </tr>
    <?php } ?>
      </tbody>
  </table>
  <?php } else { ?>
     No results found for <?php echo escape($_POST['ville']); ?>.
  <?php }
} ?>

<h2> lire les commentaire</h2>

    
<form method="post">
    	<label form="ville">ville</label>
    	<input type="text" id="ville" name="ville">
    	<input type="submit" name="submit" value="Voir Resultats">
    </form>

    <a href="index.php">Back to home</a>

    <?php require "templates/footer.php"; ?>  