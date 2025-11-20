<?php
    include_once("connection.php");
    $id = $_POST["id"];
    $uname = $_POST["username"];
    $pwd = $_POST["password"];
    $email = $_POST["email"];
    $status = $_POST["status"];
    $role = $_POST["role"];
    $query = "update usertb set username='$uname',email='$email',password='$pwd',status='$status',role='$role' where id=$id";
    $result = mysqli_query( $conn, $query );
    if($result){
        echo "Updated Successfully";
    }else{
        echo "Not Updated";
    }
?>