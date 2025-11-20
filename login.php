<?php
    session_start();
    $email=$pwd="";
    $mailErr = $pwdErr ="";
    $flag=true;
    $show=false;
    $msg= "";
    if($_SERVER["REQUEST_METHOD"]== "POST"){
        $email=$_POST["email"];
        $pwd=trim($_POST["password"]);
        if(strtolower($email)!= "admin"){
            if(empty($email)){
                $mailErr= "Email can't be Empty";
                $flag=false;
            }else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $mailErr= "Not a valid Email";
                $flag=false;
            }
            if(empty($pwd)){
                $pwdErr= "Password can't be Empty";
                $flag=false;
            }
        }
        if($flag){
            include_once("connection.php");
            $query= "select * from usertb where email='$email' and password='$pwd'";
            $result=mysqli_query($conn,$query);
            $data = mysqli_fetch_array($result);
            if(mysqli_num_rows($result) == 1){
                if(strtolower($data["status"]) == "active"){
                    $show=true;
                    $msg= "Login Successfully";
                    $_SESSION["id"]=$data["id"];
                    $_SESSION["email"]=$email;
                    $_SESSION["role"]=$data["role"];
                }else{
                    $show=false;
                    $msg= "You are Blocked from this site so you can't login";
                }
            }else{
                $msg= "Invalid ID-Password";
                $show=false;
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <style>
        body {
            background-color: #f5f5dc; /* cream */
            font-family: Arial, sans-serif;
        }
        .box {
            background-color: #800000; /* maroon */
            color: white;
            width: 300px;
            margin: 100px auto;
            padding: 20px;
            border-radius: 5px;
        }
        input[type="text"], input[type="password"], input[type="submit"] {
            width: 95%;
            padding: 8px;
            margin: 5px 0;
        }
        input[type="submit"] {
            background-color: #a52a2a;
            color: white;
            border: none;
        }
        .error {
            color: yellow;
            font-size: 12px;
        }
        a {
            color: #ffcc99;
        }
    </style>
</head>
<body>
    <div class="box">
        <?php if(!$show){ ?>
            <h2>Login</h2>
            <form action="login.php" method="post">
                <input type="text" name="email" placeholder="Enter Email" value="<?php echo $email?>">
                <div class="error"><?php echo $mailErr;?></div>

                <input type="password" name="password" placeholder="Enter Password" value="<?php echo $pwd?>">
                <div class="error"><?php echo $pwdErr;?></div>

                <input type="submit" name="submit" value="Login">
            </form>
            <p><?php echo $msg;?></p>
        <?php }else{ ?>
            <h2><?php echo $msg;?></h2>
            <p><a href="index.php">Go to Home Page</a></p>
            <?php if(strtolower($data["role"]) == "admin"){ ?>
                <p><a href="admin/dashboard.php">Go to Admin Panel</a></p>
            <?php } ?>
        <?php } ?>
    </div>
</body>
</html>
