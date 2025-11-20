<?php
    include_once("connection.php");
    $name = $_POST['name'];
    $query = "insert into categorytb(name) values('{$name}');";
    $result = mysqli_query($conn, $query);
    if ($result) {
        echo "Inserted Successfully";
    }else{
        echo "Not Inserted";
    }
?>