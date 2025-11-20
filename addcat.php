<?php
include_once("connection.php");

$query = "SELECT * FROM categorytb";
$result = mysqli_query($conn, $query);

while($row = mysqli_fetch_assoc($result)){
    echo '<li><a href="#" class="move" data-id="'.$row["id"].'">'.$row["name"].'</a></li>';
}
?>
