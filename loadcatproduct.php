<?php
include_once("connection.php");

$catId = $_POST["id"];

$query = "SELECT * FROM producttb WHERE category_id = $catId";
$result = mysqli_query($conn, $query);

echo "<div class='product-wrapper'><div class='products'>";

while ($row = mysqli_fetch_assoc($result)) {

    echo "
    <div class='product-card'>
        <div class='product-image-container'>
            <img src='admin/{$row['image']}'>
        </div>

        <h3>{$row['name']}</h3>
        <p>{$row['description']}</p>
        <h4>₹{$row['price']}</h4>

        <label>Qty:</label>
        <input type='number' id='qty_{$row['id']}' value='1' min='1'>

        <br><br>
        <button class='atc' data-id='{$row['id']}'>Add to Cart</button>
    </div>
    ";
}

echo "</div></div>";
?>
