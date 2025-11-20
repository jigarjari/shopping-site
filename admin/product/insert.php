<?php
include_once("connection.php");
$cat_id = $_POST["valueselect"];
$name = $_POST["pname"];
$desc = $_POST["desc"];
$price = $_POST["price"];
$file_dir = "images/";
$file_name = basename($_FILES["imgProduct"]["name"]);
$target_file = $file_dir . $file_name;
// $uploadOk = 1;
// $typeImg = $_FILES["imgProduct"]["type"];
//echo "abc";
// if (!($typeImg == "image/jpeg") && !($typeImg == "image/jpg") && !($typeImg == "image/png")) {
//     $uploadOk = 0;
//     echo "Only JPEG,JPG,PNG file are allowed";
// }
// if (file_exists($target_file)) {
//     $uploadOk = 0;
//     echo "File Already Exists";
// }
// if ($uploadOk == 0) {
//     echo "Sorry File not Uploaded";
// } else {
if (move_uploaded_file($_FILES["imgProduct"]["tmp_name"], $target_file)) {
    echo "File Uploaded";
}
// }
$imgProduct = "product/" . $target_file;
$query = "insert into producttb(category_id,name,description,price,image) values('$cat_id','$name','$desc','$price','$imgProduct')";
$result = mysqli_query($conn, $query);
if ($result) {
    echo "Inserted Successfully";
} else {
    echo "Not Inserted";
}
?>