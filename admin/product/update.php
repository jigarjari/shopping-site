<?php
include_once("connection.php");
$id = $_POST["id"];
$cat_id = $_POST["valueselect"];
$name = $_POST["pname"];
$desc = $_POST["desc"];
$price = $_POST["price"];
$query = "update producttb set category_id='$cat_id',name='$name',description='$desc',price='$price' where id=$id";
$result = mysqli_query($conn, $query);
if ($result) {
    echo "Updated Successfully";
} else {
    echo "Not Updated";
}
?>