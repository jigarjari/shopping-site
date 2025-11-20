<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="jquery-3.7.1.min.js"></script>
    <style>
        body {
    background-color: #121212;
    color: #e0e0e0;
    margin: 0;
    padding: 0;
}

nav {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 50px;
    background-color: #1e1e1e;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0px 2px 5px rgba(0,0,0,0.5);
    z-index: 1000;
}

nav a {
    margin: 0 15px;
    color: #4cafef;
    text-decoration: none;
    font-size: 18px;
    font-weight: bold;
    transition: 0.3s;
}

nav a:hover {
    color: #ff9800;
}

.main {
    margin-top: 70px; 
    padding: 20px;
    background-color: #1a1a1a;
    border-radius: 10px;
    min-height: 80vh;
    width: 90%;
    margin-left: auto;
    margin-right: auto;
    box-shadow: 0px 2px 10px rgba(0,0,0,0.4);
    text-align: center; 
}

form {
    display: flex;
    align-items: center;
    flex-direction: column;
    max-width: 400px;
    background: #222;
    padding: 30px;
    border-radius: 10px;
    margin: 10px auto;
    box-shadow: 0px 2px 10px rgba(0,0,0,0.5);
}


form label {
    margin-bottom: 5px;
    font-weight: bold;
    display: block;
}

form input[type="text"],
form input[type="password"],
form input[type="number"],
form input[type="email"],
form input[type="file"],
form select {
    width: 100%;
    padding: 8px;
    margin-bottom: 15px;
    border-radius: 5px;
    border: 1px solid #444;
    background-color: #2a2a2a;
    color: #e0e0e0;
}

form input:focus {
    border-color: #4cafef;
    outline: none;
}

form button,
form input[type="submit"] {
    background-color: #4cafef;
    border: none;
    padding: 10px;
    width: 100%;
    color: white;
    border-radius: 5px;
    cursor: pointer;
    font-weight: bold;
    transition: 0.3s;
}

form button:hover,
form input[type="submit"]:hover {
    background-color: #ff9800;
}

table {
    margin: 20px auto; 
    width: 90%;
    border-collapse: collapse;
    background: #222;
    border-radius: 10px;
    overflow: hidden;
}

table th, table td {
    border: 1px solid #333;
    padding: 10px;
    text-align: center;
}

table th {
    background-color: #333;
    color: #4cafef;
}

table tr:nth-child(even) {
    background-color: #2a2a2a;
}

table tr:hover {
    background-color: #444;
}

button.edit,
button.delete {
    border: none;
    padding: 6px 12px;
    border-radius: 5px;
    cursor: pointer;
    font-weight: bold;
    color: white;
    transition: 0.3s;
}

button.edit {
    background-color: #4cafef;
}

button.edit:hover {
    background-color: #2196f3;
}

button.delete {
    background-color: #f44336;
}

button.delete:hover {
    background-color: #d32f2f;
}
@media(max-width: 600px) {

    nav a {
        font-size: 15px;
        margin: 0 12px;
    }

    .main {
        width: 95%;
        padding: 12px;
    }

    form {
        width: 100%;
        padding: 20px;
    }

    table {
        font-size: 13px;
        min-width: 650px;
    }

    button.edit, button.delete {
        padding: 5px 10px;
        font-size: 12px;
    }
}
    </style>
</head>
<body>
    <nav>
    <div class="menu">
        <center>
        <a href="#" id="user">User</a>
        <a href="#" id="category">Category</a>
        <a href="#" id="product">Product</a>
        <a href="#" id="coupon">coupon</a>
        <a href="#" id="Orders">Orders</a>
        <a href="../index.php">Index</a>
        </center>
    </div>
    </nav>
    <div class="main">
        <p>Main Page</p>
    </div>
</body>
</html>
<script>
$(document).ready(function(){
    $(document).on('click','#user',function(){
        $.ajax({
            url:"user.php",
            method:"post",
            success:function(r){
                $('.main').html(r)
            }
        })
    })
    $(document).on('click','#category',function(){
        $.ajax({
            url:"category.php",
            method:"post",
            success:function(r){
                $('.main').html(r)
            }
        })
    })
    $(document).on('click','#product',function(){
        $.ajax({
            url:"product.php",
            method:"post",
            success:function(r){
                $('.main').html(r)
            }
        })
    })
    $(document).on('click','#coupon',function(){
        $.ajax({
            url:"coupon.php",
            method:"post",
            success:function(r){
                $('.main').html(r)
            }
        })
    })
    $(document).on('click','#Orders',function(){
        $.ajax({
            url:"order.php",
            method:"post",
            success:function(r){
                $('.main').html(r)
            }
        })
    })
})
</script>