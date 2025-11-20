<?php
        include_once("connection.php");
        $query = "select * from ordertb";
        $result = mysqli_query( $conn, $query );
        echo "<table border=1>
            <tr>
                <th>ID</th>
                <th>User_id</th>
                <th>total Amount of Order</th>
                <th>Order_date</th>
            </tr>";
        while( $row = mysqli_fetch_array( $result ) ){
            echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['user_id']}</td>
                <td>{$row['total']}</td>
                <td>{$row['order_date']}</td>
            </tr>";
        }
        echo "</table>";
    ?>