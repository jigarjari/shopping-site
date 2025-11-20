<?php
$userid = $_POST["userid"];
include_once("connection.php");

$totalbill = 0;
$discount_per = 0;
$coupon_code = "";

if (isset($_POST["code"])) {
    $coupon_code = $_POST["code"];

    $cq = mysqli_query($conn, "SELECT discount_per FROM coupontb WHERE code='$coupon_code'");
    $crow = mysqli_fetch_assoc($cq);

    if ($crow) {
        $discount_per = $crow["discount_per"];
    } else {
        echo "<script>alert('Invalid coupon code: $coupon_code')</script>";
    }
}

// BILL WRAPPER START
echo "
<div class='bill-box'>
    <h2>Billing Summary</h2>

    <label class='bill-label'>Enter Coupon:</label>
    <div class='coupon-row'>
        <input type='text' id='coupon' value='$coupon_code'>
        <button type='button' id='btncoupon'>Apply</button>
    </div>
    <span style='font-size:14px;color:#800000;'>* Optional</span>

    <div class='bill-items'>
";

// PRODUCT LIST
$query = "SELECT p.name, c.qty, p.price 
          FROM carttb c 
          JOIN producttb p ON c.product_id = p.id 
          WHERE c.user_id = $userid AND c.status='pending'";

$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)) {

    $itemTotal = $row["price"] * $row["qty"];
    $totalbill += $itemTotal;

    echo "
        <div class='bill-item'>
            <div>
                <strong>{$row['name']}</strong><br>
                Qty: {$row['qty']}
            </div>
            <div class='bill-price'>₹{$itemTotal}</div>
        </div>
    ";
}

// APPLY DISCOUNT
$finalAmount = $totalbill - ($totalbill * $discount_per / 100);
$currdate = date("Y-m-d");

// BILL TOTAL UI
echo "
    </div> <!-- bill-items -->

    <div class='bill-total'>
        <h2>Total Amount: ₹$finalAmount</h2>
    </div>

    <button class='bill-pay-btn' id='placeorder'>Pay to Place Order</button>

    <input type='hidden' id='totalamt' value='$finalAmount'>
    <input type='hidden' id='currdate' value='$currdate'>
</div>
";
?>
