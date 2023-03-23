<?php

require("connection.php");
if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];

    $sql = "delete from `products` where id=$id";
    $result = mysqli_query($con, $sql);
    if ($result) {
        // echo "deleted successfully";
        header('location:index.php');
    } else {
        require("connection.php");
    }
}

?>