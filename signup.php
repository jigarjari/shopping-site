<?php
    session_start();
    $name=$email=$pwd=$c="";
    $nameErr= $mailErr = $pwdErr =$cErr= "";
    $flag=true;
    $show=false;
    $msg="";
    if($_SERVER["REQUEST_METHOD"]== "POST"){
        $email=$_POST["email"];
        $pwd=trim($_POST["password"]);
        $name=trim($_POST["username"]);
        $c=trim($_POST["captcha"]);

        if(empty($name)){
            $nameErr= "User Name can't be Empty";
            $flag=false;
        }
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
        }else if(strlen($pwd)< 6){
            $pwdErr= "Length must be More than 6 characters";
            $flag=false;
        }
        if(empty($c)){
            $cErr= "Captcha can't be Empty";
            $flag=false;
        }else if($_SESSION["code"]!=$c){
            $cErr= "Captcha not Valid";
            $flag=false;
        }

        if($flag){
            include_once("connection.php");
            if($conn) {
                $query = "INSERT INTO usertb(username,email,password,status,role) 
                          VALUES('$name','$email','$pwd','Active','User')";
                $sql = mysqli_query($conn, $query);
                if($sql){
                    $msg = "Registered Successfully!";
                    $show=true;
                }else{
                    $msg = "Error: Record Not Inserted";
                    $show=false;
                }
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <style>
        body {
            background-color: #f5f5dc; /* Cream */
            font-family: Arial, sans-serif;
        }
        .box {
            background-color: #800000; /* Maroon */
            color: white;
            width: 320px;
            margin: 80px auto;
            padding: 20px;
            border-radius: 5px;
        }
        input[type="text"], input[type="password"] {
            width: 95%;
            padding: 8px;
            margin: 5px 0;
        }
        input[type="submit"] {
            width: 100%;
            padding: 8px;
            background-color: #a52a2a;
            border: none;
            color: white;
            cursor: pointer;
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
            <h2>Register</h2>
            <form method="post" action="signup.php">
                <input type="text" name="username" placeholder="Enter Name" value="<?php echo $name?>">
                <div class="error"><?php echo $nameErr;?></div>

                <input type="text" name="email" placeholder="Enter Email" value="<?php echo $email?>">
                <div class="error"><?php echo $mailErr;?></div>

                <input type="password" name="password" placeholder="Enter Password" value="<?php echo $pwd?>">
                <div class="error"><?php echo $pwdErr;?></div>

                <input type="text" name="captcha" placeholder="Enter Captcha">
                <div class="error"><?php echo $cErr;?></div>

                <p>Captcha: <img src="captcha.php" alt="captcha"></p>

                <input type="submit" name="submit" value="Register">
            </form>
        <?php }else{ ?>
            <h2><?php echo $msg?></h2>
            <p><a href="login.php">Go to Login Page</a></p>
        <?php } ?>
    </div>
</body>
</html>
