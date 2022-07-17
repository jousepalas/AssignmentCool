<?php

require "../config.php";

  try  {
    $connection = new PDO($dsn, $username, $password, $options);

    $sql = "SELECT * 
            FROM products
            WHERE id = :productId";
//Try to get products dynamic by sql...
    // $sql = "SELECT *
    //         FROM productTypes
    //         WHERE name = 'Laptops' OR name = 'Smartphones'";

    $productId = $_POST['productId'];
    $statement = $connection->prepare($sql);
    $statement->bindParam(':productId', $productId, PDO::PARAM_STR);
    $statement->execute();

    $result = $statement->fetchAll();

  } catch(PDOException $error) {
      echo $sql . "<br>" . $error->getMessage();
  }
?>

<?php include "templates/header.php"; ?>

<?php  
if (isset($_POST['submit'])) {
  print_r($_POST);
  if ($result) { ?>
    <h2>Results</h2>

    <table>
      <thead>
        <tr>
          <th>#</th>
          <th>ID</th>
          <th>Name</th>
          <th>Sales Price</th>
          <th>Product Type Id</th>
          <th>Total of Insurance</th>
        </tr>
      </thead>
      <tbody>
      <?php foreach ($result as $row) : ?>
        <?php 
        $calculation = "";
        if(in_array($row["productTypeId"], [21, 32, 841]))
        $isLess = 500 > $row["salesPrice"] ? true : false;
        if ($isLess) {
          $calculation = "no insurance required";
        } else {
          $calculation = $row["salesPrice"] < 2000 ? "insurance cost is 1000" : "insurance cost is 2000" ;
        }
        ?>
        <tr>
        <td></td>
        <td><?php echo ($row["id"]); ?></td>
          <td><?php echo ($row["name"]); ?></td>
          <td><?php echo ($row["salesPrice"]); ?></td>
          <td><?php echo ($row["productTypeId"]); ?></td>
          <td><?php echo ($calculation); ?></td>
        </tr>
      <?php endforeach; ?>
      </tbody>
    </table>
    <?php } else { ?>
      <blockquote>No results found for <?php echo escape($_POST['location']); ?>.</blockquote>
    <?php } 
} ?> 

    <h2>Find Product by Id</h2>

    <form method="post">
    	<label for="productId">Product ID</label>
    	<input type="text" id="productId" name="productId">
    	<input type="submit" name="submit" value="View Results">
    </form>

    <a href="index.php">Back to home</a>

    <?php require "templates/footer.php"; ?>