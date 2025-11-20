<?php
    include_once("connection.php");
    $query = "select * from categorytb";
    $result = mysqli_query( $conn, $query );
    while( $row = mysqli_fetch_array( $result ) ){
        echo "<option value=\"{$row['id']}\">{$row['name']}</option>";
    }
?>