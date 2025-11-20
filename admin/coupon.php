<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="jquery-3.7.1.min.js"></script>
    <script src="coupon/curd.js"></script>
</head>
<body>
    <form id="coupon_form">
        <input type="hidden" id="id" name="id">
        Code : 
        <input type="text" id="code" name="code"/><br><br>
        Discount Percentage :
        <input type="number" id="discount_per" name="discount_per" min="0" max="100"/><br><br>
        <input type="submit" name="submit" id="submit" value="Insert"/><br><br>
    </form>
    <div id="msg"></div>
    <div id="showdata"></div>
</body>
</html>