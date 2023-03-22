<?php
$con = new mysqli("localhost", "root","", "Crud");

if(!$con) {
    die(mysqli_error($con));
}

?>