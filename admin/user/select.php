    <?php
        include_once("connection.php");
        $query = "select * from usertb";
        $result = mysqli_query( $conn, $query );
        echo "<table border=1>
            <tr>
                <th>ID</th>
                <th>UserName</th>
                <th>Email</th>
                <th>Password</th>
                <th>Status</th>
                <th>Role</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>";
        while( $row = mysqli_fetch_array( $result ) ){
            echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['username']}</td>
                <td>{$row['email']}</td>
                <td>{$row['password']}</td>
                <td>{$row['status']}</td>
                <td>{$row['role']}</td>
                <td><button type='button' class='editBtn' data-id='{$row['id']}' data-username='{$row['username']}'
                data-email='{$row['email']}' data-password='{$row['password']}' data-status='{$row['status']}'
                data-role='{$row['role']}'>Edit</button></td>
                <td><button type='button' class='delBtn' data-id='{$row['id']}'>Delete</button></td>
            </tr>";
        }
        echo "</table>";
    ?>