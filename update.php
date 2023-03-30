<?php
require("connection.php");
$id = $_GET['updateid'];
$sql = "Select * from `products` where id=$id";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
$name = $row['name'];
$category = $row['category'];
$description = $row['description'];
$price = $row['price'];
$photo = $row['photo'];
$popular_product = $row['popular_product'];

if (isset($_POST['submit'])) {

  $name = $_POST['name'];
  $category = $_POST['category'];
  $description = $_POST['description'];
  $price = $_POST['price'];
  $photo = $_POST['photo'];

  $sql = "update `products` set id=$id,name='$name',category='$category',description='$description',price=$price, photo='$photo' where id=$id";

  $result = mysqli_query($con, $sql);
  if ($result) {
    // echo "data updated sucessfully";
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
  <title>Update Page</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css">
</head>

<body>
  <div>
    <div class="header-2 mr-16 focus:outline-none rounded-full dark:focus:ring-blue-800">

      <nav class="bg-white py-2 md:py-4">
        <div class="container px-4 mx-auto md:flex md:items-center ">

          <div class="flex justify-between items-center focus:ring-4 ">
            <a href="index.php" class="font-bold text-4xl text-indigo-600">E-Shop</a>
            <button class="border border-solid border-gray-600 px-3 py-1 rounded text-gray-600 opacity-50 hover:opacity-75 md:hidden" id="navbar-toggle">
              <i class="fas fa-bars"></i>
            </button>
          </div>
        </div>
    </div>
    <div class="max-w-4xl overflow-hidden rounded-lg shadow-lg justify-items-center ml-96">
      <div class="m-4 grid justify-items-center">
        <form method="post" class="w-full max-w-lg">
          <fieldset>
            <h4 class="mt-0 mb-2 text-2xl font-medium leading-tight text-primary ml-32">
              Edit your Product
            </h4>
            <div class="flex flex-wrap mx-3 mb-6">
              <label for="disabledTextInput" class="form-label">Name of the Product</label>
              <input type="text" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" placeholder="Name" name="name" value=<?php echo $name; ?>>
            </div>
            <div class="flex flex-wrap mx-3 mb-6">
              <label for="disabledTextInput" class="form-label">Category</label>
              <input type="text" id="disabledTextInput" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" placeholder="Category" name="category" value=<?php echo $category; ?>>
            </div>
            <div class="flex flex-wrap mx-3 mb-6">
              <label for="disabledTextInput" class="form-label">Descriptiopn</label>
              <input type="text" id="disabledTextInput" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" placeholder="Description" name="description" value=<?php echo $description; ?>>
            </div>
            <div class="flex flex-wrap mx-3 mb-6">
              <label for="disabledTextInput" class="form-label">Price</label>
              <input type="text" id="disabledTextInput" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" placeholder="Price" name="price" value=<?php echo $price; ?>>
            </div>
            <div class="flex flex-wrap mx-3 mb-6">
              <label for="disabledTextInput" class="form-label">Popular Product (0/1)</label>
              <input type="text" id="disabledTextInput" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" placeholder="Popular" name="popular_product" value=<?php echo $popular_product; ?>>
            </div>
            <div class="flex flex-wrap mx-3 mb-6">
              <label for="disabledTextInput" class="form-label">Image url</label>
              <input type="text" id="disabledTextInput" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" placeholder="Image" name="photo" value=<?php echo $photo; ?>>
            </div>
            <button type="submit" class="w-full inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-blue-600 text-black bg-blue hover:bg-blue-600" name="submit">Update</button>
          </fieldset>
        </form>
      </div>
    </div>
    <?php
    include('footer.php');
    ?>
  </div>
</body>

</html>