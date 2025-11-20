<?php
    include_once("connection.php");
    $id = $_POST["id"];
    $name = $_POST["name"];
    $query = "update categorytb set name='{$name}' where id={$id};";
    $result = mysqli_query($conn, $query);
    if ($result) {
        echo "Updated Successfully";
    }else{
        echo "Not Updated";
    }
?>