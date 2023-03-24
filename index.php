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

    <div class="flex items-center justify-center py-4 md:py-8 flex-wrap">
        <button type="button"
            class="text-blue-700 hover:text-white border border-blue-600 bg-white hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-full text-base px-5 py-2.5 text-center mr-3 mb-3 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:bg-gray-900 dark:focus:ring-blue-800"><a
                href="product.php">Add Product</a>
        </button>
        <button type="button"
            class="text-gray-900 border border-white hover:border-gray-200 dark:border-gray-900 dark:bg-gray-900 dark:hover:border-gray-700 bg-white focus:ring-4 focus:outline-none focus:ring-gray-300 rounded-full text-base px-5 py-2.5 text-center mr-3 mb-3 dark:text-white dark:focus:ring-gray-800">Shoes</button>
        <button type="button"
            class="text-gray-900 border border-white hover:border-gray-200 dark:border-gray-900 dark:bg-gray-900 dark:hover:border-gray-700 bg-white focus:ring-4 focus:outline-none focus:ring-gray-300 rounded-full text-base px-5 py-2.5 text-center mr-3 mb-3 dark:text-white dark:focus:ring-gray-800">Bags</button>
        <button type="button"
            class="text-gray-900 border border-white hover:border-gray-200 dark:border-gray-900 dark:bg-gray-900 dark:hover:border-gray-700 bg-white focus:ring-4 focus:outline-none focus:ring-gray-300 rounded-full text-base px-5 py-2.5 text-center mr-3 mb-3 dark:text-white dark:focus:ring-gray-800">Electronics</button>
        <button type="button"
            class="text-gray-900 border border-white hover:border-gray-200 dark:border-gray-900 dark:bg-gray-900 dark:hover:border-gray-700 bg-white focus:ring-4 focus:outline-none focus:ring-gray-300 rounded-full text-base px-5 py-2.5 text-center mr-3 mb-3 dark:text-white dark:focus:ring-gray-800">Gaming</button>
    </div>
    <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
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

                echo '<div>
                            <img class="h-auto max-w-full rounded-lg"
                                src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-7.jpg" alt="">
                                <div>' . $name . '</div>
                        </div>';

            }
        }
        ?>
        <!-- // <div>
        //     <img class="h-auto max-w-full rounded-lg"
        //         src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image.jpg" alt="">
        //     <div class="inline-flex items-center">
        //         <svg class="h-8 w-8 text-blue-600" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
        //             stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
        //             <path stroke="none" d="M0 0h24v24H0z" />
        //             <circle cx="12" cy="12" r="2" />
        //             <path d="M2 12l1.5 2a11 11 0 0 0 17 0l1.5 -2" />
        //             <path d="M2 12l1.5 -2a11 11 0 0 1 17 0l1.5 2" />
        //         </svg>
        //         <svg class="h-8 w-8 text-green-600" width="24" height="24" viewBox="0 0 24 24"
        //             xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2"
        //             stroke-linecap="round" stroke-linejoin="round">
        //             <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />
        //             <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z" />
        //         </svg>
        //         <svg class="h-8 w-8 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        //             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
        //                 d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
        //         </svg>
        //     </div>
        </div> -->
    </div>
    <!-- Pagination -->
    <div>

        <nav class="place-content-center flex items-center justify-center " aria-label="Page navigation example"
            id="pagination">
            <ul class="inline-flex -space-x-px items-center">
                <li>
                    <a href="#"
                        class="px-3 py-2 ml-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-l-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Previous</a>
                </li>
                <li>
                    <a href="#"
                        class="px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">1</a>
                </li>
                <li>
                    <a href="#"
                        class="px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">2</a>
                </li>
                <li>
                    <a href="#" aria-current="page"
                        class="px-3 py-2 text-blue-600 border border-gray-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">3</a>
                </li>
                <li>
                    <a href="#"
                        class="px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">4</a>
                </li>
                <li>
                    <a href="#"
                        class="px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">5</a>
                </li>
                <li>
                    <a href="#"
                        class="px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 rounded-r-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Next</a>
                </li>
            </ul>
        </nav>

    </div>

</body>

</html>