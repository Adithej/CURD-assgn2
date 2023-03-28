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
  <div class="header-2 mr-16 focus:outline-none rounded-full dark:focus:ring-blue-800">

    <nav class="bg-white py-2 md:py-4">
      <div class="container px-4 mx-auto md:flex md:items-center">

        <div class="flex justify-between items-center focus:ring-4 ">
          <a href="index.php" class="font-bold text-4xl text-indigo-600">E-Shop</a>
          <button
            class="border border-solid border-gray-600 px-3 py-1 rounded text-gray-600 opacity-50 hover:opacity-75 md:hidden"
            id="navbar-toggle">
            <i class="fas fa-bars"></i>
          </button>
        </div>
      </div>
  </div>
  <div class="m-4 grid justify-items-center">
    <form method="post" class="w-full max-w-lg">
      <fieldset>
        <legend class="tracking-wide text-red-700 text-xl font-semibold mb-2 " for="grid-first-name">
          Edit your Products here...</legend>
        <div class="flex flex-wrap mx-3 mb-6">
          <label for="disabledTextInput" class="form-label">Name of the Product</label>
          <input type="text"
            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
            placeholder="Name" name="name" value=<?php echo $name; ?>>
        </div>
        <div class="flex flex-wrap mx-3 mb-6">
          <label for="disabledTextInput" class="form-label">Category</label>
          <input type="text" id="disabledTextInput"
            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
            placeholder="Category" name="category" value=<?php echo $category; ?>>
        </div>
        <div class="flex flex-wrap mx-3 mb-6">
          <label for="disabledTextInput" class="form-label">Descriptiopn</label>
          <input type="text" id="disabledTextInput"
            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
            placeholder="Description" name="description" value=<?php echo $description; ?>>
        </div>
        <div class="flex flex-wrap mx-3 mb-6">
          <label for="disabledTextInput" class="form-label">Price</label>
          <input type="text" id="disabledTextInput"
            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
            placeholder="Price" name="price" value=<?php echo $price; ?>>
        </div>
        <div class="flex flex-wrap mx-3 mb-6">
          <label for="disabledTextInput" class="form-label">Image url</label>
          <input type="text" id="disabledTextInput"
            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
            placeholder="Image" name="photo" value=<?php echo $photo; ?>>
        </div>
        <button type="submit"
          class="w-full inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-blue-600 text-black bg-blue hover:bg-blue-600"
          name="submit">Update</button>
      </fieldset>
    </form>
  </div>

  <footer class="bg-white rounded-lg shadow dark:bg-gray-900 m-4">
    <div class="w-full container mx-auto p-4 md:px-6 md:py-8">
      <div class="sm:flex sm:items-center sm:justify-between">
        <a href="index.php" class="flex items-center mb-4 sm:mb-0">
          <img src="https://flowbite.com/docs/images/logo.svg" class="h-8 mr-3" alt="Flowbite Logo" />
          <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">E-Shop</span>
        </a>
        <ul class="flex flex-wrap items-center mb-6 text-sm font-medium text-gray-500 sm:mb-0 dark:text-gray-400">
          <li>
            <a href="#" class="mr-4 hover:underline md:mr-6 ">About</a>
          </li>
          <li>
            <a href="#" class="mr-4 hover:underline md:mr-6">Privacy Policy</a>
          </li>
          <li>
            <a href="#" class="mr-4 hover:underline md:mr-6 ">Licensing</a>
          </li>
          <li>
            <a href="#" class="hover:underline">Contact</a>
          </li>
        </ul>
      </div>
      <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
      <span class="block text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2023 <a href="index.php"
          class="hover:underline">E-Shop™</a>. All Rights Reserved.</span>
    </div>
  </footer>
</body>

</html>