<?php
    session_start();
    if (isset($_SESSION["email"]) || isset($_SESSION["id"]) || isset($_SESSION["role"])) {
        unset($_SESSION["email"]);
        unset($_SESSION["id"]);
        unset($_SESSION["role"]);    
    }
    header("location:index.php");
?>