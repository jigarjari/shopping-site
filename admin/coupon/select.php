    <?php
        include_once("connection.php");
        $query = "select * from coupontb";
        $result = mysqli_query( $conn, $query );
        echo "<table border=1>
            <tr>
                <th>ID</th>
                <th>Code</th>
                <th>Discount_per</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>";
        while( $row = mysqli_fetch_array( $result ) ){
            echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['code']}</td>
                <td>{$row['discount_per']}</td>
                <td><button type='button' class='editBtn' data-id='{$row['id']}' data-code='{$row['code']}'
                data-discount_per='{$row['discount_per']}'>Edit</button></td>
                <td><button type='button' class='delBtn' data-id='{$row['id']}'>Delete</button></td>
            </tr>";
        }
        echo "</table>";
    ?>