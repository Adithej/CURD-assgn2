<?php
require("connection.php");
if (isset($_POST['submit'])) {

  $name = $_POST['name'];
  $category = $_POST['category'];
  $description = $_POST['description'];
  $price = $_POST['price'];
  $photo = $_POST['photo'];

  $sql = "insert into `products` (name,category,description,price, photo) values('$name','$category', '$description', $price, '$photo')";
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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css">
  <!-- <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script> -->

</head>

<body class="bg-gray-100">
  <form method="post">
    <fieldset>
      <div class="mb-6">
        <label for="disabledTextInput"
          class="block mb-2 text-sm font-medium text-black-900 dark:text-black">Name</label>
        <input type="text" id="text" placeholder="Name" name="name"
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
          required>
      </div>
      <div class="mb-6">
        <label for="disabledTextInput"
          class="block mb-2 text-sm font-medium text-black-900 dark:text-black">Category</label>
        <input type="text" id="text" placeholder="Category" name="category"
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
          required>
      </div>
      <div class="mb-6">
        <label for="disabledTextInput"
          class="block mb-2 text-sm font-medium text-black-900 dark:text-black">Description</label>
        <input type="text" id="text" placeholder="Description" name="description"
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
          required>
      </div>
      <div class="mb-6">
        <label for="disabledTextInput"
          class="block mb-2 text-sm font-medium text-black-900 dark:text-black">Price</label>
        <input type="text" id="text" placeholder="Price" name="price"
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
          required>
      </div>
      <div class="mb-6">
        <label for="disabledTextInput" class="block mb-2 text-sm font-medium text-black-900 dark:text-black">Image
          url</label>
        <input type="text" id="text" placeholder="Photo" name="photo"
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
          required>
      </div>
      <button type="submit" name="submit"
        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
      <fieldset>
  </form>
</body>

</html>