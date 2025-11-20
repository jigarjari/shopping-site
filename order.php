<?php

    include_once("connection.php");
    $userid = $_POST["userid"];
    $total = $_POST["total"];
    $currdate = $_POST["currdate"];
    $query = "insert into ordertb(user_id,total,order_date) values($userid,$total,'$currdate')";
    $result =mysqli_query($conn, $query);
    $query1 = "update carttb set status='ordered' where user_id='$userid'";
    $result1 = mysqli_query($conn, $query1);
    if($result && $result1){
        echo "Order placed Successfully";
    }else{
        echo "Order not placed";
    }
?>