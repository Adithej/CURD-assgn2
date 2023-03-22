<?php

require("connection.php");
if(isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];

    $sql = "delete from `Product` where id=$id";
    $result = mysqli_query($con, $sql);
    if($result) {
        // echo "deleted successfully";
        header('location:display.php');
    }else {
        require("connection.php");
    }
}

?>