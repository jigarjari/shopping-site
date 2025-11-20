<?php
    include_once("connection.php");
    $query = "select * from producttb";
    $result = mysqli_query( $conn, $query );
    echo "<table border=1>
            <tr>
                <th>id</th>
                <th>category id</th>
                <th>name</th>
                <th>description</th>
                <th>price</th>
                <th>Image</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>";
    while( $row = mysqli_fetch_array( $result ) ){
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['category_id']}</td>
                <td>{$row['name']}</td>
                <td>{$row['description']}</td>
                <td>{$row['price']}</td>
                <td><img src=\"{$row['image']}\" width=\"150\" height=\"70\"/></td>
                <td><button type=\"button\" class='editBtn' data-id='{$row['id']}'
                data-category_id='{$row['category_id']}' data-name='{$row['name']}'
                data-description='{$row['description']}' data-price='{$row['price']}'
                data-image='{$row['image']}'>Edit</button></td>
                <td><button type=\"button\" class='delBtn' data-id='{$row['id']}'>Delete</button></td>
                </tr>";
    }
    echo "</table>";
?>