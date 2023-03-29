<?php
require("connection.php");
if (isset($_POST['submit'])) {
  // echo "123";

  $name = $_POST['name'];
  $category = $_POST['category'];
  $description = $_POST['description'];
  $price = $_POST['price'];
  $photo = $_POST['photo'];
  $popular_product = $_POST['popular_product'];
  $sql = "insert into `products` (name,category,description,price, photo,popular_product) values('$name','$category', '$description', $price, '$photo','$popular_product')";
  // echo $sql;
  $sql_cat = "insert into `categories` (category) values('$category')";
  $result = mysqli_query($con, $sql);
  // print_r($result);
  // die();
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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css">
  <!-- <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script> -->

</head>

<body>
  <div class="header-2 mr-16 focus:outline-none rounded-full dark:focus:ring-blue-800 m-4">

    <nav class="bg-white py-2 md:py-4">
      <div class="container px-4 mx-auto md:flex md:items-center">
        <div class="flex justify-between items-center focus:ring-4 ">
          <a href="index.php" class="font-bold text-4xl text-indigo-600">E-Shop</a>
          <button class="border border-solid border-gray-600 px-3 py-1 rounded text-gray-600 opacity-50 hover:opacity-75 md:hidden" id="navbar-toggle">
            <i class="fas fa-bars"></i>
          </button>
        </div>
      </div>
  </div>
  <div class="m-4">
    <form method="post">
      <fieldset>
        <div class="mb-6">
          <label for="disabledTextInput" class="block mb-2 text-sm font-medium text-black-900 dark:text-black">Name</label>
          <input type="text" id="text" placeholder="Name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
        </div>
        <div class="mb-6">
          <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Select a Category</label>
          <select id="text" name="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option selected>Choose a category</option>
            <option value="Electronics">Electronics</option>
            <option value="Clothing">Clothing</option>
            <option value="Footwear">Footwear</option>
          </select>
        </div>
        <div class="mb-6">
          <label for="disabledTextInput" class="block mb-2 text-sm font-medium text-black-900 dark:text-black">Description</label>
          <input type="text" id="text" placeholder="Description" name="description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
        </div>
        <div class="mb-6">
          <label for="disabledTextInput" class="block mb-2 text-sm font-medium text-black-900 dark:text-black">Price</label>
          <input type="text" id="text" placeholder="Price" name="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
        </div>
        <div class="mb-6">
          <label for="disabledTextInput" class="block mb-2 text-sm font-medium text-black-900 dark:text-black">Image
            url</label>
          <input type="text" id="text" placeholder="Photo" name="photo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
        </div>
        <div class="mb-6">
          <label for="disabledTextInput" class="block mb-2 text-sm font-medium text-black-900 dark:text-black">Popular Product</label>
          <input type="text" id="text" placeholder="Enter : 1 for populer ; 0 if not" name="popular_product" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
        </div>
        <button type="submit" name="submit" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full  sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
        <fieldset>
    </form>
  </div>

  <?php
  include('footer.php');
  ?>
</body>

</html>