<?php
require("connection.php");
if (isset($_POST['submit'])) {

  $name = $_POST['name'];
  $category = $_POST['category'];
  $description = $_POST['description'];
  $price = $_POST['price'];

  $sql = "insert into `products` (name,category,description,price) values('$name','$category', '$description', $price)";
  $sql_cat = "insert into `categories` (category) values('$category')";
  $result = mysqli_query($con, $sql);
  // $result_cat = mysqli_query($con, $sql_cat);
  if ($result) {
    // echo "data inserted sucessfully";
    header('location:index.php');
  } else {
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
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous"> -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"></script> -->
  <div class="container my-5">
    <form method="post">
      <fieldset>
        <legend>Products</legend>
        <div class="mb-3">
          <label for="disabledTextInput" class="form-label">Name</label>
          <input type="text"
            class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded"
            placeholder="Name" name="name">
        </div>
        <div class="mb-3">
          <label for="disabledTextInput" class="form-label">Category</label>
          <input type="text" id="disabledTextInput"
            class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded"
            placeholder="Category" name="category">
        </div>
        <div class="mb-3">
          <label for="disabledTextInput" class="form-label">Descriptiopn</label>
          <input type="text" id="disabledTextInput"
            class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded"
            placeholder="Description" name="description">
        </div>
        <div class="mb-3">
          <label for="disabledTextInput" class="form-label">Price</label>
          <input type="text" id="disabledTextInput"
            class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded"
            placeholder="Price" name="price">
        </div>
        <button type="submit"
          class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline  my-5"
          name="submit">Submit</button>
      </fieldset>
    </form>
  </div>
</body>

</html>