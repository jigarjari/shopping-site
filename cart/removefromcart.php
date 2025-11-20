<?php
    $cart_id = $_POST["cid"];
    include_once("connection.php");
    $query = "delete from carttb where cid=$cart_id";
    $result = mysqli_query($conn,$query);
    if($result){
        echo "removed from cart";
    }else{
        echo "not removed";
    }

?>