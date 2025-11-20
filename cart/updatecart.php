<?php
    $cart_id = $_POST["cid"];
    $qty = $_POST["qty"];
     include_once("connection.php");
        $query = "update carttb set qty='$qty' where cid=$cart_id";
        $result = mysqli_query($conn,$query);
        if($result){
            echo "cart Updated";
        }else{
            echo "cart not Updated";
        }
?>