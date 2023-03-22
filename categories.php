<?php

require("connection.php");


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <title>Crud dispay</title>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
    <div class="container">
        <button class="btn btn-primary my-5"><a href="product.php" class="text-light">Add Product</a></button>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Category</th>
                    <th scope="col">Description</th>
                    <th scope="col">Price</th>
                    <th scope="col">Operations</th>
                </tr>
            </thead>
            <tbody>

                <?php
                $sql = "Select * from `Product` where category='Electronics'";
                $result = mysqli_query($con, $sql);
                if ($result) {
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
        <button class="btn btn-primary"><a href="update.php? updateid=' . $id . ' " class="text-light">Update</a></button>
        <button class="btn btn-danger"><a href="delete.php? deleteid=' . $id . ' " class="text-light">Delete</a></button>
    </td>
          </tr>
          <tr>';
                    }
                }

                ?>
            </tbody>
        </table>
    </div>
</body>

</html>