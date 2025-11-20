<?php
$userid = $_POST["userid"];
include_once("connection.php");

$query = "SELECT p.*, c.cid, c.qty 
          FROM producttb p 
          INNER JOIN carttb c ON p.id = c.product_id 
          WHERE c.user_id = $userid AND c.status='pending'";

$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) == 0) {

    echo "<div class='empty-cart'>🛒 Cart is Empty</div>";

} else {

    echo "<div class='cart-wrapper'>";

    while ($row = mysqli_fetch_assoc($result)) {

        echo "
        <div class='cart-card'>

            <div class='cart-image-box'>
                <img src='admin/{$row['image']}'>
            </div>

            <div class='cart-info'>

                <h3>{$row['name']}</h3>
                <p>{$row['description']}</p>
                <h4>₹{$row['price']}</h4>

                <label>Qty:</label>
                <input type='number' id='qty_{$row['id']}' value='{$row['qty']}'>

                <div class='cart-btns'>
                    <button class='changeqty' data-id='{$row['cid']}' data-pid='{$row['id']}'>Update</button>
                    <button class='rfc' data-id='{$row['cid']}'>Remove</button>
                </div>

            </div>

        </div>";
    }

    echo "</div>";

    echo "<center><button class='order' id='order'>Order</button></center>";
}
?>
