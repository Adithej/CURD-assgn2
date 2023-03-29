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

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Product Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" referrerpolicy="no-referrer" />
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

    <div method="post">
        <div class="m-4">
            <?php
            $id = $_GET['updateid'];
            $sql = "Select * from `products` where id=$id";
            $result = mysqli_query($con, $sql);
            $row = mysqli_fetch_assoc($result);
            $name = $row['name'];
            $category = $row['category'];
            $description = $row['description'];
            $price = $row['price'];
            $photo = $row['photo'];
            echo '
            <div class="w-full h-screen flex justify-start ml-16">
                <div>  
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
            </div>
        </div>
        </div>';
            ?>
        </div>
    </div>
    <h1 class="mb-4 ml-8 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
        You might be interested in</h1>
    <div class="grid grid-cols-3 md:grid-cols-6 gap-96">
        <?php
        // echo $category;
        $lower_limit = ceil($price * 0.7);
        $upper_limit = ceil($price * 0.8);
        // $sql = "Select * from `products` where price='$price'";
        $sql = "SELECT * FROM `products` WHERE price BETWEEN $lower_limit AND $upper_limit";
        // echo $sql;
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
            <div class="grid md:grid-cols-3 gap-4 ml-16 my-8">
            <div>
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
            </div>
            </div>
            </div>';
            }
        }

        ?>
    </div>

    <div class="relative h-32  -mt-6">
        <h1 class="mb-4 ml-8 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
            Similar Products</h1>
        <div class="grid grid-cols-3 md:grid-cols-6 gap-96">
            <?php
            // echo $category;
            $sql = "Select * from `products` where category='$category' limit 5";
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
            <div class="grid md:grid-cols-3 gap-4 ">
            <div>
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
            </div>
            </div>
            </div>';
                }
            }

            ?>
        </div>
        <?php
        include('footer.php');
        ?>
    </div>
</body>

</html>