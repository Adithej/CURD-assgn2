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
  <div>
    <form method="post" class="w-full max-w-lg">
      <fieldset>
        <legend class="tracking-wide text-red-700 text-xl font-bold mb-2" for="grid-first-name">
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
          class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-blue-600 text-black bg-blue hover:bg-blue-600"
          name="submit">Update</button>
      </fieldset>
    </form>
  </div>
  <div>
    <h3 class="tracking-wide text-red-700 text-xl font-bold mb-2">You would also like :</h3>
    <div class="grid grid-cols-2 md:grid-cols-3 gap-4 ">
      <?php
      // echo $category;
      $sql = "Select * from `products` order by abs(500-$price)";
      $result = mysqli_query($con, $sql);
      if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
          $id = $row['id'];
          $name = $row['name'];
          $category = $row['category'];
          $description = $row['description'];
          $price = $row['price'];
          $photo = $row['photo'];

          echo '
        
                <div class="w-96">  
                    <div class="shadow hover:shadow-lg transition duration-300 ease-in-out xl:mb-0 lg:mb-0 md:mb-0 mb-6 cursor-pointer group">
                    <div class="overflow-hidden relative">
                    <img class="w-full transition duration-700 ease-in-out group-hover:opacity-60" src=' . $photo . ' alt="image" />
                    <div class="flex justify-center">
                    <div class="absolute bottom-4 transition duration-500 ease-in-out opacity-0 group-hover:opacity-100">
                        <a href="#" class="bg-gray-700 px-3 py-3 hover:bg-red-500 transition duration-300 ease-in-out">
                            <i class="fas fa-shopping-cart transition duration-300 ease-in-out flex justify-center items-center text-gray-100"></i>
                        </a>
                        <a href="#" class="bg-gray-700 px-3 py-3 hover:bg-red-500 transition duration-300 ease-in-out">
                            <i class="fas fa-random transition duration-300 ease-in-out flex justify-center items-center text-gray-100"></i>
                        </a>
                        <a href="#" class="bg-gray-700 px-3 py-3 hover:bg-red-500 transition duration-300 ease-in-out">
                            <i class="fas fa-search transition duration-300 ease-in-out flex justify-center items-center text-gray-100"></i>
                        </a>
                        <a href="#" class="bg-gray-700 px-3 py-3 hover:bg-red-500 transition duration-300 ease-in-out">
                            <i class="fas fa-heart transition duration-300 ease-in-out flex justify-center items-center text-gray-100"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="px-4 py-3 bg-white">
                <a href="#" class=""><h1 class="text-gray-800 font-semibold text-lg hover:text-red-500 transition duration-300 ease-in-out">' . $name . '</h1></a>
                <div class="flex py-2">
                    <p class="mr-2 text-xs text-gray-600">' . $price . '</p>
                        <p class="mr-2 text-xs text-red-600 ">' . $category . '</p>
                </div>
                <div class="flex">
                    <div class="">
                        <i class="fas fa-star text-yellow-400 text-xs"></i>
                        <i class="fas fa-star text-yellow-400 text-xs"></i>
                        <i class="fas fa-star text-yellow-400 text-xs"></i>
                        <i class="fas fa-star text-yellow-400 text-xs"></i>
                        <i class="far fa-star text-gray-400 text-xs"></i>
                    </div>
                    <div class="ml-2">
                        <p class="text-gray-500 font-medium text-sm">' . $description . '</p>
                    </div>
                    </div>
                </div>
                </div>
            </div>';
        }
      }

      ?>
    </div>
  </div>
</body>

</html>