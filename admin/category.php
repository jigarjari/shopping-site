<?php
$cat_id = $name = "";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="jquery-3.7.1.min.js"></script>
    <script src="category/curd.js"></script>
</head>
<body>
    <form id="category_form">
        <input type="hidden" id="cat_id"><br><br>
        Enter Category Name :
        <input type="text" id="name"><br><br>
        <input type="submit" id="submit" value="Insert"> 
    </form>
    <div id="message">

    </div>
    <div id="data">

    </div>
</body>
</html>
