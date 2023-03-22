<?php
require("connection.php");
$id = $_GET['updateid'];
$sql = "Select * from `Product` where id=$id";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
$name = $row['name'];
$category = $row['category'];
$description = $row['description'];
$price = $row['price'];

if(isset($_POST['submit'])) {

  $name = $_POST['name'];
  $category = $_POST['category'];
  $description = $_POST['description'];
  $price = $_POST['price'];

  $sql = "update `Product` set id=$id,name='$name',category='$category',description='$description',price=$price where id=$id";

  $result = mysqli_query($con, $sql);
  if($result) {
    // echo "data updated sucessfully";
    header('location:display.php');
  }else {
    die(mysqli_error($con));
  }

}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Product Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  </head>
  <body class="bg-light">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <div class="container my-5">
    <form method="post">
  <fieldset >
    <legend>Products</legend>
    <div class="mb-3">
      <label for="disabledTextInput" class="form-label">Name</label>
      <input type="text"  class="form-control" placeholder="Name" name="name" value=<?php echo $name; ?>>
    </div>
    <div class="mb-3">
      <label for="disabledTextInput" class="form-label">Category</label>
      <input type="text" id="disabledTextInput" class="form-control" placeholder="Category" name="category" value=<?php echo $category; ?>>
    </div>
    <div class="mb-3">
      <label for="disabledTextInput" class="form-label">Descriptiopn</label>
      <input type="text" id="disabledTextInput" class="form-control" placeholder="Description" name="description" value=<?php echo $description; ?>>
    </div>
    <div class="mb-3">
      <label for="disabledTextInput" class="form-label">Price</label>
      <input type="text" id="disabledTextInput" class="form-control" placeholder="Price" name="price" value=<?php echo $price; ?>>
    </div>
    <button type="submit" class="btn btn-primary" name="submit">Update</button>
  </fieldset>
</form>
    </div>
  </body>
</html>