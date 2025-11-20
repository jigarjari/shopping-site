<?php
    $userid = $_POST["userid"];
    $productId = $_POST["pid"];
    $qty = $_POST["qty"];
    include_once("connection.php");
    if($userid == "-1") {
        echo "You have to Login to Add to Cart any Product";

    }else{
        $query = "insert into carttb(user_id,product_id,qty) values('$userid','$productId','$qty')";
        $result = mysqli_query($conn,$query);
        if($result){
            echo "Added to cart";
        }else{
            echo "Not added to cart";
        }
    }
?>