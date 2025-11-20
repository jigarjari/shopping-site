<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>
    <link rel="stylesheet" type="text/css" href="load.css">
    <script src="jquery-3.7.1.min.js"></script>
    <script src="loaddata.js"></script>
</head>

<body>

<div class="topbar">
    <?php if(!isset($_SESSION["email"])) { ?>
        <a href="login.php">Login</a>
        <a href="signup.php">Sign Up</a>
    <?php } else { ?>
        <a href="#"><?php echo $_SESSION["role"] == "admin" ? "<a href='admin/dashboard.php'>".$_SESSION["email"]."</a>" :"<a href='index.php'>".$_SESSION["email"]."</a>"; ?></a>
        <a href="logout.php">Logout</a>
    <?php } ?>

    <input type="hidden" id="userid" value="<?php echo $_SESSION['id'] ?? -1; ?>">
</div>

<div class="sidebar">
    <ul>
        <li><a href="#" id="home">Home</a></li>
        <div class="cate"></div>
        <li><a href="#" id="cart">Cart</a></li>
        <li><a href="#" id="orders">Orders</a></li>
    </ul>
</div>

<div class="content" id="content">
    <p>Main Page</p>
    <p>Welcome to App</p>
</div>

<div class="bill" id="bill"></div>

</body>
</html>
