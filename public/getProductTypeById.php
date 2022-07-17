<?php

require "../config.php";

  try  {
    $connection = new PDO($dsn, $username, $password, $options);

    $sql = "SELECT * 
            FROM productTypes
            WHERE id = :productId";
print_r($_POST);
    $productId = $_POST['productId'];
    $statement = $connection->prepare($sql);
    $statement->bindParam(':productId', $productId, PDO::PARAM_STR);
    $statement->execute();

    $result = $statement->fetchAll();
  } catch(PDOException $error) {
      echo $sql . "<br>" . $error->getMessage();
  }
// }
?>

<?php include "templates/header.php"; ?>

<?php  
if (isset($_POST['submit'])) {
  if ($result) { ?>
    <h2>Results</h2>

    <table>
      <thead>
        <tr>
          <th>#</th>
          <th>ID</th>
          <th>canBeInsured</th>
       </tr>
      </thead>
      <tbody>
      <?php foreach ($result as $row) : ?>
        <tr>
          <td><?php echo ($row["id"]); ?></td>
          <td><?php echo ($row["name"]); ?></td>
          <td><?php echo ($row["canBeInsured"] ? "Yes" : "No"); ?></td>
        </tr>
      <?php endforeach; ?>
      </tbody>
    </table>
    <?php } else { ?>
      <blockquote>No results found for <?php echo escape($_POST['location']); ?>.</blockquote>
    <?php } 
} ?> 

    <h2>Find Product Type by Id</h2>

    <form method="post">
    	<label for="productId">Product ID</label>
    	<input type="text" id="productId" name="productId">
    	<input type="submit" name="submit" value="View Results">
    </form>

    <a href="index.php">Back to home</a>

    <?php require "templates/footer.php"; ?>