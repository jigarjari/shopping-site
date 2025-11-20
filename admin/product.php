<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="jquery-3.7.1.min.js"></script>
    <script src="product/abc.js"></script>
</head>

<body>
    <form id="form_product" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" id="id">
        Enter category ID :
        <select class="list_category" name="valueselect" id="valueselect">
        </select><br><br>
        Enter Name of Product :
        <input type="text" id="pname" name="pname" /><br><br>
        Enter Description of Product :
        <input type="text" id="desc" name="desc" /><br><br>
        Enter Price of Product :
        <input type="number" id="price" name="price" /><br><br>
        Select Image of Product :
        <input type="file" name="imgProduct" id="imgProduct"/>
        <input type="submit" id="submitBtn" class="submitBtn" value="Submit"/><br><br>
    </form>
    <div id="msg"></div><br><br>
    <div id="showdata"></div>
</body>

</html>