<?php

require("connection.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
    <script>
        function showCategory(e) {
            let params = new URLSearchParams(window.location.search);
            params.set('category', e.target.value);
            window.location.search = params;
            console.log("event", e.target.value);
        }
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css">
    <!-- <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script> -->
    <title>Crud dispay</title>
</head>

<body>

    <div class="flex flex-col min-h-screen">
        <div class="flex items-center justify-center py-4 md:py-8 flex-wrap">
            <button type="button" class="text-blue-700 hover:text-white border border-blue-600 bg-white hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-full text-base px-5 py-2.5 text-center mr-3 mb-3 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:bg-gray-900 dark:focus:ring-blue-800"><a href="product.php">Add Product</a>
            </button>
            <button type="button" class="text-blue-700 hover:text-white border border-blue-600 bg-white hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-full text-base px-5 py-2.5 text-center mr-3 mb-3 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:bg-gray-900 dark:focus:ring-blue-800"><a href="index.php">E-Shop</a>
            </button>
        </div>

        <div method="get" class="grid grid-cols-2 md:grid-cols-3 gap-4 m-4 flex-grow">
            <?php

            $queries = array();
            parse_str($_SERVER['QUERY_STRING'], $queries);
            $resultsPerPage = 6;

            $sql = "Select * from `products`";
            $result = mysqli_query($con, $sql);
            $numOfResults = mysqli_num_rows($result);
            $row = mysqli_fetch_assoc($result);
            $popularProduct = $row['popular_product'];
            $numberOfPages = ceil($numOfResults / $resultsPerPage);

            if (!isset($_GET['page'])) {
                $page = 1;
            } else {
                $page = $_GET['page'];
            }

            $pageFirstResult = ($page - 1) * $resultsPerPage;
            // $sql = "Select * from `products`";
            $sql = 'SELECT * FROM products  LIMIT ' . $pageFirstResult . ',' . $resultsPerPage;

            if (isset($queries["category"])) {
                $cat = $queries["category"];
                $sql = "Select * from `products` where category='$cat'";
            }
            $result = mysqli_query($con, $sql);
            if ($result) {
                // $row_cat = $row = mysqli_fetch_assoc($result_cat);
                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['id'];
                    $name = $row['name'];
                    $category = $row['category'];
                    $description = $row['description'];
                    $price = $row['price'];
                    $photo = $row['photo'];
                    echo '<div method="get">
                            <img class="h-auto max-w-full rounded-lg"
                                src=' . $photo . '>
                                <div class="font-mono text-lg">' . $name . '</div>
                                <button class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-blue-600 text-white hover:bg-blue-600"><a href="update.php? updateid=' . $id . ' " class="text-gray-100 text-decoration-none">Update</a></button>
            <button class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-red-600 text-white hover:bg-red-700"><a href="delete.php? deleteid=' . $id . ' " class="text-light text-decoration-none">Delete</a></button>
            <button class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-blue-600 text-white hover:bg-blue-600"><a href="display.php? updateid=' . $id . ' " class="text-gray-100 text-decoration-none">View</a></button>
                       </div> ';
                }
            }
            ?>
        </div>
        <div class="flex justify-center items-center py-4">
            <?php
            // pagination
            for ($page = 1; $page <= $numberOfPages; $page++) {
                // echo "test pagination 2";
                echo '<div class="inline-flex"><button class="px-4 py-2 text-sm font-medium text-white bg-blue-800  hover:bg-gray-900 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"><a href="index.php?page=' . $page . '">' . $page . '</a></button></div>';
            }

            ?>
        </div>
        <div>
            <?php
            include('footer.php');
            ?>
        </div>

</body>

</html>