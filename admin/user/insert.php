<?php
    include_once("connection.php");
    $uname = $_POST["username"];
    $pwd = $_POST["password"];
    $email = $_POST["email"];
    $status = $_POST["status"];
    $role = $_POST["role"];
    $query = "insert into usertb(username,email,password,status,role) values('$uname','$email','$pwd','$status','$role')";
    $result = mysqli_query( $conn, $query );
    if($result){
        echo "Inserted Successfully";
    }else{
        echo "Not Inserted";
    }
?>