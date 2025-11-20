<?php
    include_once("connection.php");
    $code = $_POST["code"];
    $discount_per = $_POST["discount_per"];
    $query = "insert into coupontb(code,discount_per) values('$code',$discount_per)";
    $result = mysqli_query( $conn, $query );
    if($result){
        echo "Inserted Successfully";
    }else{
        echo "Not Inserted";
    }
?>