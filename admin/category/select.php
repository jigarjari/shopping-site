<?php
    include_once("connection.php");
    $query = "select * from categorytb";
    $result = mysqli_query( $conn, $query );
    echo "<table border=1><tr><th>Category ID</th><th>Category Name</th><th>Edit</th><th>Delete</th></tr>";
    while($data = mysqli_fetch_array($result)){
        echo "<tr><td>$data[id]</td><td>$data[name]</td><td>
        <button type='button' class='editBtn' data-id='{$data['id']}' data-name='{$data['name']}'>Edit</button></td><td>
        <button type='button' class='deleteBtn' data-id='{$data['id']}' data-name='{$data['name']}'>Delete</button></td></tr>";
    }
    echo "</table>";
?>