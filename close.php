<?php
    include "partials/_dbconnect.php";
    $id = $_GET['catid'];
    $sql2 = "DELETE FROM `task` WHERE `task`.`sno` = $id;";
    $result2 = mysqli_query($conn,$sql2);
    header("Location: index.php");
?>