<?php
    include_once("connection.php");
    $id = $_POST["id"];
    $query = "delete from categorytb where id={$id};";
    $result = mysqli_query($conn, $query);
    if ($result) {
        echo "Deleted Successfully";
    }else{
        echo "Not Deleted";
    }
?>