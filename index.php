<?php

require("connection.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script>
        function showCategory(e) {
            let params = new URLSearchParams(window.location.search);
            params.set('category', e.target.value);
            window.location.search = params;
            console.log("event", e.target.value);
        }
    </script>
    <title>Crud dispay</title>
</head>

<body>
    <div class="container">
        <div class="p-2 text-center bg-gray-100">
            <h1 class="mb-3">CRUD Store </h1>
        </div>
        <button
            class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline  my-5"><a
                href="product.php" class="text-black-100 text-decoration-none">Add
                Product</a></button>
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <!-- <div class="relative">
                <a class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline  my-5"
                    href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Categories
                </a>

                <ul
                    class=" absolute left-0 z-50 float-left hidden list-reset	 py-2 mt-1 text-base bg-green border border-gray-300 rounded">
                    <li><button
                            class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline"
                            value="all"><a href="index.php"
                                class="block w-full py-1 px-6 font-normal text-black-900 whitespace-no-wrap border-0 ">All</a></button>
                    </li>
                    <li><button onclick="showCategory('Electronics')"
                            class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline"
                            value="Electronics"><a
                                class="block w-full py-1 px-6 font-normal text-black-900 whitespace-no-wrap border-0 ">Electronics</a></button>
                    </li>
                    <li><button onclick="showCategory('Clothing')"
                            class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline"
                            value="Clothing"><a
                                class="block w-full py-1 px-6 font-normal text-black-900 whitespace-no-wrap border-0">Clothing</a></button>
                    </li>
                    <li><button onclick="showCategory('Footwear')"
                            class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline"
                            value="Footwear"><a
                                class="block w-full py-1 px-6 font-normal text-black-900 whitespace-no-wrap border-0">Footwear</a></button>
                    </li>
                </ul>
            </div> -->
                    <div>
                        <!-- <form action="" method="post"> -->
                        <select name="category" id="category" onchange="showCategory(event)">
                            <option value="">Categories :</option>
                            <?php
                            $query = "Select * from `categories`";
                            $run = mysqli_query($con, $query);
                            while ($data = mysqli_fetch_array($run)) {
                                echo "<option value='$data[1]'>$data[1]</option>";
                            }

                            ?>
                        </select>
                        <!-- <br>
                    <input type="submit" value="submit" name="submitBtn">
                    <br> -->
                        <!-- </form> -->
                        <?php
                        if (isset($_POST["category"])) {
                            $cat = $_POST["category"];
                            echo "You have selected " . $cat;
                        }
                        ?>
                    </div>
                    <tr class="table-auto">
                        <th class="px-6 py-3" scope="col">#</th>
                        <th class="px-6 py-3" scope="col">Name</th>
                        <th class="px-6 py-3" scope="col">Category</th>
                        <th class="px-6 py-3" scope="col">Description</th>
                        <th class="px-6 py-3" scope="col">Price</th>
                        <th class="px-6 py-3" scope="col">Operations</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $queries = array();
                    parse_str($_SERVER['QUERY_STRING'], $queries);
                    // echo $_SERVER['QUERY_STRING'];
                    $queries = array();
                    parse_str($_SERVER['QUERY_STRING'], $queries);
                    echo $queries["category"];
                    $sql = "Select * from `products`";
                    if ($queries["category"]) {
                        $cat = $queries["category"];
                        $sql = "Select * from `products` where category='$cat'";
                    }
                    $result = mysqli_query($con, $sql);
                    // $result_cat = mysqli_query($con, $sql_cat);
                    if ($result) {
                        // $row_cat = $row = mysqli_fetch_assoc($result_cat);
                        while ($row = mysqli_fetch_assoc($result)) {
                            $id = $row['id'];
                            $name = $row['name'];
                            $category = $row['category'];
                            $description = $row['description'];
                            $price = $row['price'];

                            echo '<tr>
            <th scope="row">' . $id . '</th>
            <td>' . $name . '</td>
            <td>' . $category . '</td>
            <td>' . $description . '</td>
            <td>' . $price . '</td>
            <td>
        <button class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-blue-600 text-white hover:bg-blue-600"><a href="update.php? updateid=' . $id . ' " class="text-gray-100 text-decoration-none">Update</a></button>
        <button class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-red-600 text-white hover:bg-red-700"><a href="delete.php? deleteid=' . $id . ' " class="text-light text-decoration-none">Delete</a></button>
            </td>
          </tr>
          <tr>';
                        }
                    }

                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>