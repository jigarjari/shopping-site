<?php
    include_once("connection.php");
    $id = $_POST["id"];
    $code = $_POST["code"];
    $discount_per = $_POST["discount_per"];
    $query = "update coupontb set code='$code',discount_per=$discount_per where id=$id";
    $result = mysqli_query( $conn, $query );
    if($result){
        echo "Updated Successfully";
    }else{
        echo "Not Updated";
    }
?>