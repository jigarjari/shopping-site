<?php
$userid = $_POST["userid"];
$totalbill = 0;

include_once("connection.php");

$query = "SELECT p.*, c.cid, c.qty 
          FROM producttb p 
          JOIN carttb c ON p.id = c.product_id 
          WHERE c.user_id = $userid 
          AND c.status = 'ordered'";

$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) == 0) {

    echo "<div class='empty-order'>📦 No Orders Placed Yet</div>";

} else {

    echo "<div class='order-wrapper'>";

    while ($row = mysqli_fetch_assoc($result)) {

        echo "
        <div class='order-card'>
            <div class='order-image-box'>
                <img src='admin/{$row['image']}'>
            </div>

            <div class='order-info'>
                <h3>{$row['name']}</h3>
                <p>{$row['description']}</p>
                <h4>₹{$row['price']}</h4>

                <label>Qty:</label>
                <input type='number' value='{$row['qty']}' readonly>
            </div>
        </div>
        ";
    }

    echo "</div>";

    $billQuery = mysqli_query($conn,
        "SELECT total FROM ordertb WHERE user_id=$userid"
    );
    while ($b = mysqli_fetch_assoc($billQuery)) {
        $totalbill += $b["total"];
    }

    $day = rand(1,5);

    echo "
    <div class='order-summary'>
        <h2>Total Amount: ₹$totalbill</h2>
        <p>Estimated Delivery: <b>$day Days</b></p>
    </div>";
}
?>
