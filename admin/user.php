<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="jquery-3.7.1.min.js"></script>
    <script src="user/curd.js"></script>
</head>
<body>
    <form id="user_form" name="user_form">
        <input type="hidden" id="uid" name="uid">
        username : 
        <input type="text" id="username" name="username"/><br><br>
        Email :
        <input type="text" id="email" name="email"/><br><br>
        Password :
        <input type="text" id="password" name="password"/><br><br>
        Status : 
        <input type="text" id="status" name="status"/><br><br>
        Role : 
        <input type="text" id="role" name="role"/><br><br>
        <input type="submit" name="submit" id="submit" value="Insert"/><br><br>
    </form><br><br>
    <div id="msg">

    </div><br><br>
    <div id="showdata">

    </div>
</body>
</html>